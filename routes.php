<?php

include $_ADMIN_PATH."/controllers/ItemController.php";
include $_ADMIN_PATH."/controllers/ItemBrandController.php";


if(strpos($_SERVER['REQUEST_URI'], "/shop/") !== false){

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
        if (count($_GET) == 0) {
            $items = ItemController::getAll();
        }
        if (isset($_GET['itemID'])){
            $showItem = ItemController::showItem($_GET['itemID']);
            $items = ItemController::getAll();
        }    
        if (isset($_GET['goToEdit'])){
            $item = ItemController::showItem($_GET['showItemID']);
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
        if (isset($_GET['filter'])){
            // $_GET['filterByBrand'] = explode(",",$_GET['filterByBrand']);
            // // print_r($_GET["filterByBrand"]);
        //    echo ($_GET['filterByBrand']);
           
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
    
    $shoesBrands = ItemBrandController::getAll();
    // print_r($shoesBrands);
    // echo (count($shoesBrands));
}


if(strpos($_SERVER['REQUEST_URI'], "/brand/") !== false){

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
        if (count($_GET) == 0) {
            $brands = ItemBrandController::getAll();
        }

        if (isset($_GET['brandID'])){
            $showBrand = ItemBrandController::showBrand($_GET['brandID']);
        }    

        if (isset($_GET['goToEdit2'])){
            $brand = ItemBrandController::showBrand($_GET['showBrandID']);
        }

        if (isset($_GET['deleteBrand'])){
            ItemBrandController::deleteBrand($_GET['showBrandID']);
            header("Location: ".$_USER_PATH."/views/brand/showAll.php");
            die;
        }
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['addBrand'])) {
            ItemBrandController::addBrand();
            header("Location: ".$_USER_PATH."/views/brand/showAll.php");
            die;
        }
        if (isset($_POST['editBrandItem'])) {
            ItemBrandController::updateItem();
            header("Location: ".$_USER_PATH."/views/brand/showAll.php");
            die;
        }
    }
    
    $shoesBrands = ItemBrandController::getAll();
}
?>