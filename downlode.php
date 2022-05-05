<?php
    # Gets file type from index.php
    $file_type = $_POST["type"];
    
    include "function.php";
    include "arrays.php";
    
    # Tests if file type is csv
    if($file_type == "csv"){
        $file_name = "downlode.csv";
        writing_csv($file_name, $emp, $data);
        downlode_csv($file_name);
    }
    # Tests if file type is xml
    elseif($file_type == "xml"){
        $file_name = "downlode.xml";        
        writing_xml($file_name, $data);
        downlode_xml($file_name, $data);
    }
    # Tests if file type is json
    elseif($file_type == "json"){
        downlode_json($data);
    }
    # File type not found
    else{
        echo "error";
    }
?>