<?php
    class readingFun {
        function readingCsv($fileName)
        {
            $arrTest = array();
            echo foo();
            echo '<br>';
            # Opens selected file ir read only
            $file = fopen($fileName, "r");
            # Displays it's content
            while (list($firstName, $age, $gender) = fgetcsv($file, 1024, ',')) {
                printf("<p>%s , %s , %s</p>", $firstName, $age, $gender);
                $ang = [$age => $gender];
                $arrTest += [$firstName => $ang ];
            }
            # Closes file
            fclose($file);
            $encode = json_encode($file);
            $newArr = json_decode($encode, true);
            print_r($newArr);
        
        }

        function readingJson($fileName)
        {
            # Gets file content
            $file = file_get_contents($fileName);
            # Decodes file
            $decode = json_decode($file, true);
            # Displays it's content
            foreach ($decode as $key => $value) {
                echo "<br>";
                foreach ($value as $v) {
                    echo $v . " ";
                }
            }
            echo '<br>';
            $filedata = file_get_contents($fileName);
            $details = json_decode($filedata, true);
            print_r($details);

        }   
    
        function readingXml($fileName)
        {
            # Lodes file
            $file = simplexml_load_file($fileName) or die("Failed to load");
            # # Displays it's content
            foreach ($file->children() as $per) {
                echo $per->first_name . ", ";
                echo $per->age . ", ";
                echo $per->gender . "<br>";
            }
            echo '<br>';
            $encode = json_encode($file);
            $newArr = json_decode($encode, true);
            print_r($newArr);
        }
    }
?>