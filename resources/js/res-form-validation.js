const formField = document.getElementById("restaurant-form");

const nameField = document.getElementById("name");
const nameFeedbackField = document.getElementById("name-feedback");
const vatField = document.getElementById("vat_number");
const vatFeedbackField = document.getElementById("vat-feedback");
const phoneField = document.getElementById("phone");
const phoneFeedbackField = document.getElementById("phone-feedback");
const addressField = document.getElementById("address");
const addressFeedbackField = document.getElementById("address-feedback");
const openingField = document.getElementById("opening_time");
const openingFeedbackField = document.getElementById("opening-feedback");
const closureField = document.getElementById("closure_time");
const closureFeedbackField = document.getElementById("closure-feedback");
const minField = document.getElementById("min_order");
const minFeedbackField = document.getElementById("min-feedback");
const dcostField = document.getElementById("delivery_cost");
const dcostFeedbackField = document.getElementById("dcost-feedback");

formField.addEventListener("submit", (event) => {
    event.preventDefault();

    let isNameValid = false;
    let isVatValid = false;
    let isPhoneValid = false;
    let isAddressValid = false;
    let isOpeningValid = false;
    let isClosureValid = false;
    let isMinValid = false;
    let isDcostValid = false;

    if (nameField.value) {
        isNameValid = true;
        nameField.classList.remove("is-invalid");
    } else {
        nameField.classList.add("is-invalid");
    }

    if (vatField.value) {
        isVatValid = true;
        vatField.classList.remove("is-invalid");
    } else {
        vatField.classList.add("is-invalid");
    }

    if (phoneField.value) {
        isPhoneValid = true;
        phoneField.classList.remove("is-invalid");
    } else {
        phoneField.classList.add("is-invalid");
    }

    if (addressField.value) {
        isAddressValid = true;
        addressField.classList.remove("is-invalid");
    } else {
        addressField.classList.add("is-invalid");
    }

    if (openingField.value) {
        isOpeningValid = true;
        openingField.classList.remove("is-invalid");
    } else {
        openingField.classList.add("is-invalid");
    }

    if (closureField.value) {
        isClosureValid = true;
        closureField.classList.remove("is-invalid");
    } else {
        closureField.classList.add("is-invalid");
    }

    if (minField.value) {
        isMinValid = true;
        minField.classList.remove("is-invalid");
    } else {
        minField.classList.add("is-invalid");
    }

    if (dcostField.value) {
        isDcostValid = true;
        dcostField.classList.remove("is-invalid");
    } else {
        dcostField.classList.add("is-invalid");
    }

    if (
        isNameValid &&
        isVatValid &&
        isPhoneValid &&
        isAddressValid &&
        isOpeningValid &&
        isClosureValid &&
        isMinValid &&
        isDcostValid
    )
        formField.submit();
});
