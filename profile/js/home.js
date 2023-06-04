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