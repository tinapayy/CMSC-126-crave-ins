window.addEventListener('DOMContentLoaded', (event) => {
  var output = document.getElementById('output');

  // Make an AJAX request to retrieve the image path from the database
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var uploadedFilePath = xhr.responseText;

        if (uploadedFilePath !== "") {
          output.src = uploadedFilePath;
        }
      } else {
        console.error('Error: ' + xhr.status);
      }
    }
  };
  xhr.open('GET', '../php/get_image_path.php', true); 
  xhr.send();
});

var loadFile = function (event) {
    var image = document.getElementById("output");
    image.src = URL.createObjectURL(event.target.files[0]);
};

function updateProfile(){
    alert("Profile Updated!");
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

