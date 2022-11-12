<?php

include $_ADMIN_PATH."/controllers/ItemController.php";


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (count($_GET) == 0) {
        $items = ItemController::getAll();
    }
    if (isset($_GET['itemID'])){
        $item = ItemController::showItem($_GET['itemID']);
    }    
    if (isset($_GET['goToEdit'])){
        $item = ItemController::showItem($_GET['id']);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['addItem'])) {
        ItemController::addItem();
        header("Location: ".$_USER_PATH."/views/shop/showAll.php");
        die;
    }
    if (isset($_POST['editItem'])) {
        ItemController::updateItem();
        header("Location: ".$_USER_PATH."/views/shop/showAll.php");
        die;
    }
}

?>