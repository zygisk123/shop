
<form action="" method="get">
    <div class="form-check">
        <h6 class = "mt-3 mb-1" >Brand</h6>
        <?php foreach ($shoesBrands as  $key => $brand) {?>
            <div class="row">

                <div class="col-1">
                    <input <?=(isset($_GET["sortByBrand".$brand->id]))?($_GET["sortByBrand".$brand->id] == $brand->name) ? "checked" : '':'';?> class="form-check-input" type="checkbox" value="<?= $brand->name?>" name=<?="sortByBrand".$brand->id?> id="<?=$key?>">
                </div>
                <div class="col-6">
                    <?php
                        echo $brand->name ;
                    ?>  
                </div> 
                <div class="col-4">               
                    <?php
                        echo $brand->items ."<br>";
                    ?>  
                </div>

            </div>
        <?php } ?>
    </div>
    <div class="form-check2">
        <h6 class = "mt-3 mb-1" >Sort By</h6>
        <input <?=(isset($_GET["sort"]))?($_GET["sort"] == 0) ? "checked" : '':'';?> value="0" class="form-check-input" type="radio" id = "none" name="sort">
        <label for="none"> None</label><br>

        <input <?=(isset($_GET["sort"]))?($_GET["sort"] == 1) ? "checked" : '':'';?> value="1" class="form-check-input" type="radio" id = "sort1" name="sort">
        <label for="sort1"> Price (Low To High)</label><br>

        <input <?=(isset($_GET["sort"]))?($_GET["sort"] == 2) ? "checked" : '':'';?> value="2" class="form-check-input" type="radio" id = "sort2" name="sort">
        <label for="sort2"> Price (High To Low)</label><br>

        <input <?=(isset($_GET["sort"]))?($_GET["sort"] == 3) ? "checked" : '':'';?> value="3" class="form-check-input" type="radio" id = "sort3" name="sort">
        <label for="sort3"> Brand (A To Z)</label><br>

        <input <?=(isset($_GET["sort"]))?($_GET["sort"] == 4) ? "checked" : '':'';?> value="4" class="form-check-input" type="radio" id = "sort4" name="sort">
        <label for="sort4"> Brand (Z To A)</label><br>

    </div>
    <div class="form-check">
        <h6 class = "mt-3 mb-1" >Price</h6>
        <input <?=(isset($_GET["from"]))?($_GET["from"] == "") ? "checked" : '':'';?> value="" class="form-check-input" type="radio" name="from">
        <label for="none"> None</label><br>
        <input <?=(isset($_GET["from"]))?($_GET["from"] == 10) ? "checked" : '':'';?> value="10" class="form-check-input" type="radio" name="from">
        <label for="flexRadio<?=$i?>"> 10 to 25</label><br>
        <input <?=(isset($_GET["from"]))?($_GET["from"] == 20) ? "checked" : '':'';?> value="20" class="form-check-input" type="radio" name="from">
        <label for="flexRadio<?=$i?>"> 20 to 50</label><br>
        <input <?=(isset($_GET["from"]))?($_GET["from"] == 50) ? "checked" : '':'';?> value="50" class="form-check-input" type="radio" name="from">
        <label for="flexRadio<?=$i?>"> 50 to 125</label><br>
    </div>
    <div class="row mt-2 mb-3">
        <div class="col-5">
            <input <?=(isset($_GET["userInputFrom"])) ? ($_GET["userInputFrom"] != "") ? 'value = ' . $_GET["userInputFrom"] : '': '';?> type="number" step= '0.01' class="form-control" name = "userInputFrom">
        </div>
        <div class="col-2">
            <a>to</a>
        </div>
        <div class="col-5">
            <input <?=(isset($_GET["userInputTo"])) ? ($_GET["userInputTo"] != "") ? 'value = ' . $_GET["userInputTo"] : '': '';?> type="number" step= '0.01' class="form-control" name = "userInputTo">
        </div>
    </div>
    <div class="form-check" name='search'>
        <input type="hidden" id="brandsLength" value = "<?=count($shoesBrands)?>">
        <input type="hidden" name="filterByBrand" id="brandsArray" value = "<?=""?>">
        <button type="submit" name='filter' class = 'btn btn-primary'>Filter</button>
    </div>
</form>


<script>

    brandsLengthElement = document.getElementById('brandsLength')
    brandsLength = brandsLengthElement.value;

    selectedBrands = getArrayOfSelBrands(brandsLength);

    function getArrayOfSelBrands(length) {
        selected = [];
        selectedID = 0;
        brandsArray = document.getElementById("brandsArray");
        for (let i = 0; i < length; i++) {

            checkBox = document.getElementById(i).addEventListener('click', event => {

                if(event.target.checked) {
                    checkBoxValue = "'"+document.getElementById(i).value+"'";
                    selected[selectedID] = checkBoxValue;
                    selectedID++;
                }else{
                    cbValue = "'"+document.getElementById(i).value+"'";
                    for (let a = 0; a < selected.length; a++) {
                        if (cbValue == selected[a]) {
                            selected.splice(a, 1);
                        }
                    }
                }
                cleanArray = selected.filter(function () { return true })
                console.log(cleanArray);
                brandsArray.value = cleanArray;
            });
            
            cb = document.getElementById(i);
            if (cb.checked) {
                selected[selectedID] = "'"+cb.value+"'";
                selectedID++;
            }
           // console.log(selected);
            brandsArray.value = selected;
        }
    }

</script>
