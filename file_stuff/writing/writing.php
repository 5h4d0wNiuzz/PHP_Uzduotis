<html>
    <head>
        <title>Writing_to_file</title>
    </head>
    <body>
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            #Task 2
            /**
             * Gets file name from index.php
             */
    
            $fileName = $_POST["file_name"];
            $part = pathinfo($fileName);
    
            #include "function.php";
            include "../../nav/nav.php";
            include "../../nav/footer.php";
            include "../../arrays.php";
            include "../../autoload/bootstrap.php";
            $reader = new reader();
            $writer = new writer();

            /**
             * Cheks file extencion and if it's known runs coresponding writing function and then reading,
             * if file extenchen isn't known echo "Check file name";
             * if file couldn't be found echo "File not found";
             */
            # Cheks if extencion is csv
            if($part['extension'] == "csv"){
                echo $writer->writingCsv($fileName, $emp, $data);
                echo $reader->readingCsv($fileName);
                print_r($reader->tabToArray($fileName));
            }
            # Cheks if extencion is json
            elseif ($part['extension'] == "json"){
                echo $writer->writingJson($fileName, $data);
                echo $reader->readingJson($fileName);
            }
            # Cheks if extencion is xml
            elseif ($part['extension'] == "xml"){
                echo $writer->writingXml($fileName, $data);
                echo $reader->readingXml($fileName);
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
        <form>
            <input type="button" value="Go back!" onclick="history.back()">
        </form>
    </body>
</html>