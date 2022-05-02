<?php
    class reading
    {
        public $file;
        public $file_name;
        public $First_name;
        public $age;
        public $gender;
        public $decode;
        public $value;
        public $v;
        public $per;

        function reading_csv{
            # Opens selected file ir read only
            $file = fopen($file_name, "r");
            # Displays it's content
            while (list($first_name, $age, $gender) = fgetcsv($file, 1024, ',')) {
                printf("<p>%s , %s , %s</p>", $first_name, $age, $gender);
            }
            # Closes file
            fclose($file);
        }

        function reading_json{
            # Gets file content
            $file = file_get_contents($file_name);
            # Decodes file
            $decode = json_decode($file, true);
            # Displays it's content
            foreach ($decode as $key => $value) {
                echo "<br>";
                foreach ($value as $v) {
                    echo $v . " ";
                }
            }
        }

        function reading_xml{
            # Lodes file
            $file = simplexml_load_file($file_name) or die("Failed to load");
            # # Displays it's content
            foreach ($file->children() as $per) {
                echo $per->first_name . ", ";
                echo $per->age . ", ";
                echo $per->gender . "<br>";
            }
        }
    }
    ?>

