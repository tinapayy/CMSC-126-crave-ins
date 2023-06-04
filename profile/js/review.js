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





  