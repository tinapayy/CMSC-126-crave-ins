var cardContainer = document.getElementById("card-container");

function createCard(restaurant) {
    var card = document.createElement("div");
    card.className = "card";

    var img = document.createElement("img");
    img.src = restaurant.banner; // Replace with the actual image URL
    card.appendChild(img);

    var cardDetails = document.createElement("div");
    cardDetails.className = "card-details";
    
    var name = document.createElement("h2");
    name.textContent = restaurant.name;
    name.className = "foodcard-title";
    cardDetails.appendChild(name);
    
    var category = document.createElement("p");
    category.textContent = restaurant.category;
    category.className = "foodcard-type";
    cardDetails.appendChild(category);
    
    var address = document.createElement("p");
    address.textContent = restaurant.address;
    address.className = "foodcard-loc";
    cardDetails.appendChild(address);


    var description = document.createElement("p");
    description.innerHTML =  restaurant.description; 
    description.className = "card-description";
    cardDetails.appendChild(description);

    const seeMore = document.createElement('a');
    seeMore.classList.add('see-more');
    seeMore.setAttribute('href', '../html/restaurant.html.php');
    seeMore.innerHTML = 'See more <i class="fa fa-arrow-right" aria-hidden="true"></i>';
    
    // Add a click event handler to the "See more" link
    seeMore.addEventListener('click', function() {
        // Save the restaurant name in a session variable
        var restaurantID = restaurant.restaurant_id;
        
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
    cardDetails.appendChild(seeMore);


    card.appendChild(cardDetails);

    cardContainer.appendChild(card);
}

// Iterate over the restaurantData array and create cards for each restaurant
if (restaurantData) {
    for (var i = 0; i < restaurantData.length; i++) {
        createCard(restaurantData[i]);
    }
}