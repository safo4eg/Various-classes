<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    require_once('classes/form/Form.php');
    require_once('classes/form/Input.php');

    $form = new Form();
    $form->setAttrs(['action' => 'test.php', 'method' => 'POST']);

    $input_login = new Input();
    $input_login->setAttrs(['value' => 'login', 'name' => 'login']);

    $input_submit = new Input();
    $input_submit->setAttrs(['value' => 'Send', 'type' => 'submit']);

    echo $form->open()."\r\n";
    echo $input_login."\r\n";
    echo $input_submit."\r\n";
    echo $form->close()."\r\n";

    if(!empty($_POST)) {
        echo var_dump($_POST);
    }
