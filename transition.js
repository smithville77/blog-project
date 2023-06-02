

// api results for news sidebar
const api_key = '2a91e1a1c11ba19a2a8d7cc9dd3e60fb';
const date = new Date();

let day = date.getDate();
let month = date.getMonth() + 1;
let year = date.getFullYear();

let currentDate = `${year}-${month}-${day}`;

let url = `https://gnews.io/api/v4/search?q=food&lang=en&country=us&max=5&apikey=${api_key}`;

// fetch(url)
//   .then((res) => res.json()) 
//   .then((data) => {
//     articles = data.articles;
//     console.log(articles);

//     articles.forEach((article) => {
//       const title = article.title;
//       const url = article.url;

      
//       const titleElement = document.createElement('a');
//       titleElement.textContent = title;
//       titleElement.href = url;
//       titleElement.classList.add('article-link');
//       titleElement.target = '_blank';

//       const hr = document.createElement("hr");
//       hr.classList.add("line-break");

//       const container = document.getElementById('article-container');
//       container.appendChild(titleElement);
//       container.appendChild(hr);
//     });
 

//   })
//   .catch(error => console.log(error));




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




