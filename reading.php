<html>
    <head>
        <title>Reading_form_file</title>
    </head>
    <body>
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php

            include "function.php";

            # Task 1
            $file_name = $_POST["file_name"];
            $part = pathinfo($file_name);
            # Cheks if extencion is csv
            if($part['extension'] == "csv"){
                reading_csv($file_name);
            }
            #Cheks if extencion is json
            elseif ($part['extension'] == "json"){
                reading_json($file_name);
            }
            #Cheks if extencion is xml
            elseif ($part['extension'] == "xml"){
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
    </body>
</html>