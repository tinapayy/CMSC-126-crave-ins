window.onload = function() {
    searchData();
};
function searchData() {
    event.preventDefault(); // Prevent form submission
    var searchQuery = document.getElementById('search-query').value;
    var ratingFilter = document.querySelector('input[name="rate"]:checked');
    var ratingValue = ratingFilter ? ratingFilter.value : ""; // Get the selected rating value

    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../php/search.php?query=' + encodeURIComponent(searchQuery) + '&rating=' + ratingValue, true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            displayData(data);
        } else if (xhr.readyState === 4) {
            console.log('Error: ' + xhr.status);
        }
    };
    xhr.send();
}


function displayData(data) {
    // Clear the previous search results
    var resultsContainer = document.getElementById('results');
    resultsContainer.innerHTML = '';

    // Iterate over each element in the data array
    data.forEach(function(element) {
        // Extracting and storing attributes into variables
        const id = element.restaurant_id;
        const name = element.name;
        const address = element.address;
        const openTime = element.open_time;
        const desc = element.description;
        const banner = element.banner;
        const tags = element.tags;
        const landmark = element.landmark;
        const category = element.category;
        const rating = element.average_rating;
        const reviewCount = element.total_reviews;
        // Add more variables for additional attributes if needed

        // Create a new <div> for each element
        const elementDiv = document.createElement('div');

        const resultsContainer = document.getElementById('results');
        // Create a new card-container object
        const cardContainer = document.createElement('div');
        cardContainer.classList.add('card-container');
    
        // Create the restaurant image element
        const restaurantImg = document.createElement('img');
        restaurantImg.setAttribute('id', 'restaurant-img');
        restaurantImg.setAttribute('src', banner);
        restaurantImg.setAttribute('alt', 'img');
        cardContainer.appendChild(restaurantImg);
    
        // Create the details-container element for the restaurant information
        const detailsContainer1 = document.createElement('div');
        detailsContainer1.classList.add('details-container');
    
        // Create the span elements for the restaurant information
        const restaurantName = document.createElement('span');
        restaurantName.setAttribute('id', 'restaurant-name');
        restaurantName.textContent = name;
        detailsContainer1.appendChild(restaurantName);
    
        const restaurantType = document.createElement('span');
        restaurantType.setAttribute('id', 'restaurant-type');
        restaurantType.textContent = category;
        detailsContainer1.appendChild(restaurantType);
    
        const restaurantRating = document.createElement('span');
        restaurantRating.setAttribute('id', 'restaurant-rating');
        restaurantRating.innerHTML = rating + '<i class="fa fa-star-o" aria-hidden="true"></i>';
        detailsContainer1.appendChild(restaurantRating);
    
        const restaurantReviewCount = document.createElement('span');
        restaurantReviewCount.setAttribute('id', 'restaurant-review-count');
        restaurantReviewCount.innerHTML = reviewCount + '<i class="fa fa-commenting-o" aria-hidden="true"></i>';
        detailsContainer1.appendChild(restaurantReviewCount);
    
        const seeMore = document.createElement('a');
        seeMore.classList.add('see-more');
        seeMore.setAttribute('href', '../html/restaurant.html.php');
        seeMore.innerHTML = 'See more <i class="fa fa-arrow-right" aria-hidden="true"></i>';
        
        // Add a click event handler to the "See more" link
        seeMore.addEventListener('click', function() {
            // Save the restaurant name in a session variable
            var restaurantID = id;
            
            // Send the restaurantName to the server using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../php/store-restaurant.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log('Restaurant id stored in session.');
                    // Redirect to the restaurant.php page
                    window.location.href = seeMore.getAttribute('href');
                }
            };
            xhr.send('restaurantID=' + encodeURIComponent(restaurantID));
        });
        

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
        time.textContent = openTime;
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
        location.innerHTML = '<i class="fa fa-map-marker" aria-hidden="true">' + address + '</i>';
        detailsContainer4.appendChild(location);
    
        cardContainer.appendChild(detailsContainer4);
    
        // Create the details-container element for the restaurant description
        const detailsContainer5 = document.createElement('div');
        detailsContainer5.classList.add('details-container');
    
        // Create the span element for the restaurant description
        const description = document.createElement('span');
        location.setAttribute('id', 'desc');
        description.textContent = desc;
        detailsContainer5.appendChild(description);
    
        cardContainer.appendChild(detailsContainer5);
    
        resultsContainer.appendChild(cardContainer);
    });
}


