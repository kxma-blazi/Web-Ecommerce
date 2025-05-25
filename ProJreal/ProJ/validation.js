document.addEventListener('DOMContentLoaded', function () {
const validation = new JustValidate('#signup');

validation
    .addField('#name', [
    {
        rule: 'required',
        errorMessage: 'Name is required',
    },
    {
        rule: 'minLength',
        value: 2,
        errorMessage: 'Name must be at least 2 characters',
    },
    ])
    .addField('#email', [
    {
        rule: 'required',
        errorMessage: 'Email is required',
    },
    {
        rule: 'email',
        errorMessage: 'Email is not valid',
    },
    ])
    .addField('#password', [
    {
        rule: 'required',
        errorMessage: 'Password is required',
    },
    {
        rule: 'password',
        errorMessage: 'Password must be 8+ characters with a number and a letter',
    },
    ])
    .addField('#password_confirmation', [
    {
        validator: (value, fields) => {
        return value === fields['#password'].elem.value;
        },
        errorMessage: 'Passwords do not match',
    },
    ]);
});
