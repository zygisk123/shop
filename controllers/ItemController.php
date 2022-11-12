<?php

include $_ADMIN_PATH."/models/Item.php";
class ItemController {

    public static function getAll()
    {
        return Item::all();
    }

    public static function addItem()
    {
        Item::create();
    }




}
?>