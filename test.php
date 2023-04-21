<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    require_once('classes/Tag.php');

    $tag = new Tag('input');
    echo $tag->setAttrs(['id' => 'unique', 'class' => 'class1 class2', 'disabled' => true])->open();
    echo $tag->close();