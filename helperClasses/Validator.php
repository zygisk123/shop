<?php

class Validator{


public static function validate()
{
    $hasError = false;
    if ($_POST['name'] == "") {
        $_SESSION['errors'][] = "Būtina nurodyti prekės pavadinimą";
        $hasError = true;
    }
    if (isset($_POST['shoeBrand']) and $_POST['shoeBrand'] == "") {
        $_SESSION['errors'][] = "Būtina nurodyti prekės gamintoja";
        $hasError = true;
    }
    if (isset($_POST['brand']) and $_POST['brand'] == "") {
        $_SESSION['errors'][] = "Būtina nurodyti prekės gamintoja";
        $hasError = true;
    }
    if ($_POST['price'] == "") {
        $_SESSION['errors'][] = "Būtina nurodyti prekės kaina";
        $hasError = true;
    }
    if (!is_numeric($_POST['price'])) {
        $_SESSION['errors'][] = "Kaina privalo buti skaicius. (pvz. 10, 10.50)";
        $hasError = true;
    }
    if ($_POST['size'] == "") {
        $_SESSION['errors'][] = "Būtina nurodyti prekės dydi";
        $hasError = true;
    }
    if (!is_numeric($_POST['size'])) {
        $_SESSION['errors'][] = "Prekes dydis privalo buti skaicius (pvz. 10, 10.50)";
        $hasError = true;
    }
    if ($_POST['about'] == "") {
        $_SESSION['errors'][] = "Būtina nurodyti prekės aprasyma";
        $hasError = true;
    }

    if($hasError){
        foreach ($_POST as $key => $value) {
            $_SESSION['POST'][$key] = $value;
        }
    }
    
    return $hasError;
}

public static function validateFilter()
{
    $hasError = false;
    
    if ($_GET['userInputTo'] < $_GET['userInputFrom']) {
        $_SESSION['errors'][] = "Kaina Nuo negali buti mazesne uz kaina iki";
        $hasError = true;
        
    }
    if($hasError){
        foreach ($_GET as $key => $value) {
            $_SESSION['GET'][$key] = $value;
        }
    }
    return $hasError;
}










}

?>