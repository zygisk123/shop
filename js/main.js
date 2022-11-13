
// checkBox = document.getElementById('0');
// if(checkBox.checked) {
//     console.log("Checkbox checked!");
// }
checkBox = document.getElementById('0').addEventListener('click', event => {
    if(event.target.checked) {
        console.log("Checkbox checked!");
    }
});



{/* <input value="<?=$price?>" class="form-check-input" type="radio" id = "<?="price".$i?>" name="<?='from'.$price.'to'.$price+$i*$price?>"> */}