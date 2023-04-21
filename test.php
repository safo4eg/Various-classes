<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    require_once('classes/Tag.php');

    $tag = new Tag('div');
    echo $tag->open()."text".$tag->close();
