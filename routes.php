<?php

include $_ADMIN_PATH."/controllers/ItemController.php";
include $_ADMIN_PATH."/controllers/ItemBrandController.php";



if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (count($_GET) == 0) {
        $items = ItemController::getAll();
    }
    if (isset($_GET['itemID'])){
        $showItem = ItemController::showItem($_GET['itemID']);
        $items = ItemController::getAll();
    }    
    if (isset($_GET['goToEdit'])){
        $item = ItemController::showItem($_GET['id']);
        $items = ItemController::getAll();
    }
    if (isset($_GET['delete'])){
        $item = ItemController::deleteItem($_GET['id']);
        $items = ItemController::getAll();
        header("Location: ".$_USER_PATH."/views/shop/showAll.php");
        die;
    }
    if (isset($_GET['search'])){
        $searchItems = ItemController::search();
        $items = ItemController::getAll();
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

$shoesBrands = ItemBrandController::getAll();
?>