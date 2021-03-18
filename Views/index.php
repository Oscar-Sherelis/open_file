<?php 
require "../Controllers/FileController.php";

use Controllers\FileController;

$fileObj = new FileController;
$fileObj->openFile();

?>