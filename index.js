const form = document.getElementById('form');
const nom = document.getElementsByClassName('nom');
const mail = document.getElementsByClassName('mail');
const msg = document.getElementsByClassName('msg');

form.addEventListener('submit', e => {
    e.preventDefault();

    validateInputs();
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const isValidEmail = mail => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(mail).toLowerCase());
}

const validateInputs = () => {
    const nomValue = nom.value.trim();
    const mailValue = mail.value.trim();
    const msgValue = msg.value.trim();

    if(nomValue === '') {
        setError(nom, 'name is required');
    } else {
        setSuccess(nom);
    }

    if(mailValue === '') {
        setError(mail, 'Email is required');
    } else if (!isValidEmail(mailValue)) {
        setError(mail, 'Provide a valid email address');
    } else {
        setSuccess(mail);
    }

    if(msgValue === '') {
        setError(nom, 'message is required');
    } else {
        setSuccess(nom);
    }

};