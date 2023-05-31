
document.addEventListener("DOMContentLoaded" , () => {
  const optionsBtn = document.getElementById("post-control");
  const optionsDiv = document.querySelector('.options-bar');


  optionsBtn.addEventListener("click", () => {
    console.log("clicked")
    optionsDiv.classList.toggle("expand-options");
  });
})



// password UI validation

const passwordInput = document.getElementById('password-input');
const passwordDiv = document.getElementById('password-valid');
passwordInput.addEventListener("click", () => {
  passwordDiv.classList.remove("d-none");
  passwordDiv.classList.add("d-block");
})

const uppercaseLabel = document.getElementById('uppercase-label');
const numLabel = document.getElementById('number-label');
const lengthLabel = document.getElementById('length-label');
const signupBtn = document.getElementById('signup-btn');

let uppercaseBool = false;
let numberBool = false;
let lengthBool = false;

signupBtn.classList.add("disabled");


passwordInput.addEventListener("input", () => {
  let passVal = passwordInput.value;
  if (/[A-Z]/.test(passVal)) {
    uppercaseLabel.classList.add("valid");
    uppercaseLabel.classList.remove("invalid");
    uppercaseBool = true;
  } else {
    uppercaseLabel.classList.remove("valid");
    uppercaseLabel.classList.add("invalid");
    uppercaseBool = false;
  }


  if(/[0-9]/.test(passVal)) {
    numLabel.classList.add("valid");
    numLabel.classList.remove("invalid");
    numberBool = true;
  } else {
    numLabel.classList.remove("valid");
    numLabel.classList.add("invalid");
    numberBool = false;
  }

  if (passVal.length >= 8) {
    lengthLabel.classList.add("valid");
    lengthLabel.classList.remove("invalid");
    lengthBool = true;
  } else {
    lengthLabel.classList.remove("valid");
    lengthLabel.classList.add("invalid");
    lengthBool = false;
  }

  if (uppercaseBool && numberBool && lengthBool) {
    signupBtn.classList.remove("disabled");
  } else {
    signupBtn.classList.add("disabled");
  }

})


