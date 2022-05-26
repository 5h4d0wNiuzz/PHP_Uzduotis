<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    #Task 3
    /**
     *Gets file type from index.php
     * 
     */
    $fileType = $_POST["type"];

    #include "function.php";
    include "../../arrays.php";
    include "../../autoload/bootstrap.php";
    $downloader = new downloader();
    $writer = new writer();
    /**
     * Cheks file extencion and if it's known runs coresponding writing function and then downlode funcion,
     * if file couldn't be found echo "File not found";
     */
    # Tests if file type is csv
    if($fileType == "csv"){
        $fileName = "downlode.csv";
        echo $writer->writingCsv($fileName, $emp, $data);
        echo $downloader->downlodeCsv($fileName);
    }
    # Tests if file type is xml
    elseif($fileType == "xml"){
        $fileName = "downlode.xml";        
        echo $writer->writingXml($fileName, $data);
        echo $downloader->downlodeXml($fileName, $data);
    }
    # Tests if file type is json
    elseif($fileType == "json"){
        echo $downloader->downlodeJson($data);
    }
    # File type not found
    else{
        echo "error";
    }
?>
