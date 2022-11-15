<?php include "../components/head.php"; 

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
                        <input value="<?=($old)? $_SESSION['POST']['name'] : $item->name ?>" type="text" class="form-control" name = "name" id="itemName">
                    </div>

                    <label for="itemBrand" class="form-label">Brand</label>
                    <select class="form-select" name="brand" id="itemBrand">
                        <option value="">All</option>
                        <?php foreach ($shoesBrands as $key => $sb) {?>
                            <option <?=(($old and $_SESSION['POST']['brand'] == $sb->id) or ($item->brandID == $sb->id))? "selected" : "" ?> value="<?=$sb->id?>"><?=$sb->name?></option>
                        <?php } ?>  
                    </select>

                    <div class="price">
                        <label for="itemPrice" class="form-label">Price</label>
                        <input type="number" name = "price"  step= '0.01' class="form-control" id="itemPrice" value = "<?=$item->price?>">
                    </div>

                    <div class="mb-3">
                        <label for="itemSize" class="form-label">Size</label>
                        <select class="form-select" name="size" id="size">
                            <option value="">All</option>
                            <?php $size = 39; for ($i=0; $i < 20; $i++) { ?>
                                <?=$size += 0.5?>
                                <option <?=(($old and $_SESSION['POST']['size'] == $size) or ($item->size == $size) )? "selected":"" ?> value="<?=$size?>"><?=$size?></option>
                            <?php } ?>  
                        </select>

                    </div>

                    <div class="mb-3">
                        <label for="itemAbout" class="form-label">Info about item </label>
                        <textarea name = "about" id="itemAbout" rows="4" cols="47">
                            <?=($old)? $_SESSION['POST']['about'] : $item->about ?>
                        </textarea>
                    </div>
                    <input type="hidden" name="id" value="<?=$item->id?>" >
                    <button type="submit" class="btn btn-primary" name = 'editItem'>Submit</button>
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
