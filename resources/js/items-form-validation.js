const formField = document.getElementById("edit-item-form");

const nameField = document.getElementById("name");
const nameFeedbackField = document.getElementById("name-feedback");
const visibleField = document.getElementById("visible");
const visibleFeedbackField = document.getElementById("visible-feedback");
const priceField = document.getElementById("price");
const priceFeedbackField = document.getElementById("price-feedback");

formField.addEventListener("submit", (event) => {
    event.preventDefault();

    let isNameValid = false;
    let isVisibleValid = false;
    let isPriceValid = false;

    // Validazione nome

    if (nameField.value) {
        isNameValid = true;
        nameField.classList.remove("is-invalid");
    } else {
        nameField.classList.add("is-invalid");
        nameFeedbackField.innerText = 'Il campo "Nome" non può essere vuoto';
    }

    // Validazione disponibile

    if (visibleField.checked || !visibleField.checked) {
        isVisibleValid = true;
        visibleField.classList.remove("is-invalid");
    } else {
        visibleField.classList.add("is-invalid");
        visibleFeedbackField.innerText =
            'Il campo "Disponibile" accetta solo i valori 0 o 1';
    }

    // Validazione prezzo

    if (priceField.value) {
        isPriceValid = true;
        priceField.classList.remove("is-invalid");
    } else {
        priceField.classList.add("is-invalid");
        priceFeedbackField.innerText = 'Il campo "Prezzo" non può essere vuoto';
    }

    if (isNameValid && isPriceValid && isVisibleValid) formField.submit();
});
