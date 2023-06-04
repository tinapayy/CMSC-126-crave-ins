var swiper = new Swiper(".slide-container", {
  slidesPerView: 3,
  spaceBetween: 20,
  sliderPerGroup: 3,
  loop: true,
  centerSlide: "true",
  fade: "true",
  grabCursor: "true",
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    dynamicBullets: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    520: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
  },
});


 // Get the button and dropdown content elements
const button = document.getElementById("choice");
const dropdownContent = document.querySelector(".dropdown-content2");

// Add a click event listener to the dropdown content
dropdownContent.addEventListener("click", (event) => {
  // Check if the clicked element is an anchor tag
  if (event.target.tagName === "A") {
    // Get the text inside the clicked anchor tag
    const text = event.target.textContent;
    // Set the button text to the clicked text
    button.textContent = text;
  }
});

// Update the value display when the slider value changes
slider.oninput = function() {
    const slider = document.getElementById("myRange");
    const valueDisplay = document.getElementById("slider-value");
    valueDisplay.innerHTML = this.value;
  };
  
  // Initialize the value display to the default value
  valueDisplay.innerHTML = slider.value;

  function changeChoice(){
    var dropbtn = document.getElementById("dropbtn");
    var changeLabel = document.getElementById("dropdown-choice");
    dropbtn.textContent = changeLabel.textContent;
  }

  var loadFile = function (event) {
    var image = document.getElementById("output");
    image.src = URL.createObjectURL(event.target.files[0]);
};





function updateProfileName() {
  // Get the input fields and the profile name
  const fnameInput = document.getElementById('fname');
  const lnameInput = document.getElementById('lname');
  const profileName = document.getElementById('profile-name');

  // Set the default value of the profile name
  let storedFname = localStorage.getItem('fname');
  let storedLname = localStorage.getItem('lname');
  if (storedFname && storedLname) {
      profileName.innerText = `${storedFname} ${storedLname}`;
  }

    const fname = fnameInput.value;
    const lname = lnameInput.value;
    profileName.innerText = `${fname} ${lname}`;

    // Store the updated values in localStorage
    localStorage.setItem('fname', fname);
    localStorage.setItem('lname', lname);
}

function postReview() {
  const reviewInput = document.getElementById("reviewInput").value;
  const starRating = document.querySelector('input[name="rate"]:checked').value;
  const reviewListContainer = document.getElementById("reviewList");

  // create new review element
  const newReview = document.createElement("div");
  newReview.classList.add("review");

  // create review content element
  const reviewContent = document.createElement("div");
  reviewContent.id = "reviewContent";
  reviewContent.textContent = reviewInput;

  // create reviewer element
  const reviewer = document.createElement("div");
  reviewer.id = "reviewer";

  // create reviewer picture element
  const reviewerPic = document.createElement("img");
  reviewerPic.id = "reviewerPic";
  reviewerPic.src = "../images/picture.png";
  reviewerPic.alt = "Reviewer Picture";
  reviewerPic.width = "25px";

  // create reviewer info element
  const reviewerInfo = document.createElement("div");
  reviewerInfo.id = "reviewerInfo";

  // create reviewer name element
  const reviewerName = document.createElement("span"+"br");
  reviewerName.id = "reviewerName";
  reviewerName.textContent = "You";

  // create line break element
  const lineBreak = document.createElement("br");

  // create rating element
  const rating = document.createElement("span");
  rating.id = "rating";

  // create checked stars
  for (let i = 0; i < starRating; i++) {
    const star = document.createElement("span");
    star.classList.add("fa", "fa-star", "checked");
    rating.appendChild(star);
  }

  // create unchecked stars
  for (let i = starRating; i < 5; i++) {
    const star = document.createElement("span");
    star.classList.add("fa", "fa-star");
    rating.appendChild(star);
  }

  // append elements to reviewer info element
  reviewerInfo.appendChild(reviewerName);
  reviewerInfo.appendChild(lineBreak);
  reviewerInfo.appendChild(rating);

  // append elements to reviewer element
  reviewer.appendChild(reviewerPic);
  reviewer.appendChild(reviewerInfo);

  // append elements to new review element
  newReview.appendChild(reviewContent);
  newReview.appendChild(reviewer);

  // append new review to review list container
  reviewListContainer.appendChild(newReview);

  // Clear the review input
  document.getElementById("reviewInput").value = "";

  // Reset star rating
  const starInputs = document.querySelectorAll('input[name="rate"]');
  starInputs.forEach(input => {
  input.checked = false;
  });
}






