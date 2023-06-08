const reviewListContainer = document.getElementById('reviewList-container');
function postReview(reviewInfo) {

    const reviewInput = reviewInfo.review;
    const ratingData = reviewInfo.rating;
    const reviewerNameData = reviewInfo.name + ' ' + reviewInfo.lastname;
    const reviewerPicData = reviewInfo.profpic;

    // create new review element
    const newReview = document.createElement('div');
    newReview.classList.add('review');

    // create review content element
    const reviewContent = document.createElement('div');
    reviewContent.id = 'reviewContent';
    reviewContent.textContent = reviewInput;

    // create reviewer element
    const reviewer = document.createElement('div');
    reviewer.id = 'reviewer';

    // create reviewer picture element
    const reviewerPic = document.createElement('img');
    reviewerPic.id = 'reviewerPic';
    reviewerPic.src = reviewerPicData;
    reviewerPic.alt = 'Reviewer Picture';
    reviewerPic.width = '25px';

    // create reviewer info element
    const reviewerInfo = document.createElement('div');
    reviewerInfo.id = 'reviewerInfo';

    // create reviewer name element
    const reviewerName = document.createElement('span'+'br');
    reviewerName.id = 'reviewerName';
    reviewerName.textContent = reviewerNameData;

    // create line break element
    const lineBreak = document.createElement('br');

    // create rating element
    const rating = document.createElement('span');
    rating.id = 'rating';

    // create checked stars
    for (let i = 0; i < ratingData; i++) {
    const star = document.createElement('span');
    star.classList.add('fa', 'fa-star', 'checked');
    rating.appendChild(star);
    }

    // create unchecked stars
    for (let i = ratingData; i < 5; i++) {
    const star = document.createElement('span');
    star.classList.add('fa', 'fa-star');
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
    document.getElementById('reviewContent').value = '';

    // Reset star rating
    const starInputs = document.querySelectorAll('input[name=\'rate\']');
    starInputs.forEach(input => {
    input.checked = false;
    });
}

if (reviewInfo) {
    for (var i = 0; i < reviewInfo.length; i++) {
        postReview(reviewInfo[i]);
    }
}