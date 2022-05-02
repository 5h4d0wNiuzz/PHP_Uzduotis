<?php
    # 3 Task
    # Array
    $emp = array("first_name" , "age" , "gender");

    $data = array(
        "0" => array(
            "first_name" => "Kiestis",
            "age" => 29,
            "gender" => "male"
        ),
        "1" => array(
            "first_name" => "Vytska",
            "age" => 32,
            "gender" => "male"
        ),
        "2" => array(
            "first_name" => "Karina",
            "age" => 25,
            "gender" => "female"
        ),
    );
    # Gets file type from index.php
    $file_type = $_POST["type"];
    # Tests if file type is csv
    if($file_type == "csv"){
        # Downlodes csv file
        $file_name = "downlode.csv";
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=$file_name");
        $output = fopen("php://output", "w");
        $header = array_keys($data[0]);
        fputcsv($output, $header);
        foreach($data as $row){
            fputcsv($output, $row);
        }
        fclose($output);
    }
    # Tests if file type is xml
    elseif($file_type == "xml"){
        # Downlodes xml file
        $xml = new DOMDocument();
        $xml_file_name = "downlode.xml";        
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
        $xml->save($xml_file_name);
        header("Content-type: text/xml");
        header("Content-Disposition: attachment; filename=$xml_file_name");
        readfile($xml);
        exit();
    }
    # Tests if file type is json
    elseif($file_type == "json"){
        # Downlodes json file
        $json = json_encode($data);
        header('Content-type: application/json');
        header('Content-disposition: attachment; filename=downlode.json');
        echo $json;
    }
    # File type not found
    else{
        echo "error";
    }
?>

