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

    public static function showItem($id)
    {
        return Item::find($id);
    }

    public static function updateItem()
    {
        $item = New Item();
        $item->id = $_POST['id'];
        $item->name = $_POST['name'];
        $item->brand = $_POST['brand'];
        $item->price = $_POST['price'];
        $item->size = $_POST['size'];
        $item->about = $_POST['about'];
        $item->update();
    }





}
?>