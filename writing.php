<?php
    #Task 2
    /**
     * Gets file name from index.php
     */
    
    $fileName = $_POST["file_name"];
    $part = pathinfo($fileName);
    
    #include "function.php";
    include "arrays.php";
    include "bootstrap.php";
    $readingFun = new readingFun();
    $writingFun = new writingFun();

    /**
     * Cheks file extencion and if it's known runs coresponding writing function and then reading,
     * if file extenchen isn't known echo "Check file name";
     * if file couldn't be found echo "File not found";
     */
    # Cheks if extencion is csv
    if($part['extension'] == "csv"){
        echo $writingFun->writingCsv($fileName, $emp, $data);
        echo $readingFun->readingCsv($fileName);
    }
    # Cheks if extencion is json
    elseif ($part['extension'] == "json"){
        echo $writingFun->writingJson($fileName, $data);
        echo $readingFun->readingJson($fileName);
            }
    # Cheks if extencion is xml
    elseif ($part['extension'] == "xml"){
        echo $writingFun->writingXml($fileName, $data);
        echo $readingFun->readingXml($fileName);
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