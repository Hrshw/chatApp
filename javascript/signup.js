const form = document.querySelector(".signup form"),
      countBtn = document.querySelector(".button input"),
      errorText = document.querySelector(".error-text");

form.onsubmit = (e) => {
   e.preventDefault();
}

countBtn.onclick = () => {
    // ajax code
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "success"){
                    location.href = "./users.php";
                }else{
                    errorText.textContent = data
                    errorText.style.display = "block";
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}