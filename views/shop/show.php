<?php include "../components/head.php"; ?>

<body>
    <?php include "../components/navigation.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="name">
                    <h1>
                        <?=$showItem->name?>
                    </h1>
                    <h1>
                        <?=$showItem->price." eur"?>
                    </h1>
                    <h3>
                        <?="Size: ".$showItem->size?>
                    </h3>
                </div>
                <div class="name">
                    <h5>Description</h5>
                    <a>
                        <?=$showItem->about?>
                    </a>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <form action="<?=$_USER_PATH.'/views/shop/edit.php'?>" method="get">
                            <input type="hidden" name="showItemID" value="<?=$showItem->id?>">
                            <button type="submit" name="goToEdit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                    <div class="col-6">
                        <form action="<?=$_USER_PATH.'/views/shop/showAll.php'?>" method="get">
                            <input type="hidden" name="id" value="<?=$showItem->id?>">
                            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
    <?php include $_ADMIN_PATH . "/views/components/bottom.php"; ?>
</body>
</html>


