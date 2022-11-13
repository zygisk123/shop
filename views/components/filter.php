
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
        <input value="1" class="form-check-input" type="checkbox" id = "price1-9" name="sortByPrice1-9">
        <label for="price1-9"> Price (Low To High)</label><br>

        <input value="2" class="form-check-input" type="checkbox" id = "price9-1" name="sortByPrice9-1">
        <label for="price9-1"> Price (High To Low)</label><br>

        <input value="3" class="form-check-input" type="checkbox" id = "nameA-Z" name="sortByBrandA-Z">
        <label for="nameA-Z"> Brand (A To Z)</label><br>

        <input value="4" class="form-check-input" type="checkbox" id = "nameZ-A" name="sortByBrandZ-A">
        <label for="nameZ-A"> Brand (Z To A)</label><br>

    </div>
    <div class="form-check">
        <h6 class = "mt-3 mb-1" >Price</h6>
        <?php $price = 10; 
            for ($i=1; $i <= 3; $i++) { ?>
                <input value="<?=$price?>" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadio<?=$i?>">
                <label for="<?=$i?>"> <?=$price.' to '.$price+$i*$price." eur."?></label><br>
                <?php $price = $price+$i*$price; ?>
        <?php }?>
    </div>
    <div class="form-check" name='search'>
        <input type="hidden" name="from" value ="" id='valueFrom'>
        <input type="hidden" name="to" value ="" id="valueTo">
        <input type="hidden" id="brandsLength" value = "<?=count($brands)?>">
        <input type="hidden" name="filterByBrand" id="brandsArray" value = "<?=""?>">
        <input type="hidden" name="sort" value = "">
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
                    //string +=  checkBoxValue + ", ";
                    //console.log("Checkbox checked! " + checkBoxValue);
                    selectedID++;
                   // console.log(selected);
                   array = selected
                }else{
                    checkBoxValue = document.getElementById(i).value;
                    for (let a = 0; a < selected.length; a++) {
                        if(checkBoxValue == selected[a]){
                            selected.splice(a, 1);
                            selectedID--;
                        //    console.log(selected);
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
        // from = 0;
        // to = 0;
        for (let i = 1; i <= 3; i++) {
            checkBox = document.getElementById('flexRadio'+i).addEventListener('click', event => {
                if(event.target.checked) {
                    valueFrom = parseInt(document.getElementById('flexRadio'+i).value);
                    valueTo = valueFrom + i * valueFrom;
                    // from = valueFrom;
                    // to = valueTo;
                    // // inputFrom = parseInt(document.getElementById('valueFrom').value);
                    // // inputTo = parseInt(document.getElementById('valueTo').value);
                    // // inputFrom = valueFrom;
                    // // inputTo = valueTo;
                    // console.log(valueFrom+" "+valueTo);
                    inputFrom.value = valueFrom;
                    inputTo.value = valueTo;
                }
            });
        }
    }
</script>

