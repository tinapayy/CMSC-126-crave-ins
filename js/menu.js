const menuItemsContainer = document.getElementById("restaurant-details-container");
function createMenu(menuData) {
    var newContainer = document.createElement("div");
    newContainer.classList.add("menu-foodcard");

    var imgContainer = document.createElement('div');
    imgContainer.classList.add("menu-image-container");

    // Create and populate the elements for each menu item
    var foodImg = document.createElement('img');
    foodImg.src = menuData.image_path;
    foodImg.classList.add("menu-img");
    imgContainer.appendChild(foodImg);
    newContainer.appendChild(imgContainer);

    var details = document.createElement("p");
    details.classList.add("menu-details");


    var nameElement = document.createElement("h2");
    nameElement.textContent = menuData.name;
    nameElement.classList.add("menu-name");
    details.appendChild(nameElement);
    newContainer.appendChild(details);

    var priceElement = document.createElement("p");
    priceElement.textContent = "Price: " + menuData.price;
    priceElement.classList.add("menu-price");
    details.appendChild(priceElement);
    newContainer.appendChild(details);


    var descriptionElement = document.createElement("p");
    descriptionElement.textContent = menuData.description;
    descriptionElement.classList.add("menu-description");
    details.appendChild(descriptionElement);
    newContainer.appendChild(details);


    // Append the new container to the menuItemsContainer
    menuItemsContainer.appendChild(newContainer);
}

if (menuData) {
    for (var i = 0; i < menuData.length; i++) {
        createMenu(menuData[i]);
    }
}