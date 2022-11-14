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
        $item->price = $_POST['price'];
        $item->size = $_POST['size'];
        $item->about = $_POST['about'];
        $item->brandID = $_POST['brand'];
        $item->update();
    }

    public static function deleteItem($id)
    {
        Item::destroy($id);
    }

    public static function search()
    {
        return Item::search();
    }

    // public static function getBrands()
    // {
    //     $brands = Item::getBrands();
    //     return $brands;
    // }

    // public static function filter()
    // {
    //     $items = Item::filter();
    //     return $items;
    // }



}
?>