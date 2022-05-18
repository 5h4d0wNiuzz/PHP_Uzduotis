<html>
    <head>
        <title>Reading_form_file</title>
    </head>
    <body>
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php

            include "function.php";

            # Task 1
            /**
             * Gets file name from index.php
             * Cheks file extencion and if it's known runs coresponding reading function,
             * if file extenchen isn't known echo "Check file name";
             * if file couldn't be found echo "File not found";
             */
            $fileName = $_POST["file_name"];
            $part = pathinfo($fileName);
            # Cheks if extencion is csv
            if($part['extension'] == "csv"){
                readingCsv($fileName);
                echo "\n";
                print_r(tabToArray($fileName));
            }
            #Cheks if extencion is json
            elseif ($part['extension'] == "json"){
                readingJson($fileName);
            }
            #Cheks if extencion is xml
            elseif ($part['extension'] == "xml"){
                readingXml($fileName);
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