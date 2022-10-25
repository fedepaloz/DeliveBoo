const placeholder = "https://socialistmodernism.com/wp-content/uploads/2017/07/placeholder-image.png"
const image = document.getElementById('image')
const preview = document.getElementById('preview')

image.addEventListener('input', () => {
    if (image.files && image.files[0]) {
        let reader = new FileReader();
        reader.readAsDataURL(image.files[0]);
        reader.addEventListener('load', event => {
            preview.src = event.target.result;
        });
    } else preview.src = placeholder;
    preview.setAttribute('src', placeholder);
})