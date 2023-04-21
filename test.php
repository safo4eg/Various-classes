<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    require_once('classes/Tag.php');

    $tag = new Tag('input');
    echo $tag->addClass('class1')->addClass('class2')->removeClass('class2')->open();
    echo $tag->close();