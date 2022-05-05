<?php
    
    #Test Function
    function foo()
    {
        echo "Its working";
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }

    #Functions for reading files
    function reading_csv($file_name)
    {
        # Opens selected file ir read only
        $file = fopen($file_name, "r");
        # Displays it's content
        while (list($first_name, $age, $gender) = fgetcsv($file, 1024, ',')) {
            printf("<p>%s , %s , %s</p>", $first_name, $age, $gender);
        }
        # Closes file
        fclose($file);
    }

    function reading_json($file_name)
    {
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
    
    function reading_xml($file_name)
    {
        # Lodes file
        $file = simplexml_load_file($file_name) or die("Failed to load");
        # # Displays it's content
        foreach ($file->children() as $per) {
            echo $per->first_name . ", ";
            echo $per->age . ", ";
            echo $per->gender . "<br>";
        }
    }

    #Functions for writing files
    function writing_csv($file_name, $emp, $data)
    {
        $file = fopen($file_name, "w");
        fputcsv($file, $emp);
        foreach($data as $fields){
            fputcsv($file, $fields);
        }
    }

    function writing_json($file_name, $data)
    {
        $json = json_encode(array("data" => $data));
        if(file_put_contents($file_name, $json)){
            echo "JSON file created succssesfully...<br>";
            echo $json;
        }else{
            echo "Oops! Error creating json file...";
        }

    }

    function writing_xml($file_name, $data)
    {
        $xml = new DOMDocument();
        
        $rootNode = $xml->appendChild($xml->createElement("items"));

        foreach ($data as $per) {
            if (! empty($per)) {
                $itemNode = $rootNode->appendChild($xml->createElement('item'));
                foreach ($per as $k => $v) {
                    $itemNode->appendChild($xml->createElement($k, $v));
                }
            }
        }

        $xml->formatOutput = true;

        $xml->save($file_name);
    }

    #Functions for downloding files
    function downlode_csv($file_name)
    {
        header('Content-Description: File Transfer');
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=".basename($file_name));
        header("Content-Transfer-Encoding: UTF-8");
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_name));
        ob_clean();
        flush();

        readfile($file_name);
    }

    function downlode_json($data)
    {
        $json = json_encode($data);
        header('Content-type: application/json');
        header('Content-disposition: attachment; filename=downlode.json');
        echo $json;
    }
    
    function downlode_xml($file_name, $data)
    {
        $xml = simplexml_load_file($file_name);
        header("Content-Description: File Transfer"); 
        header("Content-Type: text/xml"); 
        header("Content-Disposition: attachment; filename=$file_name"); 
        
        echo $xml;
    }
?>

