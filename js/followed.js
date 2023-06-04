var followBtn = document.getElementById("follow-btn");
var cardContainer = document.getElementById("card-container");
var cardCount = 0;

followBtn.addEventListener("click", function() {
    cardCount++;
    createCard();
});

function createCard() {
    var card = document.createElement("div");
    card.className = "card";

    var img = document.createElement("img");
    img.src = "Images/favorites1.png"; // Replace with the actual image URL
    card.appendChild(img);

    var cardDetails = document.createElement("div");
    cardDetails.className = "card-details";

    
    var category = document.createElement("p");
    category.textContent = "Restaurant Category";
    category.className = "foodcard-type";
    cardDetails.appendChild(category);
    
    var address = document.createElement("p");
    address.textContent = "Hollywood St., Miagao";
    address.className = "foodcard-loc";
    cardDetails.appendChild(address);

    var name = document.createElement("h2");
    name.textContent = "Restaurant Name";
    name.className = "foodcard-title";
    cardDetails.appendChild(name);


    var description = document.createElement("p");
    description.innerHTML =  "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel tortor sed neque blandit rhoncus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae."; 
    description.className = "card-description";
    cardDetails.appendChild(description);

const seeMore = document.createElement('a');
seeMore.classList.add('see-more');
seeMore.setAttribute('href', '../php/restaurant.php');
seeMore.innerHTML = '<br> See more <i class="fas fa-angle-right"></i>';

// Add a click event handler to the "See more" link
seeMore.addEventListener('click', function() {
    // Save the restaurant name in a session variable
    var restaurantName = name;
    
    // Send the restaurantName to the server using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../php/store-restaurant.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log('Restaurant name stored in session.');
            // Redirect to the restaurant.php page
            window.location.href = seeMore.getAttribute('href');
        }
    };
    xhr.send('restaurantName=' + encodeURIComponent(restaurantName));
});
cardDetails.appendChild(seeMore);


    card.appendChild(cardDetails);

    cardContainer.appendChild(card);
    followBtn.innerHTML = "Follow (" + cardCount + ")";
}