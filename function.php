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

    function tabToArray($src='', $delimiter=',', $is_file = true)
    {
        if($is_file && (!file_exists($src) || !is_readable($src)))
            return FALSE;
    
        $header = NULL;
        $data = array();
    
        if($is_file){
            if (($handle = fopen($src, 'r')) !== FALSE)
            {
                while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
                {
                    if(!$header)
                        $header = $row;
                    else
                        $data[] = array_combine($header, $row);
                }
                fclose($handle);
            }
        }
        else{
            $strArr = explode("\n",$src);
            foreach($strArr as $dataRow){
                if($row = explode($delimiter,$dataRow))
                {
                    if(!$header)
                        $header = $row;
                    else
                        $data[] = array_combine($header, $row);
                }
            }
        }
    
        return $data;
    }

    /**
     * Functions for reading files
     * 
     * Takes given file name if it exists opens it
     */
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
        ##echo '<br>';
        ##echo '<br>';
      
        ##$rows   = array_map('str_getcsv', file($fileName));
        //Get the first row that is the HEADER row.
        ##$header_row = array_shift($rows);
        //This array holds the final response.
        ##$employee_csv    = array();
        ##foreach($rows as $row) {
        ##    if(!empty($row)){
        ##        $employee_csv[] = array_combine($header_row, $row);
        ##    }
        ##}
 
        ##print_r($employee_csv);


        
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

