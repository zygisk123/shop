<?php include "../components/head.php"; ?>

<body>
    <?php include "../components/navigation.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <form method = 'post'>
                    <div class="mb-3">
                        <label for="itemName" class="form-label">Name</label>
                        <input type="text" class="form-control" name = "name" id="itemName">
                    </div>
                    <div class="mb-3">
                        <label for="itemBrand" class="form-label">Brand</label>
                        <input type="text" class="form-control" name = "brand" id="itemBrand">
                    </div>                    
                    <div class="price">
                        <label for="itemPrice" class="form-label">Price</label>
                        <input type="number" name = "price"  step= '0.01' class="form-control" id="itemPrice">
                    </div>
                    <div class="mb-3">
                        <label for="itemSize" class="form-label">Size</label>
                        <input type="number" step='.5' name = "size" class="form-control" id="itemSize">
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