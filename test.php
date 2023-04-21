<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    require_once('classes/ListItem.php');
    require_once('classes/HtmlList.php');

    $li1 = new ListItem('item1');
    $li2 = new ListItem('item2');
    $li3 = new ListItem('item3');

    $list = new HtmlList('ul');
    $list->addItem($li1)->addItem($li2)->addItem($li3);
    echo $list;
