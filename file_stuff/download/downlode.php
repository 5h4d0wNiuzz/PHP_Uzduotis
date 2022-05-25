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
    $downloadeFun = new downloadeFun();
    $writingFun = new writingFun();
    /**
     * Cheks file extencion and if it's known runs coresponding writing function and then downlode funcion,
     * if file couldn't be found echo "File not found";
     */
    # Tests if file type is csv
    if($fileType == "csv"){
        $fileName = "downlode.csv";
        echo $writingFun->writingCsv($fileName, $emp, $data);
        echo $downloadeFun->downlodeCsv($fileName);
    }
    # Tests if file type is xml
    elseif($fileType == "xml"){
        $fileName = "downlode.xml";        
        echo $writingFun->writingXml($fileName, $data);
        echo $downloadeFun->downlodeXml($fileName, $data);
    }
    # Tests if file type is json
    elseif($fileType == "json"){
        echo $downloadeFun->downlodeJson($data);
    }
    # File type not found
    else{
        echo "error";
    }
?>
