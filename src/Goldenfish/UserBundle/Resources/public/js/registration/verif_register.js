/*function verifSurname(inputSurname, val){
    // Deletes blanks at the beggining and end of string
    inputSurname.value = trim(inputSurname.value);
    
    var spanErrorSurname = document.getElementById('error-surname');
    
    if(((inputSurname.value.length < 2  || inputSurname.value.length > 30) && inputSurname.value.length > 0) || val == 1){
        surligne(inputSurname, true);
        spanErrorSurname.innerHTML = 'Le prénom doit contenir entre 2 et 30 caractères.';
        return false;
    }else{
        surligne(inputSurname, false);
        spanErrorSurname.innerHTML = '';
        return true;
    }
}

function verifName(inputName, val){
    // Deletes blanks at the beggining and end of string
    inputName.value = trim(inputName.value);
    
    var spanErrorName = document.getElementById('error-name');
    
    if(((inputName.value.length < 2  || inputName.value.length > 50) && inputName.value.length > 0) || val == 1){
        surligne(inputName, true);
        spanErrorName.innerHTML = 'Le nom doit contenir entre 2 et 30 caractères.';
        return false;
    }else{
        surligne(inputName, false);
        spanErrorName.innerHTML = '';
        return true;
    }
}
*/
function verifUsername(inputUsername, val){
    // Deletes all blanks
    inputUsername.value = inputUsername.value.replace(/\s+/g, '_');
    
    var spanErrorUsername = document.getElementById('error-username');
    var regex1 = /^[a-zA-Z0-9_]{3,30}$/;
    
    if(((inputUsername.value.length < 3  || inputUsername.value.length > 30 ) && inputUsername.value.length > 0) || val == 1){
        surligne(inputUsername, true);
        spanErrorUsername.innerHTML = 'Votre nom d\'utilisateur doit contenir entre 3 et 30 caractères.';
        return false;
    }else{
        surligne(inputUsername, false);
        spanErrorUsername.innerHTML = '';
    }
    
    if((!regex1.test(inputUsername.value)) && inputUsername.value.length > 0){
        surligne(inputUsername, true);
        spanErrorUsername.innerHTML = 'Votre nom d\'utilisateur doit contenir entre 3 et 30 caractères et les seuls caractères autorisés sont: des chiffres, des lettres (sans accents) et le caractère underscore.';
        return false;
    }else{
        surligne(inputUsername, false);
        spanErrorUsername.innerHTML = '';
        return true;
    }
}

function verifEmail(inputEmail, val){
   // Deletes blanks at the beggining and end of string
   inputEmail.value = trim(inputEmail.value);
   
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   
   var spanErrorEmail = document.getElementById('error-email');
   
   if(((!regex.test(inputEmail.value)) && inputEmail.value.length >0 ) || val == 1){
        surligne(inputEmail, true);
        spanErrorEmail.innerHTML = 'Adresse email invalide. Veuillez entrer une adresse email valide.';
        return false;
   }else{
        surligne(inputEmail, false);
        spanErrorEmail.innerHTML = '';
        return true;
   }
}

