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
    </div>
</body>
</html>


