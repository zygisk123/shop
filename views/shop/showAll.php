<?php include "../components/head.php"; ?>

<body>
    <?php include "../components/navigation.php"; ?>

    <div class="container">
        <div class="row">
            <?php foreach($items as $item){ ?>
                <div class="item d-inline col-3 mt-3 mb-3">
                    <a href = <?=$_USER_PATH."/views/shop/show.php?itemID=".$item->id?>>
                        <div class="itemName">
                            <?php echo $item->name;?>
                        </div>
                        <div class="itemBrand">
                            <?php echo $item->brand;?>
                        </div>
                        <div class="itemPrice">
                            <?php echo $item->price;?>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>

</body>
</html>

