
<?php
    # Task 2
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
    # Gets file name from index.php
    $file_name = $_POST["file_name"];
    # Gets file name extencion
    $part = pathinfo($file_name);
    # Cheks if extencion is csv
    if($part['extension'] == "csv"){
        # Opens file and puts content from array
        $file = fopen($file_name, "a");
        fputcsv($file, $emp);
        foreach($data as $fields){
            fputcsv($file, $fields);
        }
        fclose($file);
        # Displays it's content
        $filew = fopen($file_name, "r");
        while(list($first_name,$age,$gender) = fgetcsv($filew,1024,',')){
            printf("<p>%s , %s , %s</p>",$first_name,$age,$gender);
        }
        
        fclose($filew);
    }
    # Cheks if extencion is json
    elseif ($part['extension'] == "json"){
        # Encodes data form array
        $json = json_encode(array("data" => $data));
        if(file_put_contents($file_name, $json)){
            echo "JSON file created succssesfully...<br>";
        }else{
            echo "Oops! Error creating json file...";
        }
        # Displays it's content
        echo $json;
            }
    # Cheks if extencion is xml
    elseif ($part['extension'] == "xml"){
        # Creates new document and puts data from array
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
        # Displays it's content
            $file = simplexml_load_file($file_name) or die("Failed to load");
        foreach($file->children() as $per){
            echo $per->first_name . ", ";
            echo $per->age . ", ";
            echo $per->gender . "<br>";
        }
    }
    # Cheks if File name doesn't contais extension
    elseif($part['extension'] == null){
        echo "Check file name";
    }
    # Cheks if file can be found
    else{
        echo "File not found";
    }
?>  
