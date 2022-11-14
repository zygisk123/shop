<?php include "../components/head.php"; ?>

<body>
    <?php include "../components/navigation.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="name">
                    <h1>
                        <?=$showBrand->name?>
                    </h1>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <form action="<?=$_USER_PATH.'/views/brand/edit.php'?>" method="get">
                            <input type="hidden" name="showBrandID" value="<?=$showBrand->id?>">
                            <button type="submit" name="goToEdit2" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                    <div class="col-6">
                        <form action="<?=$_USER_PATH.'/views/brand/showAll.php'?>" method="get">
                            <input type="hidden" name="showBrandID" value="<?=$showBrand->id?>">
                            <button type="submit" name="deleteBrand" class="btn btn-danger">Delete</button>
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


