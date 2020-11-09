<?php

/*
* Read a csv file containing two rows personId and groupId
*/
if (! function_exists('read_file')) {
    function read_file($file)
    {
        $persons = [];
        $delimiter = detect_delimiter($file);

        // Create array from file contents (personID, groupID)
        $fp = fopen($file, 'rb');
        while (! feof($fp)) {
            $line = fgetcsv($fp, null, $delimiter);

            //Only include lines with two columns
            if (isset($line[0]) > 0 && isset($line[1]) > 0) {
                $persons[] = $line;
            }
        }

        return $persons;
    }
}

/*
* Excel and other tools sometimes use other delimeters than comma.
* This can be used to detect such cases
*/
if (! function_exists('detect_delimiter')) {
    function detect_delimiter($csvFile)
    {
        $delimiters = [
        ';' => 0,
        ',' => 0,
        "\t" => 0,
        '|' => 0,
    ];

        $handle = fopen($csvFile, 'r');
        $firstLine = fgets($handle);
        fclose($handle);
        foreach ($delimiters as $delimiter => &$count) {
            $count = count(str_getcsv($firstLine, $delimiter));
        }

        return array_search(max($delimiters), $delimiters);
    }
}
