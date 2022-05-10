<?php
    /**
     * Test Function
     */
    
    function foo()
    {
        echo "Its working";
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }

    /**
     * Functions for reading files
     * 
     * Takes given file name if it exists opens it
     */
    function readingCsv($fileName)
    {
        # Opens selected file ir read only
        $file = fopen($fileName, "r");
        # Displays it's content
        while (list($firstName, $age, $gender) = fgetcsv($file, 1024, ',')) {
            printf("<p>%s , %s , %s</p>", $firstName, $age, $gender);
        }
        # Closes file
        fclose($file);
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
    }
    
    /**
     *Functions for writing files
     *
     * Takes given name if it exists opens it if doesn't creates it
     */
    function writingCsv($fileName, $emp, $data)
    {
        $file = fopen($fileName, "w");
        fputcsv($file, $emp);
        foreach($data as $fields){
            fputcsv($file, $fields);
        }
    }

    function writingJson($fileName, $data)
    {
        $json = json_encode(array("data" => $data));
        if(file_put_contents($fileName, $json)){
            echo "JSON file created succssesfully...<br>";
            echo $json;
        }else{
            echo "Oops! Error creating json file...";
        }

    }

    function writingXml($fileName, $data)
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

        $xml->save($fileName);
    }

    /**
     *#Functions for downloding files
     *
     * setups download through headers
     */
     function downlodeCsv($fileName)
    {
        header('Content-Description: File Transfer');
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=".basename($fileName));
        header("Content-Transfer-Encoding: UTF-8");
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($fileName));
        ob_clean();
        flush();

        readfile($fileName);
    }

    function downlodeJson($data)
    {
        $json = json_encode($data);
        header('Content-type: application/json');
        header('Content-disposition: attachment; filename=downlode.json');
        echo $json;
    }

    function downlodeXml($fileName, $data)
    {
        $xml = file_get_contents($fileName);

        header("Content-Type: text/xml"); 
        header("Content-Disposition: attachment; filename=".basename($fileName));
        header('Content-Length: ' . filesize($fileName));
        echo "<?xml version='1.0' encoding='utf-8'?>"; 
        
        print $xml;
    }
?>