function verifFirstPassword(inputFirstPassword){
    var divPasswordStrengthLevel = document.getElementById('password-strength-level');
    var divPasswordStrengthMessage = document.getElementById('password-strength-message');
    
    //var inputSurname = document.getElementById('fos_user_registration_form_surname');
    //var inputName = document.getElementById('fos_user_registration_form_name');
    var inputUsername = document.getElementById('fos_user_registration_form_username');
    var inputEmail = document.getElementById('fos_user_registration_form_email');
    
    if(inputFirstPassword.value.length > 0){
        var formWords = ['mediamotion', 'Mediamotion', inputUsername.value, inputEmail.value];
        var result = zxcvbn(inputFirstPassword.value, formWords);
        
        if(result.entropy <= 20){
            document.getElementById('register-pass-status-line1').className = "very-weak";

            document.getElementById('register-pass-status-line2').className = "register-pass-status-line";
            document.getElementById('register-pass-status-line3').className = "register-pass-status-line";
            document.getElementById('register-pass-status-line4').className = "register-pass-status-line";
            document.getElementById('register-pass-status-line5').className = "register-pass-status-line";
            
            divPasswordStrengthLevel.innerHTML = '<strong>Niveau de sécurité du mot de passe: <span class="very-weak-indice">Très faible</span></strong>';
            divPasswordStrengthMessage.innerHTML = 'Ce mot de passe est trop facile à deviner. Essayez de le faire plus long. Faites des combinaisons de lettres minuscules, majuscules, de chiffres et de caractères spéciaux. N\'utilisez pas de noms ou de mots du dictionnaire.' ;
            return false;
        }
        else if(result.entropy > 20 && result.entropy <= 40){
            document.getElementById('register-pass-status-line1').className = "weak";
            document.getElementById('register-pass-status-line2').className = "weak";

            document.getElementById('register-pass-status-line3').className = "register-pass-status-line";
            document.getElementById('register-pass-status-line4').className = "register-pass-status-line";
            document.getElementById('register-pass-status-line5').className = "register-pass-status-line";
            
            divPasswordStrengthLevel.innerHTML = '<strong>Niveau de sécurité du mot de passe: <span class="weak-indice">Faible</span></strong>';
            divPasswordStrengthMessage.innerHTML = 'Ce mot de passe est trop facile à deviner. Essayez de le faire plus long. Faites des combinaisons de lettres minuscules, majuscules, de chiffres et de caractères spéciaux. N\'utilisez pas de noms ou de mots du dictionnaire.' ;
            return false;
        }
        else if(result.entropy > 40 && result.entropy <= 60){
            document.getElementById('register-pass-status-line1').className = "medium";
            document.getElementById('register-pass-status-line2').className = "medium";
            document.getElementById('register-pass-status-line3').className = "medium";

            document.getElementById('register-pass-status-line4').className = "register-pass-status-line";
            document.getElementById('register-pass-status-line5').className = "register-pass-status-line";
            
            divPasswordStrengthLevel.innerHTML = '<strong>Niveau de sécurité du mot de passe: <span class="medium-indice">Moyen</span></strong>';
            divPasswordStrengthMessage.innerHTML = 'Ce mot de passe assez sécurisé pour vous inscrire, mais il est recommandé de le renforcer.' ;
            return true;
        }
        else if(result.entropy > 60 && result.entropy <= 90){
            document.getElementById('register-pass-status-line1').className = "strong";
            document.getElementById('register-pass-status-line2').className = "strong";
            document.getElementById('register-pass-status-line3').className = "strong";
            document.getElementById('register-pass-status-line4').className = "strong";

            document.getElementById('register-pass-status-line5').className = "register-pass-status-line";
            
            divPasswordStrengthLevel.innerHTML = '<strong>Niveau de sécurité du mot de passe: <span class="strong-indice">Bon</span></strong>';
            divPasswordStrengthMessage.innerHTML = 'Ce mot de passe résistera à la plupart des attaques par brute-force communes. Assurez-vous de le retenir.' ;
            return true;
        }
        else{
            document.getElementById('register-pass-status-line1').className = "excellent";
            document.getElementById('register-pass-status-line2').className = "excellent";
            document.getElementById('register-pass-status-line3').className = "excellent";
            document.getElementById('register-pass-status-line4').className = "excellent";
            document.getElementById('register-pass-status-line5').className = "excellent";
            
            divPasswordStrengthLevel.innerHTML = '<strong>Niveau de sécurité du mot de passe: <span class="excellent-indice">Excellent</span></strong>';
            divPasswordStrengthMessage.innerHTML = 'Ce mot de passe résistera aux attaques par brute-force les plus sophistiquées. Assurez-vous de le retenir.' ;
            return true;
        }
    }else{
        document.getElementById('register-pass-status-line1').className = "register-pass-status-line";
        document.getElementById('register-pass-status-line2').className = "register-pass-status-line";
        document.getElementById('register-pass-status-line3').className = "register-pass-status-line";
        document.getElementById('register-pass-status-line4').className = "register-pass-status-line";
        document.getElementById('register-pass-status-line5').className = "register-pass-status-line";
        
        divPasswordStrengthLevel.innerHTML = '';
        divPasswordStrengthMessage.innerHTML = '';
        
        return false; // Input is empty so, this is invalid.
    }
}

function verifSecondPassword(inputSecondPassword)
{
	var valueFirstPassword = document.getElementById('fos_user_registration_form_plainPassword_first');
	var spanErrorSecondPassword = document.getElementById('error-second-password');
	
	if (inputSecondPassword.value != valueFirstPassword.value && inputSecondPassword.value.length > 0 ) {
            surligne(inputSecondPassword, true);
            spanErrorSecondPassword.innerHTML = 'Les deux mots de passe ne correspondent pas. Recommencez.';
            return false;
	}
	else {
            surligne(inputSecondPassword, false);
            spanErrorSecondPassword.innerHTML = '';
            return true;
	}
}

function verifFormRegister()
{
    // We catch all the form's inputs
    //var inputSurname = document.getElementById('fos_user_registration_form_surname');
    //var inputName = document.getElementById('fos_user_registration_form_name');
    var inputUsername = document.getElementById('fos_user_registration_form_username');
    var inputEmail = document.getElementById('fos_user_registration_form_email');
    var inputFirstPassword = document.getElementById('fos_user_registration_form_plainPassword_first');
    var inputSecondPassword = document.getElementById('fos_user_registration_form_plainPassword_second');
    
    // Then let's check if all the inputs are OK with booleans returns
   // var surnameStatus = verifSurname(inputSurname);
    //var nameStatus = verifName(inputName);
    var usernameStatus = verifUsername(inputUsername);
    var emailStatus = verifEmail(inputEmail);
    var firstPasswordStatus = verifFirstPassword(inputFirstPassword);
    var secondPasswordStatus = verifSecondPassword(inputSecondPassword);

    var vide =0;

   /* if(inputSurname.value == ''){
        verifSurname(inputSurname, 1);
        vide = 1;
    }
    if(inputName.value == ''){
        verifName(inputName, 1);
        vide = 1;
    }*/
    if(inputUsername.value == ''){
        verifUsername(inputUsername, 1);
        vide = 1;
    }
    if(inputEmail.value == ''){
        verifEmail(inputEmail, 1);
        vide = 1;
    }

    if (vide == 1){
        return false;
    }

    
    // Finally
    if(surnameStatus == false || nameStatus == false || usernameStatus == false || emailStatus == false || firstPasswordStatus == false || secondPasswordStatus == false){
        //verifSurname(inputSurname);
        //verifName(inputName);
        verifUsername(inputUsername);
        verifEmail(inputEmail);
        verifFirstPassword(inputFirstPassword);
        verifSecondPassword(inputSecondPassword);
        return false;
    }else{
        return true;
    }
}

// ---------------------------------
// Other functions
// ---------------------------------
function surligne(input, erreur)
{
   if(erreur) {
      input.style.borderColor = "#c85305";
	   
	}
    else
      input.style.borderColor = '';
}

function trim(myString)
{
    return myString.replace(/^\s+/g,'').replace(/\s+$/g,'');
}