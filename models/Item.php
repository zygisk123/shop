<?php

include $_ADMIN_PATH.('/models/DB.php');

class Item {
    public $id;
    public $name;
    public $brand;
    public $price;
    public $size;
    public $about;

    public function __construct($id = null, $name = null, $brand = null, $price = null, $size = null, $about = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->brand = $brand;
        $this->price = $price;
        $this->size = $size;
        $this->about = $about;
    }

    public static function all()
    {
        $items = [];
        $db = new DB();
        $query = "SELECT * FROM `items`";
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $items[] = new Item($row['id'], $row['name'], $row['brand'], $row['price'], $row['size'], $row['about']);
        }
        $db->conn->close();
        return $items;
    }

    public static function create()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("INSERT INTO `items`( `name`, `brand`, `price`, `size`, `about`) VALUES (?,?,?,?,?)");
        $stmt->bind_param("ssdds", $_POST['name'], $_POST['brand'], $_POST['price'], $_POST['size'], $_POST['about']);
        $stmt->execute();

        $stmt->close();
        $db->conn->close();
    }

    public static function find($id)
    {
        $item = new Item();
        $db = new DB();
        $query = "SELECT * FROM `items` WHERE `id` = " . $id;
        $result = $db->conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $item = new Item($row['id'], $row['name'], $row['brand'], $row['price'], $row['size'], $row['about']);
        }
        $db->conn->close();
        return $item;
    }

    public function update()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("UPDATE `items` SET `name`= ?,`brand`= ?,`price`= ?, `size` = ?, `about` = ? WHERE `id` = ?");
        $stmt->bind_param("ssddsi", $this->name, $this->brand, $this->price, $this->size, $this->about, $this->id);
        $stmt->execute();
        $stmt->close();
        $db->conn->close();
    }

    public static function destroy($id)
    {
        $db = new DB();
        $stmt = $db->conn->prepare("DELETE FROM `items` WHERE `id` = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $stmt->close();
        $db->conn->close(); 
    }


}
?>