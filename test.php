<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    require_once('classes/Tag.php');

    $tag = new Tag('div');
    echo $tag->setAttrs(['id' => 'unique', 'class' => 'class1 class2'])->open();
    echo $tag->close();