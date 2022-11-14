<?php

class Brand {
    public $id;
    public $name;

    public function __construct($id = null, $name = null)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public static function all()
    {
        $brands = [];
        $db = new DB();
        $query = "SELECT * FROM `shoe_brands`";
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $brands[] = new Brand($row['id'], $row['brandName']);
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
        $query = "SELECT * FROM `shoe_brands` WHERE `id` = " . $id;
        $result = $db->conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $brand = new Brand($row['id'], $row['brandName']);
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

    public static function search()
    {
        $items = [];
        $db = new DB();
        $query = "SELECT * FROM `items` WHERE `name` like  \"%" . $_GET['search'] . "%\"";
        $result = $db->conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $items[] = new Item($row['id'], $row['name'], $row['price'], $row['size'], $row['about']);
        }
        $db->conn->close();
        return $items;

    }
    // public static function getBrands()
    // {
    //     $brands = [];
    //     $db = new DB();
    //     $query = "SELECT DISTINCT `brand` FROM `items`";
    //     $result = $db->conn->query($query);
    //     while ($row = $result->fetch_assoc()) {
    //         $brands[] = $row["brand"];
    //     }
    //     // print_r($categories);
    //     // die;
    //     $db->conn->close();
    //     return $brands;
    // }

//     public static function filter()
//     {
//         $items = [];
//         $db = new DB();
//         $query = "SELECT * FROM `items`";
//         $first = true;
//         $priceRangeAdded = false;
//         if ($_GET['filterByBrand'] != "") {
//             $brandArray = $_GET['filterByBrand'];
//             for ($i=0; $i < count($brandArray); $i++) { 
//                 if ($i == 0 && $brandArray[$i] != "") {
//                     $query .= " WHERE `brand` = '" . $brandArray[$i] . "'";
//                     $first = false;
//                     if ($_GET['userInputFrom'] != ""){
//                         // echo $_GET['userInputFrom'];
//                         // die;
//                         $query .= (($first)? " WHERE " : " AND ") . " `price` >= " . $_GET['userInputFrom'] . " ";
//                         $first = false;
//                         $priceRangeAdded = true;
//                     }
//                     if ($_GET['userInputTo'] != ""){
//                         $query .= (($first)? " WHERE " : " AND ") . " `price` <= " . $_GET['userInputTo'] . " ";
//                         $first = false;
//                         $priceRangeAdded = true;
//                     }
//                     if (isset($_GET["from"])) {
//                         if ($_GET["from"] != "") {
//                             $query .= (($first)? " WHERE " : " AND ") . " `price` >= " . $_GET['from'] . " ";
//                             $first = false;
//                             $priceRangeAdded = true;
//                             if (!isset($_GET["to"])) {
//                                 $priceTo = $_GET["from"] + $_GET["from"] * 1.5;
//                                 $query .= (($first)? " WHERE " : " AND ") . " `price` <= " . $priceTo . " ";
//                                 $first = false;
//                                 $priceRangeAdded = true;
                                
//                             }
//                         }
//                     }
//                     if (isset($_GET["to"])) {
//                         if ($_GET["to"] != "") {
//                             $query .= (($first)? " WHERE " : " AND ") . " `price` <= " . $_GET['to'] . " ";
//                             $first = false;
//                             $priceRangeAdded = true;
//                         }else{
//                             $priceTo = $_GET["from"] + $_GET["from"] * 1.5;
//                             $query .= (($first)? " WHERE " : " AND ") . " `price` <= " . $priceTo . " ";
//                             $first = false;
//                             $priceRangeAdded = true;
//                         }
//                     }
//                 }elseif ($brandArray[$i] != ""){
//                     $query .= " OR `brand` = '" . $brandArray[$i] . "'";
//                     if ($_GET['userInputFrom'] != ""){
//                         // echo $_GET['userInputFrom'];
//                         // die;
//                         $query .= (($first)? " WHERE " : " AND ") . " `price` >= " . $_GET['userInputFrom'] . " ";
//                         $first = false;
//                         $priceRangeAdded = true;
//                     }
//                     if ($_GET['userInputTo'] != ""){
//                         $query .= (($first)? " WHERE " : " AND ") . " `price` <= " . $_GET['userInputTo'] . " ";
//                         $first = false;
//                         $priceRangeAdded = true;
//                     }
//                     if (isset($_GET["from"])) {
//                         if ($_GET["from"] != "") {
//                             $query .= (($first)? " WHERE " : " AND ") . " `price` >= " . $_GET['from'] . " ";
//                             $first = false;
//                             $priceRangeAdded = true;
//                             if (!isset($_GET["to"])) {
//                                 $priceTo = $_GET["from"] + $_GET["from"] * 1.5;
//                                 $query .= (($first)? " WHERE " : " AND ") . " `price` <= " . $priceTo . " ";
//                                 $first = false;
//                                 $priceRangeAdded = true;
                                
//                             }
//                         }
//                     }
//                     if (isset($_GET["to"])) {
//                         if ($_GET["to"] != "") {
//                             $query .= (($first)? " WHERE " : " AND ") . " `price` <= " . $_GET['to'] . " ";
//                             $first = false;
//                             $priceRangeAdded = true;
//                         }else{
//                             $priceTo = $_GET["from"] + $_GET["from"] * 1.5;
//                             $query .= (($first)? " WHERE " : " AND ") . " `price` <= " . $priceTo . " ";
//                             $first = false;
//                             $priceRangeAdded = true;
//                         }
//                     }
//                 }
//             }
//         }
//         if (!$priceRangeAdded) {
//             if ($_GET['userInputFrom'] != ""){
//                 // echo $_GET['userInputFrom'];
//                 // die;
//                 $query .= (($first)? " WHERE " : " AND ") . " `price` >= " . $_GET['userInputFrom'] . " ";
//                 $first = false;
//                 $priceRangeAdded = true;
//             }
//             if ($_GET['userInputTo'] != ""){
//                 $query .= (($first)? " WHERE " : " AND ") . " `price` <= " . $_GET['userInputTo'] . " ";
//                 $first = false;
//                 $priceRangeAdded = true;
//             }
//             if (isset($_GET["from"])) {
//                 if ($_GET["from"] != "") {
//                     $query .= (($first)? " WHERE " : " AND ") . " `price` >= " . $_GET['from'] . " ";
//                     $first = false;
//                     $priceRangeAdded = true;
//                     if (!isset($_GET["to"])) {
//                         $priceTo = $_GET["from"] + $_GET["from"] * 1.5;
//                         $query .= (($first)? " WHERE " : " AND ") . " `price` <= " . $priceTo . " ";
//                         $first = false;
//                         $priceRangeAdded = true;
                        
//                     }
//                 }
//             }
//             if (isset($_GET["to"])) {
//                 if ($_GET["to"] != "") {
//                     $query .= (($first)? " WHERE " : " AND ") . " `price` <= " . $_GET['to'] . " ";
//                     $first = false;
//                     $priceRangeAdded = true;
//                 }else{
//                     $priceTo = $_GET["from"] + $_GET["from"] * 1.5;
//                     $query .= (($first)? " WHERE " : " AND ") . " `price` <= " . $priceTo . " ";
//                     $first = false;
//                     $priceRangeAdded = true;
//                 }
//             }
//         }
//         if (isset($_GET['sort'])) {
//             if ($_GET['sort'] != "") {
//                 switch ($_GET['sort']) {
//                     case '1':
//                         $query .= " ORDER by `price`";
//                         break;
//                     case '2':
//                         $query .= " ORDER by `price` DESC";
//                         break;
//                     case '3':
//                         $query .= " ORDER by `name`";
//                         break;
//                     case '4':
//                         $query .= " ORDER by `name` DESC";
//                         break;
                    
//                 }
    
//             }

//         }
//         echo $query;
//         $result = $db->conn->query($query);

//         while ($row = $result->fetch_assoc()) {
//             $items[] = new Item($row['id'], $row['name'], $row['brand'], $row['price'], $row['size'], $row['about']);
//         }
//         $db->conn->close();
//         return $items;
//     }
}
?>