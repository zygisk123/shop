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

    public static function search()
    {
        $items = [];
        $db = new DB();
        $query = "SELECT * FROM `items` WHERE `name` like  \"%" . $_GET['search'] . "%\"";
        $result = $db->conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $items[] = new Item($row['id'], $row['name'], $row['brand'], $row['price'], $row['size'], $row['about']);
        }
        $db->conn->close();
        return $items;

    }
    public static function getBrands()
    {
        $brands = [];
        $db = new DB();
        $query = "SELECT DISTINCT `brand` FROM `items`";
        $result = $db->conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $brands[] = $row["brand"];
        }
        // print_r($categories);
        // die;
        $db->conn->close();
        return $brands;
    }

    public static function filter()
    {
        $items = [];
        $db = new DB();
        $query = "SELECT * FROM `items`";
        $first = true;
        $priceRangeAdded = false;
        if ($_GET['filterByBrand'] != "") {
            $brandArray = $_GET['filterByBrand'];
            for ($i=0; $i < count($brandArray); $i++) { 
                if ($i == 0 && $brandArray[$i] != "") {
                    $query .= " WHERE `brand` = '" . $brandArray[$i] . "'";
                    $first = false;
                    if ($_GET['userInputFrom'] != ""){
                        // echo $_GET['userInputFrom'];
                        // die;
                        $query .= (($first)? " WHERE " : " AND ") . " `price` >= " . $_GET['userInputFrom'] . " ";
                        $first = false;
                        $priceRangeAdded = true;
                    }
                    if ($_GET['userInputTo'] != ""){
                        $query .= (($first)? " WHERE " : " AND ") . " `price` <= " . $_GET['userInputTo'] . " ";
                        $first = false;
                        $priceRangeAdded = true;
                    }
                    if (isset($_GET["from"])) {
                        if ($_GET["from"] != "") {
                            $query .= (($first)? " WHERE " : " AND ") . " `price` >= " . $_GET['from'] . " ";
                            $first = false;
                            $priceRangeAdded = true;
                            if (!isset($_GET["to"])) {
                                $priceTo = $_GET["from"] + $_GET["from"] * 1.5;
                                $query .= (($first)? " WHERE " : " AND ") . " `price` <= " . $priceTo . " ";
                                $first = false;
                                $priceRangeAdded = true;
                                
                            }
                        }
                    }
                    if (isset($_GET["to"])) {
                        if ($_GET["to"] != "") {
                            $query .= (($first)? " WHERE " : " AND ") . " `price` <= " . $_GET['to'] . " ";
                            $first = false;
                            $priceRangeAdded = true;
                        }else{
                            $priceTo = $_GET["from"] + $_GET["from"] * 1.5;
                            $query .= (($first)? " WHERE " : " AND ") . " `price` <= " . $priceTo . " ";
                            $first = false;
                            $priceRangeAdded = true;
                        }
                    }
                }elseif ($brandArray[$i] != ""){
                    $query .= " OR `brand` = '" . $brandArray[$i] . "'";
                    if ($_GET['userInputFrom'] != ""){
                        // echo $_GET['userInputFrom'];
                        // die;
                        $query .= (($first)? " WHERE " : " AND ") . " `price` >= " . $_GET['userInputFrom'] . " ";
                        $first = false;
                        $priceRangeAdded = true;
                    }
                    if ($_GET['userInputTo'] != ""){
                        $query .= (($first)? " WHERE " : " AND ") . " `price` <= " . $_GET['userInputTo'] . " ";
                        $first = false;
                        $priceRangeAdded = true;
                    }
                    if (isset($_GET["from"])) {
                        if ($_GET["from"] != "") {
                            $query .= (($first)? " WHERE " : " AND ") . " `price` >= " . $_GET['from'] . " ";
                            $first = false;
                            $priceRangeAdded = true;
                            if (!isset($_GET["to"])) {
                                $priceTo = $_GET["from"] + $_GET["from"] * 1.5;
                                $query .= (($first)? " WHERE " : " AND ") . " `price` <= " . $priceTo . " ";
                                $first = false;
                                $priceRangeAdded = true;
                                
                            }
                        }
                    }
                    if (isset($_GET["to"])) {
                        if ($_GET["to"] != "") {
                            $query .= (($first)? " WHERE " : " AND ") . " `price` <= " . $_GET['to'] . " ";
                            $first = false;
                            $priceRangeAdded = true;
                        }else{
                            $priceTo = $_GET["from"] + $_GET["from"] * 1.5;
                            $query .= (($first)? " WHERE " : " AND ") . " `price` <= " . $priceTo . " ";
                            $first = false;
                            $priceRangeAdded = true;
                        }
                    }
                }
            }
        }
        if (!$priceRangeAdded) {
            if ($_GET['userInputFrom'] != ""){
                // echo $_GET['userInputFrom'];
                // die;
                $query .= (($first)? " WHERE " : " AND ") . " `price` >= " . $_GET['userInputFrom'] . " ";
                $first = false;
                $priceRangeAdded = true;
            }
            if ($_GET['userInputTo'] != ""){
                $query .= (($first)? " WHERE " : " AND ") . " `price` <= " . $_GET['userInputTo'] . " ";
                $first = false;
                $priceRangeAdded = true;
            }
            if (isset($_GET["from"])) {
                if ($_GET["from"] != "") {
                    $query .= (($first)? " WHERE " : " AND ") . " `price` >= " . $_GET['from'] . " ";
                    $first = false;
                    $priceRangeAdded = true;
                    if (!isset($_GET["to"])) {
                        $priceTo = $_GET["from"] + $_GET["from"] * 1.5;
                        $query .= (($first)? " WHERE " : " AND ") . " `price` <= " . $priceTo . " ";
                        $first = false;
                        $priceRangeAdded = true;
                        
                    }
                }
            }
            if (isset($_GET["to"])) {
                if ($_GET["to"] != "") {
                    $query .= (($first)? " WHERE " : " AND ") . " `price` <= " . $_GET['to'] . " ";
                    $first = false;
                    $priceRangeAdded = true;
                }else{
                    $priceTo = $_GET["from"] + $_GET["from"] * 1.5;
                    $query .= (($first)? " WHERE " : " AND ") . " `price` <= " . $priceTo . " ";
                    $first = false;
                    $priceRangeAdded = true;
                }
            }
        }
        if (isset($_GET['sort'])) {
            if ($_GET['sort'] != "") {
                switch ($_GET['sort']) {
                    case '1':
                        $query .= " ORDER by `price`";
                        break;
                    case '2':
                        $query .= " ORDER by `price` DESC";
                        break;
                    case '3':
                        $query .= " ORDER by `name`";
                        break;
                    case '4':
                        $query .= " ORDER by `name` DESC";
                        break;
                    
                }
    
            }

        }
        echo $query;
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $items[] = new Item($row['id'], $row['name'], $row['brand'], $row['price'], $row['size'], $row['about']);
        }
        $db->conn->close();
        return $items;
    }

}
?>