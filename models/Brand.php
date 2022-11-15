<?php

class Brand {
    public $id;
    public $name;
    public $items;

    public function __construct($id = null, $name = null, $items = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->items = $items;

    }

    public static function all()
    {
        $brands = [];
        $db = new DB();
        $query = "SELECT `sb`.`id`, `sb`.`brandName`, COUNT(`i`.`id`) AS 'items' FROM `items` `i` right JOIN `shoe_brands` `sb` ON `sb`.`id` = `i`.`brand_id` GROUP BY `sb`.`id`";
    //    $query = "SELECT * FROM `shoe_brands`";
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $brands[] = new Brand($row['id'], $row['brandName'], $row['items']);
        }
        $db->conn->close();
        return $brands;
    }

    public static function create()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("INSERT INTO `shoe_brands`(`brandName`) VALUES (?)");
        $stmt->bind_param("s", $_POST['name']);
        $stmt->execute();

        $stmt->close();
        $db->conn->close();
    }

    public static function find($id)
    {
        $brand = new Brand();
        $db = new DB();
        $query = "SELECT `sb`.`id`, `sb`.`brandName`, count(*) as 'items' FROM `items` `i` JOIN `shoe_brands` `sb` ON `sb`.`id` = `i`.`brand_id` WHERE `sb`.`id` = " . $id;
        echo $query;
        $result = $db->conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $brand = new Brand($row['id'], $row['brandName'], $row['items']);
        }
        $db->conn->close();
        return $brand;
    }

    public function update()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("UPDATE `shoe_brands` SET `brandName`= ? WHERE `id` = ?");
        $stmt->bind_param("si", $this->name, $this->id);
        $stmt->execute();
        $stmt->close();
        $db->conn->close();
    }

    public static function destroy($id)
    {
        $db = new DB();
        $stmt = $db->conn->prepare("DELETE FROM `shoe_brands` WHERE `id` = ?");
        $stmt->bind_param("i", $id);
        if(!$stmt->execute()) {
            print_r( $stmt->error_list);
           }

        $stmt->close();
        $db->conn->close(); 
    }

    public static function getCount()
    {
        $brandsCount = [];
        $db = new DB();
        $query = "SELECT count(*) as amount FROM `items` `i` JOIN `shoe_brands` `sb` ON `sb`.`id` = `i`.`brand_id` GROUP BY `sb`.`id`";
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $brandsCount[] = new Brand($row['id'], $row['brandName']);
        }
        $db->conn->close();
        return $brands;
    }

}
?>