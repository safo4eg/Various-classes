<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    require_once('classes/File.php');

    $file = new File('/files/text/txt');

    echo $file->getPath().'<br>';
    echo $file->getDir().'<br>';
    echo $file->getName().'<br>';
    echo $file->getExt().'<br>';
    echo $file->getSize().'<br>';

