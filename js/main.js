
    brandsLengthElement = document.getElementById('brandsLength')
    brandsLength = brandsLengthElement.value;

    selectedBrands = getArrayOfSelBrands(brandsLength);

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