<?php
    #Task 3
    /**
     *Gets file type from index.php
     * 
     */
    $fileType = $_POST["type"];
    
    include "function.php";
    include "arrays.php";
    /**
     * Cheks file extencion and if it's known runs coresponding writing function and then downlode funcion,
     * if file couldn't be found echo "File not found";
     */
    # Tests if file type is csv
    if($fileType == "csv"){
        $fileName = "downlode.csv";
        writingCsv($fileName, $emp, $data);
        downlodeCsv($fileName);
    }
    # Tests if file type is xml
    elseif($fileType == "xml"){
        $fileName = "downlode.xml";        
        writingXml($fileName, $data);
        downlodeXml($fileName, $data);
    }
    # Tests if file type is json
    elseif($fileType == "json"){
        downlodeJson($data);
    }
    # File type not found
    else{
        echo "error";
    }
?>