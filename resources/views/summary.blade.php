@extends('layouts.app')

@section('content')
 <div class="container">
  <div class="row justify-content-center">
   <div class="col-md-8">
    <div class="card">
     <div class="card-header">Dashboard</div>

     <div class="card-body">
     <?php
      $csvStr = "";

      for ($i = 0; $i < count($groups); $i++)
      {
      if($groups[$i]['found'] == "true")
      {
      $csvStr .= "<h4>".$groups[$i]['email']."</h4>";
      $csvStr .= "<p><a href='".$groups[$i]['persons']."'>".$groups[$i]['persons']."</a></p>";
      }
      else {
      $csvStr .= "<i>".$groups[$i]['error']."</i>";
      }
      }

      echo $csvStr;
      //TODO
      // Mailgun API
      ?>
     </div>
    </div>
   </div>
  </div>
 </div>
@endsection
