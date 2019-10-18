function encodeImageFileAsURL(element) {
    var file = element.files[0];
    var reader = new FileReader();

    reader.onloadend = function() {
        $('.img_profile').attr('src', reader.result);
    }
    reader.readAsDataURL(file);
}
