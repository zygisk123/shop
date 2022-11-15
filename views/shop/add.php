<?php 
include "../components/head.php"; 

$old = false;
if (isset($_SESSION['POST'])) {
    if (count($_SESSION['POST']) != 0) {
        $old = true;
    }
}

?>

<body>
    <?php include "../components/navigation.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <form method = 'post'>
                    <div class="mb-3">
                        <label for="itemName" class="form-label">Name</label>
                        <input name = "name" id="itemName" value="<?=($old)? $_SESSION['POST']['name'] : "" ?>" type="text" class="form-control">
                    </div>

                    <label for="brand" class="form-label">Brand</label>
                    <select class="form-select" name="shoeBrand" id="brand">
                        <option value="">All</option>
                        <?php foreach ($shoesBrands as $key => $sb) {?>
                            <option <?=($old and $_SESSION['POST']['shoeBrand'] == $sb->id)? "selected" : "" ?> value="<?=$sb->id?>"><?=$sb->name?></option>
                        <?php } ?>  
                    </select>
                    
                    <div class="price">
                        <label for="itemPrice" class="form-label">Price</label>
                        <input value="<?=($old)? $_SESSION['POST']['price'] : "" ?>" type="number" name = "price"  step= '0.01' class="form-control" id="itemPrice">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="size" id="size">
                            <option value="">All</option>
                            <?php $size = 39; for ($i=0; $i < 10; $i++) { ?>
                                <?=$size += 0.5?>
                                <option <?=($old and $_SESSION['POST']['size'] == $size)? "selected" : "" ?> value="<?=$size?>"><?=$size?></option>
                            <?php } ?>  
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="itemAbout" class="form-label">Info about item</label>
                        <textarea name = "about" id="itemAbout" rows="4" cols="47">
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name = 'addItem'>Submit</button>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
    <?php include $_ADMIN_PATH . "/views/components/bottom.php"; ?>
</body>
</html>

<?php
$_SESSION['POST'] = [];
?>