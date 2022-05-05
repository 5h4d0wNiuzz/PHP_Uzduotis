<?php
    #Task 2
    # Gets file name from index.php
    $file_name = $_POST["file_name"];
    $part = pathinfo($file_name);
    
    include "function.php";
    include "arrays.php";

    # Cheks if extencion is csv
    if($part['extension'] == "csv"){
        writing_csv($file_name, $emp, $data);
        reading_csv($file_name);
    }
    # Cheks if extencion is json
    elseif ($part['extension'] == "json"){
        writing_json($file_name, $data);
            }
    # Cheks if extencion is xml
    elseif ($part['extension'] == "xml"){
        writing_xml($file_name, $data);
        reading_xml($file_name);
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