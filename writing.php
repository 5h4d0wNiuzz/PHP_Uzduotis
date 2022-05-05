<?php
    # Gets file name from index.php
    $file_name = $_POST["file_name"];
    # Gets file name extencion
    $part = pathinfo($file_name);
    # Cheks if extencion is csv
    include "function.php";
    include "arrays.php";
    if($part['extension'] == "csv"){
        # Opens file and puts content from array
        writing_csv($file_name, $emp, $data);
        reading_csv($file_name);
    }
    # Cheks if extencion is json
    elseif ($part['extension'] == "json"){
        # Encodes data form array
        writing_json($file_name, $data);
        #reading_json($file_name);
            }
    # Cheks if extencion is xml
    elseif ($part['extension'] == "xml"){
        # Creates new document and puts data from array
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