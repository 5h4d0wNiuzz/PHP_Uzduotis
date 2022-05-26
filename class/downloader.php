<?php
    class downloader {
        function downlodeCsv($fileName)
        {
            header('Content-Description: File Transfer');
            header("Content-type: application/csv");
            header("Content-Disposition: attachment; filename=".basename($fileName));
            header("Content-Transfer-Encoding: UTF-8");
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($fileName));
            ob_clean();
            flush();

            readfile($fileName);
        }

        function downlodeJson($data)
        {
            $json = json_encode($data);
            header('Content-type: application/json');
            header('Content-disposition: attachment; filename=downlode.json');
            echo $json;
        }

        function downlodeXml($fileName, $data)
        {
            $xml = file_get_contents($fileName);

            header("Content-Type: text/xml"); 
            header("Content-Disposition: attachment; filename=".basename($fileName));
            header('Content-Length: ' . filesize($fileName));
            echo "<?xml version='1.0' encoding='utf-8'?>"; 
        
            print $xml;
        }
    }
?>