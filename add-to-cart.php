<?php
@session_start();
require_once('config.php');


if (isset($_POST['gears'])) {
    $qty = intval($_POST['gears']);
    if (is_int($qty)) {
        $_SESSION['products']['gears'] += $qty;
        header('location: gears.php');
        die();
    }
}

if (isset($_POST['brushes'])) {
    $qty = intval($_POST['brushes']);
    if (is_int($qty)) {
        $_SESSION['products']['brushes'] += $qty;
        header('location: brushes.php');
        die();
    }
}

if (isset($_POST['wrenches'])) {
    $qty = intval($_POST['wrenches']);
    if (is_int($qty)) {
        $_SESSION['products']['wrenches'] += $qty;
        header('location: wrenches.php');
        die();
    }
}

if(isset($_POST['empty'])){
    foreach($_SESSION['products'] as $item => $qty){
        $_SESSION['products'][$item] = 0;
    }
    header('location: checkout.php');
    die();
}
    
?>