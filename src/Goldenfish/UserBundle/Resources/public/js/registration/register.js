// ----------------------------------------------------------------------------------------------------
// The following code checks inputs on Blur
// ----------------------------------------------------------------------------------------------------

// Checks First Name content
/*var inputSurname = document.getElementById('fos_user_registration_form_surname');

inputSurname.addEventListener('blur', function() {
    verifSurname(inputSurname);
  }, false);

// Checks First Name content
var inputName = document.getElementById('fos_user_registration_form_name');

inputName.addEventListener('blur', function() {
    verifName(inputName);
  }, false);
*/
// Checks Username content
var inputUsername = document.getElementById('fos_user_registration_form_username');

inputUsername.addEventListener('blur', function() {
    verifUsername(inputUsername);
  }, false);
  
// Checks Email content
var inputEmail = document.getElementById('fos_user_registration_form_email');

inputEmail.addEventListener('blur', function() {
    verifEmail(inputEmail);
  }, false);


// Let's reset security tool on Blur
var inputFirstPassword = document.getElementById('fos_user_registration_form_plainPassword_first');

inputFirstPassword.addEventListener('blur', function() {
    if(inputFirstPassword.value.length == 0){
        divPasswordStrengthLevel.innerHTML = '';
        divPasswordStrengthMessage.innerHTML = '';

        document.getElementById('register-pass-status-line1').className = "register-pass-status-line";
        document.getElementById('register-pass-status-line2').className = "register-pass-status-line";
        document.getElementById('register-pass-status-line3').className = "register-pass-status-line";
        document.getElementById('register-pass-status-line4').className = "register-pass-status-line";
        document.getElementById('register-pass-status-line5').className = "register-pass-status-line";
    }
  }, false);

var inputSecondPassword = document.getElementById('fos_user_registration_form_plainPassword_second');
// Check if the 2 passwords are the same
inputSecondPassword.addEventListener('blur', function() {
    verifSecondPassword(inputSecondPassword);
  }, false);


// ----------------------------------------------------------------------------------------------------
// The following code is about password's strength
// ----------------------------------------------------------------------------------------------------

var inputFirstPassword = document.getElementById('fos_user_registration_form_plainPassword_first');

// On key up, evaluates the password's strength and displays it in the password's strength div
inputFirstPassword.addEventListener('keyup', function() {
    verifFirstPassword(inputFirstPassword);
  }, false);