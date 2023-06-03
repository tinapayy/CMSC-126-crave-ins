function searchData() {
    event.preventDefault(); // Prevent form submission
    var searchQuery = document.getElementById('email').value;

    $.ajax({
        url: '../php/profile.php',
        type: 'GET',
        data: { query: searchQuery },
        dataType: 'json',
        success: function(data) {
            displayData(data);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

var loadFile = function (event) {
    var image = document.getElementById("output");
    image.src = URL.createObjectURL(event.target.files[0]);
};



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

function updateProfileName() {
    const fname = fnameInput.value;
    const lname = lnameInput.value;
    profileName.innerText = `${fname} ${lname}`;

    // Store the updated values in localStorage
    localStorage.setItem('fname', fname);
    localStorage.setItem('lname', lname);
}

function updatePassword(){
    const newPassword = document.getElementById('new-password').value;
    const confirmPassword = document.getElementById('confirm-password').value;
    //if old newpassword = new password, alert password updated
    if (newPassword == confirmPassword){
        alert("Password Updated!");
    }
    else{
        alert("Password does not match!");
    }
}

