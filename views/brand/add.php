<?php include "../components/head.php"; ?>

<body>
    <?php include "../components/navigation.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <form method = 'post'>
                    <div class="mb-3">
                        <label for="brandName" class="form-label">Name</label>
                        <input type="text" class="form-control" name = "name" id="brandName">
                    </div>
                    <button type="submit" class="btn btn-primary" name = 'addBrand'>Submit</button>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
    <?php include $_ADMIN_PATH . "/views/components/bottom.php"; ?>
</body>
</html>