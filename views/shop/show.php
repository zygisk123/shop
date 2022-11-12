<?php include "../components/head.php"; ?>

<body>
    <?php include "../components/navigation.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="name">
                    <h1>
                        <?=$item->name?>
                    </h1>
                    <h1>
                        <?=$item->price." eur"?>
                    </h1>
                    <h3>
                        <?="Size: ".$item->size?>
                    </h3>
                </div>
                <div class="name">
                    <h5>Description</h5>
                    <a>
                        <?=$item->about?>
                    </a>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
        <form action="<?=$_USER_PATH.'/views/shop/edit.php'?>" method="get">
            <input type="hidden" name="id" value="<?=$item->id?>">
            <button type="submit" name="goToEdit" class="btn btn-success">Edit</button>
        </form>
        <form action="<?=$_USER_PATH.'/views/shop/showAll.php'?>" method="get">
            <input type="hidden" name="id" value="<?=$item->id?>">
            <button type="submit" name="delete" class="btn btn-success">Delete</button>
        </form>
    </div>
</body>
</html>


