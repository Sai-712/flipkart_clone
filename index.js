// Get modal elements
const signInModal = document.getElementById("signInModal");
const signUpModal = document.getElementById("signUpModal");

// Get button and close elements
const loginButton = document.getElementById("loginButton");
const closeSignIn = document.getElementById("closeSignIn");
const closeSignUp = document.getElementById("closeSignUp");
const openSignUp = document.getElementById("openSignUp");
const openSignIn = document.getElementById("openSignIn");

// Function to open a modal
function openModal(modal) {
    modal.style.display = "block";
}

// Function to close a modal
function closeModal(modal) {
    modal.style.display = "none";
}

// Event listeners for opening and closing modals

// Open Sign In Modal
loginButton.addEventListener('click', () => {
    openModal(signInModal);
});

// Close Sign In Modal
closeSignIn.addEventListener('click', () => {
    closeModal(signInModal);
});

// Open Sign Up Modal from Sign In Modal
openSignUp.addEventListener('click', () => {
    closeModal(signInModal);   // Close the sign-in modal
    openModal(signUpModal);    // Open the sign-up modal
});

// Close Sign Up Modal
closeSignUp.addEventListener('click', () => {
    closeModal(signUpModal);
});

// Open Sign In Modal from Sign Up Modal
openSignIn.addEventListener('click', () => {
    closeModal(signUpModal);   // Close the sign-up modal
    openModal(signInModal);    // Open the sign-in modal
});

// Close modals when clicking outside of them
window.addEventListener('click', (event) => {
    if (event.target === signInModal) {
        closeModal(signInModal);
    }
    if (event.target === signUpModal) {
        closeModal(signUpModal);
    }
});

// Password validation during form submission
document.querySelector('.signupBox form').addEventListener('submit', function (e) {
    const password = document.querySelector('input[name="password"]').value;
    
    if (password.length < 6) {
        e.preventDefault();  // Prevent form submission
        alert("Password must be at least 6 characters long.");
    }
});
