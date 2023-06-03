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


function register(){
  // Get the email and password input values
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  if (email && password) {
      //Storing Data:
      localStorage.setItem("email", email);
      localStorage.setItem("password", password);

      // Redirect to the login HTML file
      window.location.assign("login.html");
      alert("Registration Successful");
      
    } else {
      // Show an error message if the email or password are empty
      alert("Please enter your email and password.");
      return;
    }
}

function login(){
    //Retrieving Data:
    const savedEmail = localStorage.getItem("email");
    var savedPasswrd = localStorage.getItem("password");

    //Retrieving Data:
    var email = document.getElementById("email").value;
    var pword = document.getElementById("password").value;

    //Checking Data:
    if (email && password) {
        if(email == savedEmail && pword == savedPasswrd){
        // Redirect to the home HTML file
        window.location.assign("home.html");
        alert("Login Successful");
      } else {
        // Show an error message if the email or password are empty
        alert("Login Failed");
        return;
      }
    } else {
      // Show an error message if the email or password are empty
      alert("Please enter your email and password.");
      return;
    }
}  

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



function storeData(){
  search();
  var query = document.getElementById('search-query').value;
  localStorage.setItem('query', query);
  search();
}

function search() {
    var savedQuery = localStorage.getItem("query");
    const querySpan = document.getElementById("query");
    querySpan.textContent = "'" + savedQuery + "'";
}
function createCard(){
    const resultsContainer = document.getElementById('results-container');
    // Create a new card-container object
    const cardContainer = document.createElement('div');
    cardContainer.classList.add('card-container');

    // Create the restaurant image element
    const restaurantImg = document.createElement('img');
    restaurantImg.setAttribute('id', 'restaurant-img');
    restaurantImg.setAttribute('src', 'images/pizza.png');
    restaurantImg.setAttribute('alt', 'pizza');
    cardContainer.appendChild(restaurantImg);

    // Create the details-container element for the restaurant information
    const detailsContainer1 = document.createElement('div');
    detailsContainer1.classList.add('details-container');

    // Create the span elements for the restaurant information
    const restaurantName = document.createElement('span');
    restaurantName.setAttribute('id', 'restaurant-name');
    restaurantName.textContent = 'Pizzaro';
    detailsContainer1.appendChild(restaurantName);

    const restaurantType = document.createElement('span');
    restaurantType.setAttribute('id', 'restaurant-type');
    restaurantType.textContent = 'Pizzeria';
    detailsContainer1.appendChild(restaurantType);

    const restaurantRating = document.createElement('span');
    restaurantRating.setAttribute('id', 'restaurant-rating');
    restaurantRating.innerHTML = '4.9<i class="fa fa-star-o" aria-hidden="true"></i>';
    detailsContainer1.appendChild(restaurantRating);

    const restaurantReviewCount = document.createElement('span');
    restaurantReviewCount.setAttribute('id', 'restaurant-review-count');
    restaurantReviewCount.innerHTML = '78<i class="fa fa-commenting-o" aria-hidden="true"></i>';
    detailsContainer1.appendChild(restaurantReviewCount);

    const seeMore = document.createElement('a');
    seeMore.classList.add('see-more');
    seeMore.setAttribute('href', 'restaurant.html');
    seeMore.innerHTML = 'See more <i class="fa fa-arrow-right" aria-hidden="true"></i>';
    detailsContainer1.appendChild(seeMore);

    cardContainer.appendChild(detailsContainer1);

    // Create the details-container element for the restaurant status
    const detailsContainer2 = document.createElement('div');
    detailsContainer2.classList.add('details-container');

    // Create the span elements for the restaurant status
    const status = document.createElement('span');
    status.setAttribute('id', 'status');
    status.textContent = 'Open Now';
    detailsContainer2.appendChild(status);

    const time = document.createElement('span');
    time.setAttribute('id', 'time');
    time.textContent = '6:00 AM - 8:00 PM';
    detailsContainer2.appendChild(time);

    cardContainer.appendChild(detailsContainer2);

    // Create the details-container element for the restaurant price range
    const detailsContainer3 = document.createElement('div');
    detailsContainer3.classList.add('details-container');

    // Create the span elements for the restaurant price range
    const priceRange = document.createElement('span');
    priceRange.setAttribute('id', 'price-range');
    priceRange.textContent = 'Price Range';
    detailsContainer3.appendChild(priceRange);

    const price = document.createElement('span');
    price.setAttribute('id', 'price');
    price.textContent = ' ₱58 - ₱100';
    detailsContainer3.appendChild(price);

    cardContainer.appendChild(detailsContainer3);

    // Create the details-container element for the restaurant location
    const detailsContainer4 = document.createElement('div');
    detailsContainer4.classList.add('details-container');

    // Create the span element for the restaurant location
    const location = document.createElement('span');
    location.setAttribute('id', 'location');
    location.innerHTML = '<i class="fa fa-map-marker" aria-hidden="true"></i> Romyr\'s Apartment, Miagao, Iloilo';
    detailsContainer4.appendChild(location);

    cardContainer.appendChild(detailsContainer4);

    // Create the details-container element for the restaurant description
    const detailsContainer5 = document.createElement('div');
    detailsContainer5.classList.add('details-container');

    // Create the span element for the restaurant description
    const description = document.createElement('span');
    location.setAttribute('id', 'description');
    description.textContent = "Op, kaon ta!"
    detailsContainer5.appendChild(description);

    cardContainer.appendChild(detailsContainer5);

    resultsContainer.appendChild(cardContainer);
}
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






