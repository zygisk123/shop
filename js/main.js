
// checkBox = document.getElementById('0');
// if(checkBox.checked) {
//     console.log("Checkbox checked!");
// }
checkBox = document.getElementById('0').addEventListener('click', event => {
    if(event.target.checked) {
        console.log("Checkbox checked!");
    }
});