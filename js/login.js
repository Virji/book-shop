const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".submit input"),
errorText = form.querySelector(".error-txt");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/login.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            let data = xhr.response;
            if(xhr.status === 200){
                if(data == "success"){
                    location.href = "./has-profile.php";
                }else {
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

document.addEventListener('DOMContentLoaded', function() {
    // Изчистване на стойностите в полетата
    document.querySelector('input[name="email"]').value = '';
    document.querySelector('input[name="password"]').value = '';
});