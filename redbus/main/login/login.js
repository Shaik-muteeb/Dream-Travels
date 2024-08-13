// Get the modal
var modal = document.getElementById('authModal');

// Get the buttons that open the modal
var loginBtn = document.getElementById('loginBtn');
var signupBtn = document.getElementById('signupBtn');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName('close')[0];

// Get the form containers
var signinFormContainer = document.getElementById('signinFormContainer');
var signupFormContainer = document.getElementById('signupFormContainer');
var resetFormContainer = document.getElementById('resetFormContainer');

// Get the links to switch forms
var showSignup = document.getElementById('showSignup');
var showSignin = document.getElementById('showSignin');
var shoSignin = document.getElementById('shoSignin');
var showReset = document.getElementById('showReset');

// When the user clicks the login button, open the modal and show the login form
loginBtn.onclick = function() {
    modal.style.display = 'flex';
    signinFormContainer.classList.add('active');
    signupFormContainer.classList.remove('active');
    resetFormContainer.classList.remove('active');
}

// When the user clicks the signup button, open the modal and show the signup form
signupBtn.onclick = function() {
    modal.style.display = 'flex';
    signupFormContainer.classList.add('active');
    signinFormContainer.classList.remove('active');
    resetFormContainer.classList.remove('active');
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = 'none';
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}

// Switch to the signup form
showSignup.onclick = function() {
    signinFormContainer.classList.remove('active');
    signupFormContainer.classList.add('active');
    resetFormContainer.classList.remove('active');
}

// Switch to the signin form
showSignin.onclick = function() {
    signupFormContainer.classList.remove('active');
    signinFormContainer.classList.add('active');
    resetFormContainer.classList.remove('active');
}

shoSignin.onclick = function() {
    signupFormContainer.classList.remove('active');
    signinFormContainer.classList.add('active');
    resetFormContainer.classList.remove('active');
}

showReset.onclick = function() {
    signinFormContainer.classList.remove('active');
    signupFormContainer.classList.remove('active');
    resetFormContainer.classList.add('active');
}