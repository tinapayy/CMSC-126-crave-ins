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







