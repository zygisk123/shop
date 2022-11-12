<?php

include $_ADMIN_PATH."/controllers/ItemController.php";


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (count($_GET) == 0) {
        $items = ItemController::getAll();
    }
}

?>