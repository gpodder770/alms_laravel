// Verify image is jpg/png and also if image is within 2MB
function image_verify(thisvalue) {
    let fileInput = thisvalue;
    let result_id = thisvalue.id.concat('-result');
    let fileResult = document.getElementById(result_id);
    let fileName = thisvalue.value;
    let idxDot = fileName.lastIndexOf(".") + 1;
    let extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
    if (extFile == "jpg" || extFile == "png" || extFile == "jpeg") {
        if (fileInput.files.length > 0) {
            const fileSize = fileInput.files.item(0).size;
            const fileMb = fileSize / 1024 ** 2;
            if (fileMb >= 2) {
                fileResult.innerHTML = "Please select a file less than 2MB.";
                fileResult.classList.remove('d-none');
                fileResult.classList.remove('alert-success');
                fileResult.classList.add('alert-danger');
                fileInput.value = "";
            } else {
                fileResult.innerHTML = "Success, your file is " + fileMb.toFixed(1) + "MB.";
                fileResult.classList.remove('d-none');
                fileResult.classList.remove('alert-danger');
                fileResult.classList.add('alert-success');
            }
        }
    } else {
        fileResult.innerHTML = "Only jpg and png files are allowed!";
        fileResult.classList.remove('d-none');
        fileResult.classList.remove('alert-success');
        fileResult.classList.add('alert-danger');
        fileInput.value = "";
    }
}