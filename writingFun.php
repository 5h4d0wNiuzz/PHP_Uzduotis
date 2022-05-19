<?php
    class writingFun {
        function writingCsv($fileName, $emp, $data)
        {
            $file = fopen($fileName, "w");
            fputcsv($file, $emp);
            foreach($data as $fields){
                fputcsv($file, $fields);
            }
        }

        function writingJson($fileName, $data)
        {
            $json = json_encode(array("data" => $data));
            if(file_put_contents($fileName, $json)){
                echo "JSON file created succssesfully...<br>";
                echo $json;
            }else{
                echo "Oops! Error creating json file...";
            }

        }

        function writingXml($fileName, $data)
        {
            $xml = new DOMDocument();
        
            $rootNode = $xml->appendChild($xml->createElement("items"));

            foreach ($data as $per) {
                if (! empty($per)) {
                    $itemNode = $rootNode->appendChild($xml->createElement('item'));
                    foreach ($per as $k => $v) {
                        $itemNode->appendChild($xml->createElement($k, $v));
                    }
                }
            }

            $xml->formatOutput = true;

            $xml->save($fileName);
        }
    }
?>