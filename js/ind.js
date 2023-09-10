const phoneInput = document.getElementById("contact-number");


phoneInput.addEventListener("input", validatePhone);
const phonePattern = /^\d{10}$/;
const phoneValue = phoneInput.value.trim();


function validatePhone() {
const phonePattern = /^\+?\d{10,}$/;
let phoneValue = phoneInput.value.trim();

// Remove non-numeric characters
phoneValue = phoneValue.replace(/[^\d+]/g, '');

//   if (phoneValue.length > 10) {
//     phoneValue = phoneValue.substr(0, 10);
//   }

phoneInput.value = phoneValue;


}
