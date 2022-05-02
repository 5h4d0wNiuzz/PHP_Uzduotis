<html>
    <head>
        <title>Reading_form_file</title>
    </head>
    <body>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="function.php">
        <?php
            # Task 1
            # Gets file name from index.php
            $file_name = $_POST["file_name"];
            # Gets file name extencion
            $part = pathinfo($file_name);
            # Cheks if extencion is csv
            if($part['extension'] == "csv"){
                reading_csv();
            }
            #Cheks if extencion is json
            elseif ($part['extension'] == "json"){
                reading_json();
            }
            #Cheks if extencion is xml
            elseif ($part['extension'] == "xml"){
                reading_xml();
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
    </body>
</html>