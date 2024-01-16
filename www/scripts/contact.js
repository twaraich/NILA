const form = document.getElementById('form');
const successMessage = document.getElementById('successMessage');
const name = document.getElementById('name');
const email = document.getElementById('email');
const phone = document.getElementById('phone');

// Catering
const cateringForm = document.getElementById('cateringForm');
const cateringFormSuccessMessage = document.getElementById('cateringFormSuccessMessage');
const eventName = document.getElementById('eventName');
const eventEmail = document.getElementById('eventEmail');
const eventPhone = document.getElementById('eventPhone');

// Show input error messages
function showError(input, message) {
    const formControl = input.parentElement;
    formControl.className = 'form-group form-control error';
    const small = formControl.querySelector('small');
    small.innerText = message;
}

//show success color
function showSuccess(input) {
    const formControl = input.parentElement;
    formControl.className = 'form-group form-control success';
}

//check email is valid
function checkEmail(input) {
    let err = true;
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(input.value.trim())) {
        showSuccess(input);
        err = false;
    } else {
        showError(input, 'Email is not invalid');
        err = true;
    }
    return err;
}

//checkRequired fields
function checkRequired(inputArr) {
    let err = true;
    inputArr.forEach(function (input) {
        if (input.value.trim() === '') {
            showError(input, `${getFieldName(input)} is required`);
            err = true;
        } else {
            showSuccess(input);
            err = false;
        }
    });
    return err;
}


//get FieldName
function getFieldName(input) {
    const fieldName = input.id.charAt(0).toUpperCase() + input.id.slice(1);
    
    switch(fieldName)
    {   
        case  'EventEmail':
        return 'Email';
        case 'EventPhone':
        return 'Phone';
        case 'EventName':
        return 'Event detail';
        default:
        return fieldName
    }
    
}


//Event Listeners
if(cateringForm) {
cateringForm.addEventListener('submit', function (e) {
    e.preventDefault();


    if (!checkRequired([eventName, eventPhone, eventEmail]) && !checkEmail(eventEmail)) {
        sendMail({
            name: eventName.value,
            phone: eventPhone.value,
            email: eventEmail.value
        });
    }
});
}


const sendCateringMail = (contactValue) => {
    let formData = new FormData();
    formData.append('name', contactValue.name);
    formData.append('phone', contactValue.phone);
    formData.append('email', contactValue.email);
    fetch("catering.php", {
        method: "post", 
        body: formData, 

    }).then((response) => {
        cateringForm.style.display = "none";
        cateringFormSuccessMessage.style.display = "block";
        return response.json();
    });
};