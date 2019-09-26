<?php

/**
* Queries the hitobito API for getting group email addresses by id.
* @return an array of groups, including the links to all persons matched to that group
*/
if (!function_exists('query_groups')) {
  function query_groups($persons){
    $person_url_base = Config::get('urls.person_url');
    $channel = curl_init();
    $groups = get_unique_groups($persons);

    // Query the hitobito API
    for ($i = 0; $i < count($groups); $i++) {
      try {
        $email = single_query($channel, $groups[$i]['id']);
        $groups[$i]['email'] = $email;
        $groups[$i]['found'] = true;
      } catch (Exception $e) {
        $groups[$i]['email'] = null;
        $groups[$i]['found'] = false;
        $groups[$i]['error'] = $e->getMessage();
      }

      // Match persons to groups
      $filtered_persons = "";
      foreach($persons as $person)
      {
        if($person[1] == $groups[$i]['id'])
        {
          $person_url = $person_url_base.$person[0];

          $filtered_persons .= "<a href='".$person_url."' target='_blank'>".$person_url."</a>";
          $filtered_persons .= "<br/>";
        }
      }
      $groups[$i]['persons'] = $filtered_persons;
    }

    if (curl_errno($channel))
    {
      $error_msg = curl_error($channel);
    }

    curl_close($channel);

    if (isset($error_msg))
    {
      throw new Exception("Curl Fehler: ".$error_msg);
    }

    return $groups;
  }
}

/**
* Get distinct groups from the mixed array persons
*/
if (!function_exists('get_unique_groups')) {
  function get_unique_groups($persons) {
    $temp_groups = array();
    $groups = array();

    for ($i = 0; $i < count($persons); $i++)
    {
      $temp_groups[$i] = $persons[$i][1];
    }
    $temp_groups = array_values(array_unique($temp_groups));

    for ($i = 0; $i < count($temp_groups); $i++)
    {
      $groups[$i]['id'] = $temp_groups[$i];
    }

    return array_values(array_filter($groups));
  }
}

/**
* Check if groups can be queried and exec curl call
*/
if (!function_exists('single_query')) {
  function single_query($channel, $group_id)
  {
    $urls = Config::get('urls.groups_url');
    $url = $urls['start'].$group_id.$urls['end'];

    curl_setopt($channel, CURLOPT_URL, $url);
    curl_setopt($channel, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($channel);

    if($output === false)
    {
      throw new Exception("Gruppe mit ID ".$group_id." nicht gefunden");
    }

    $output_json = json_decode($output, true);
    if ($output_json === null || !isset($output_json["groups"][0]["email"]))
    {
      throw new Exception("Gruppe mit ID ".$group_id." nicht gefunden");
    }


    $email = null;
    if(isset($output_json["groups"][0]["email"]) && $output_json["groups"][0]["email"] !== ""){
        $email = $output_json["groups"][0]["email"];
    }elseif(isset($output_json["linked"]["people"][0]["email"]) && $output_json["linked"]["people"][0]["email"] !== ""){
        $email = $output_json["linked"]["people"][0]["email"];
    }

    if(isNullOrEmptyString($email))
    {
      throw new Exception("Gruppe mit ID ".$group_id." hat keine E-Mail hinterlegt");
    }

    return $email;
  }
}

if (!function_exists('isNullOrEmptyString')) {
    function isNullOrEmptyString($str)
    {
        return (!isset($str) || trim($str) === '');
    }
}

if (!function_exists('notNullOrEmptyString')) {
    function notNullOrEmptyString($str)
    {
        return (isset($str) || trim($str) !== '');
    }
}
?>
