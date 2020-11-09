<?php

namespace App\Http\Controllers;

use Config;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
  var $log;

  public function __construct()
  {
    //Dev comment this out for testing without login
    $this->middleware('auth');
    $this->log = array();
  }

  public function index()
  {
    return view('upload');
  }

  public function receive()
  {
    $this->add("öffne Datei");

    if(!isset($_FILES["fileToUpload"]["tmp_name"])){
      $this->add("Datei konnte nicht gelesen werden");
      printf($this->log[1]);
      return;
    }

    $file = $_FILES["fileToUpload"]["tmp_name"];
    $persons = read_file($file);

    try {
      $groups = query_groups($persons);
    } catch(\Exception $e) {
      echo 'Caught exception: ',  $e->getMessage(), "\n";
      return;
    }

    $found = [];
    $not_found = [];

    for ($i = 0; $i < count($groups); $i++){
      if($groups[$i]['found'] == "true"){
        array_push($found, array($groups[$i]['email'], $groups[$i]['persons']));
      } else {
        array_push($not_found, array($groups[$i]['id'], $groups[$i]['error']));
      }
    }

    try{
      $user_mail = Auth::user()->email;
    }
    catch (\Exception $e){
      $user_mail = "";
    }

    $group_url = Config::get('urls.groups_url')['start'];
    return view('summary',
    ['found' => $found,
     'not_found' => $not_found,
     'group_url' => $group_url,
     'user_mail' => $user_mail]);
  }

  public function add($string){
    array_push($this->log, $string);
  }
}

?>
