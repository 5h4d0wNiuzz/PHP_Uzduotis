<?php
    # Gets file type from index.php
    $file_type = $_POST["type"];
    # Tests if file type is csv
    include "function.php";
    include "arrays.php";
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