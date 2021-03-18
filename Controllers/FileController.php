<?php 

namespace Controllers;

require "../Models/FileModel.php";
require "../Services/IopenFile.php";

use Models\FileModel;
use Services\IopenFile;

class FileController extends FileModel implements IopenFile
{
    // Check if file exists, check file format and open it
    
    public function openFile()
    {
    if (file_exists($this->fileName) === true) {
        if (strpos($this->fileName, '.json') !== false) {
            header('Content-Type: application/json');
            $strJsonFileContents = file_get_contents($this->fileName);
            print_r($strJsonFileContents);
        } elseif (strpos($this->fileName, '.csv')) {
            $row = 1;
            if (($openfile = fopen($this->fileName, "r")) !== FALSE) {
            while ($getdata = fgetcsv($openfile, 1000, ",")) {
                foreach ($getdata as $data) {
                    print("'" . $data . "',");
                    }
                    print("<br>");
                }
            }
        } elseif (strpos($this->fileName, '.xml')) {
            readfile($this->fileName);
            header('Content-type: text/xml');
        }
    } else {
            print "File not found";
        }
    }
}