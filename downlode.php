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
    include "function.php";
    if($file_type == "csv"){
        # Downlodes csv file
        $file_name = "downlode.csv";
        writing_csv($file_name, $emp, $data);
        downlode_csv($file_name);
    }
    # Tests if file type is xml
    elseif($file_type == "xml"){
        # Downlodes xml file
        $file_name = "downlode.xml";        
        writing_xml($file_name, $data);
        downlode_xml($file_name, $data);
    }
    # Tests if file type is json
    elseif($file_type == "json"){
        # Downlodes json file
        downlode_json($data);
    }
    # File type not found
    else{
        echo "error";
    }
?>