<?php

include $_ADMIN_PATH."/controllers/ItemController.php";


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (count($_GET) == 0) {
        $items = ItemController::getAll();
    }
    if (isset($_GET['itemID'])){
        $item = ItemController::showItem($_GET['itemID']);
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
    if (isset($_GET['filterByBrand'])){
        $_GET['filterByBrand'] = explode(",",$_GET['filterByBrand']);
        if (isset($_GET['sortByPrice1-9'])) {
            $_GET['sort'] = $_GET['sortByPrice1-9'];
        }        
        if (isset($_GET['sortByPrice9-1'])) {
            $_GET['sort'] = $_GET['sortByPrice9-1'];
        }
        if (isset($_GET['sortByBrandA-Z'])) {
            $_GET['sort'] = $_GET['sortByBrandA-Z'];
        }
        if (isset($_GET['sortByBrandZ-A'])) {
            $_GET['sort'] = $_GET['sortByBrandZ-A'];
        }
        if ($_GET['from'] != "") {
            echo $_GET['from'] . ' ' . $_GET['to'];
            die;
        }
        $items = ItemController::filter();

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



$brands = ItemController::getBrands();
$filterBrands = []; 
?>