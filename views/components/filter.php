
<form action="" method="get">
    <div class="form-check">
        <h6 class = "mt-3 mb-1" >Brand</h6>
        <?php foreach ($brands as  $key => $brand) {?>
            <input value="<?= $brand?>" class="form-check-input" type="checkbox" name="<?= $key?>" id="<?= $key?>">
            <?php echo $brand .'<br>';?>
        <?php } ?>
    </div>
    <div class="form-check">
        <h6 class = "mt-3 mb-1" >Sort By</h6>
        <input value="1" class="form-check-input" type="radio" id = "sort1" name="flexRadioDefault">
        <label for="sort1"> Price (Low To High)</label><br>

        <input value="2" class="form-check-input" type="radio" id = "sort2" name="flexRadioDefault">
        <label for="sort2"> Price (High To Low)</label><br>

        <input value="3" class="form-check-input" type="radio" id = "sort3" name="flexRadioDefault">
        <label for="sort3"> Brand (A To Z)</label><br>

        <input value="4" class="form-check-input" type="radio" id = "sort4" name="flexRadioDefault">
        <label for="sort4"> Brand (Z To A)</label><br>

    </div>
    <div class="form-check">
        <h6 class = "mt-3 mb-1" >Price</h6>
        <?php $price = 10; 
            for ($i=1; $i <= 3; $i++) { ?>
                <input value="<?=$price?>" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadio<?=$i?>">
                <label for="flexRadio<?=$i?>"> <?=$price.' to '.$price+$i*$price." eur."?></label><br>
                <?php $price = $price+$i*$price; ?>
        <?php }?>
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
        <input type="hidden" name="from" value ="" id='valueFrom'>
        <input type="hidden" name="to" value ="" id="valueTo">
        <input type="hidden" id="brandsLength" value = "<?=count($brands)?>">
        <input type="hidden" name="filterByBrand" id="brandsArray" value = "<?=""?>">
        <input type="hidden" name="sort" id="sort" value ="">
        <button type="submit" name='filter' class = 'btn btn-primary'>Filter</button>
    </div>
</form>




<script>
    brandsLengthElement = document.getElementById('brandsLength')
    brandsLength = brandsLengthElement.value;

    selectedBrands = getArrayOfSelBrands(brandsLength);

    console.log(selectedBrands);
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
                brandsArray.value = array;
            });
        }
    }
    getpriceFromTo();
    function getpriceFromTo() {
        inputFrom = document.getElementById('valueFrom');
        inputTo = document.getElementById('valueTo');
        for (let i = 1; i <= 3; i++) {
            checkBox = document.getElementById('flexRadio'+i).addEventListener('click', event => {
                if(event.target.checked) {
                    valueFrom = parseInt(document.getElementById('flexRadio'+i).value);
                    valueTo = valueFrom + i * valueFrom;
                    inputFrom.value = valueFrom;
                    inputTo.value = valueTo;
                }
            });
        }
    }
    getSortValue();
    function getSortValue() {
        sort = document.getElementById('sort');
        for (let i = 1; i <= 4; i++) {
            checkBox = document.getElementById('sort'+i).addEventListener('click', event => {
                if(event.target.checked) {
                    checkboxValue = document.getElementById('sort'+i).value;
                    console.log(checkboxValue);
                    sort.value = checkboxValue;
                }
            });
        }
    }
</script>

