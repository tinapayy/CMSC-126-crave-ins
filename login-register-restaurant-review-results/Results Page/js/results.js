function search() {
    const searchInput = document.getElementById("search").value;
    const querySpan = document.getElementById("query");
    querySpan.textContent = searchInput;
  }
function createCard(){
    const resultsContainer = document.getElementById('results-container');
    // Create a new card-container object
    const cardContainer = document.createElement('div');
    cardContainer.classList.add('card-container');

    // Create the restaurant image element
    const restaurantImg = document.createElement('img');
    restaurantImg.setAttribute('id', 'restaurant-img');
    restaurantImg.setAttribute('src', 'images/pizza.png');    // TINA: "change src value to fetching of image from DB"
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