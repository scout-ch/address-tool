<?php

/*
* Read a csv file containing two rows personId and groupId
*/
if (!function_exists('read_file')) {
    function read_file($file){
      $persons = array();
      $delimiter = detect_delimiter($file);

      // Create array from file contents (personID, groupID)
      $fp = fopen($file, 'rb');
      while(!feof($fp)) {
          $persons[] = fgetcsv($fp, null, $delimiter);
      }

      // Remove last entry (end of file)
      return array_slice($persons, 0, -1);
    }
}

/*
* Excel and other tools sometimes use other delimeters than comma.
* This can be used to detect such cases
*/
if (!function_exists('detect_delimiter')) {
  function detect_delimiter($csvFile){
    $delimiters = array(
        ';' => 0,
        ',' => 0,
        "\t" => 0,
        "|" => 0
    );

    $handle = fopen($csvFile, "r");
    $firstLine = fgets($handle);
    fclose($handle);
    foreach ($delimiters as $delimiter => &$count) {
        $count = count(str_getcsv($firstLine, $delimiter));
    }

    return array_search(max($delimiters), $delimiters);
  }
}
