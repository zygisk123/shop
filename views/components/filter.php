<form action="" method="get">
    <div class="form-check">
        <h6 class = "mt-3 mb-1" >Brand</h6>
        <?php foreach ($brands as  $key => $brand) {?>
            <input <?=(isset($_GET[$key]))?($_GET[$key] == $brand) ? "checked" : '':'';?> value="<?= $brand?>" class="form-check-input" type="checkbox" name="<?= $key?>" id="<?= $key?>">
            <?php echo $brand .'<br>';?>
        <?php } ?>
    </div>
    <div class="form-check2">
        <h6 class = "mt-3 mb-1" >Sort By</h6>
        <input <?=(isset($_GET["sort"]))?($_GET["sort"] == 0) ? "checked" : '':'';?> value="0" class="form-check-input" type="radio" id = "none" name="sort">
        <label for="none"> None</label><br>

        <input <?=(isset($_GET["sort"]))?($_GET["sort"] == 1) ? "checked" : '':'';?> value="1" class="form-check-input" type="radio" id = "sort1" name="sort">
        <label for="sort1"> Price (Low To High)</label><br>

        <input <?=(isset($_GET["sort"]))?($_GET["sort"] == 2) ? "checked" : '':'';?>value="2" class="form-check-input" type="radio" id = "sort2" name="sort">
        <label for="sort2"> Price (High To Low)</label><br>

        <input <?=(isset($_GET["sort"]))?($_GET["sort"] == 3) ? "checked" : '':'';?>value="3" class="form-check-input" type="radio" id = "sort3" name="sort">
        <label for="sort3"> Brand (A To Z)</label><br>

        <input <?=(isset($_GET["sort"]))?($_GET["sort"] == 4) ? "checked" : '':'';?>value="4" class="form-check-input" type="radio" id = "sort4" name="sort">
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
            <input type="number" step= '0.01' class="form-control" name = "userInputFrom">
        </div>
        <div class="col-2">
            <a>to</a>
        </div>
        <div class="col-5">
            <input type="number" step= '0.01' class="form-control" name = "userInputTo">
        </div>
    </div>
    <div class="form-check" name='search'>
        <!-- <input type="hidden" name="from" value ="" id='valueFrom'>
        <input type="hidden" name="to" value ="" id="valueTo"> -->
        <input type="hidden" id="brandsLength" value = "<?=count($brands)?>">
        <input type="hidden" name="filterByBrand" id="brandsArray" value = "<?=""?>">
        <!-- <input type="hidden" name="sort" id="sort" value =""> -->
        <button type="submit" name='filter' class = 'btn btn-primary'>Filter</button>
    </div>
</form>




<script>

    brandsLengthElement = document.getElementById('brandsLength')
    brandsLength = brandsLengthElement.value;

    selectedBrands = getArrayOfSelBrands(brandsLength);

    // function getArrayOfSelBrands(length) {
    //     selected = [];
    //     array = [];
    //     selectedID = 0;
    //     brandsArray = document.getElementById("brandsArray")
    //     for (let i = 0; i < length; i++) {
    //         cb = document.getElementById(i);
    //         if (cb.checked) {
    //             selected[selectedID] = cb.value;
    //             selectedID++;
    //         }
    //         if (i == length-1) {
    //             console.log(selected);
    //             brandsArray.value = selected;
    //         }
    //     }
    // }

    function getArrayOfSelBrands(length) {
        selected = [];
        array = [];
        selectedID = 0;
        string = "";
        brandsArray = document.getElementById("brandsArray")
        for (let i = 0; i < length; i++) {

            checkBox = document.getElementById(i).addEventListener('click', event => {
                if(event.target.checked) {
                    checkBoxValue = document.getElementById(i).value;
                    selected[selectedID] = checkBoxValue;
                    selectedID++;
                   array = selected
                }else{
                    checkBoxValue = document.getElementById(i).value;
                    for (let a = 0; a < selected.length; a++) {
                        if(checkBoxValue == selected[a]){
                            selected.splice(a, 1);
                            selectedID--;
                            array = selected;
                        }
                        
                    }
                }
                console.log(array);
                brandsArray.value = array;
            });
            cb = document.getElementById(i);
            if (cb.checked) {
                selected[selectedID] = cb.value;
                selectedID++;
            }
            if (i == length-1) {
                console.log(selected);
                brandsArray.value = selected;
            }
        }
    }









    // getpriceFromTo();
    // function getpriceFromTo() {
    //     inputFrom = document.getElementById('valueFrom');
    //     inputTo = document.getElementById('valueTo');
    //     for (let i = 1; i <= 3; i++) {
    //         checkBox = document.getElementById('flexRadio'+i).addEventListener('click', event => {
    //             if(event.target.checked) {
    //                 valueFrom = parseInt(document.getElementById('flexRadio'+i).value);
    //                 valueTo = valueFrom + i * valueFrom;
    //                 inputFrom.value = valueFrom;
    //                 inputTo.value = valueTo;

    //             }
    //         });
    //         if (document.getElementById('flexRadio'+i).checked) {
    //             document.getElementById('flexRadio'+i).checked = false;
    //         }
    //     }
    // }
    // getSortValue();
    // function getSortValue() {
    //     sort = document.getElementById('sort');
    //     for (let i = 1; i <= 4; i++) {
    //         checkBox = document.getElementById('sort'+i).addEventListener('click', event => {
    //             if(event.target.checked) {
    //                 checkboxValue = document.getElementById('sort'+i).value;
    //                 console.log(checkboxValue);
    //                 sort.value = checkboxValue;
    //             }
    //         });
    //     }
    // }
</script>