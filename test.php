<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    require_once('classes/Image.php');

    $image = new Image();
    $image->setAttrs(['src' => 'test.jpg', 'width' => '300', 'height' => '400']);
    echo $image;