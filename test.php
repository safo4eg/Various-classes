<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    require_once('classes/Link.php');

    $link = new Link('ссылка на гугл', 'https://google.com');
    $link->setText('google.com');
    echo $link;
