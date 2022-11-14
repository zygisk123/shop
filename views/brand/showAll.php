<?php include "../components/head.php"; ?>

<body>
    <?php include "../components/navigation.php"; ?>

    <div class="container">
        <div class="row">
            <div class="col-2">
                <?php// include $_ADMIN_PATH . "/views/components/filter.php"; ?>
            </div>
            <div class="col-10">
                <div class="row">

                    <?php foreach($brands as $brand){ ?>
                        <div class="item d-inline col-3 mt-3 mb-3">
                            <a href = <?=$_USER_PATH."/views/brand/show.php?brand=".$brand->id?>>
                                <div class="brandName">
                                    <?php echo $brand->name;?>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

