
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
    include "function.php";
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
