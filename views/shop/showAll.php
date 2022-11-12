<?php include "../components/head.php"; ?>

<body>
    <?php include "../components/navigation.php"; ?>

    <div class="container">
        <div class="row">
            <?php foreach($items as $item){ ?>
                <div class="item d-inline col-3">
                    <div class="itemName">
                        <?php echo $item->name;?>
                    </div>
                    <div class="itemBrand">
                        <?php echo $item->brand;?>
                    </div>
                    <div class="itemPrice">
                        <?php echo $item->price;?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</body>
</html>

