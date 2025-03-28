// Идентификация на HTML елементите от формата за регистрация
const form = document.querySelector(".signup form"),
      continueBtn = form.querySelector(".submit input"),
      errorText = form.querySelector(".error-txt");

// Предотвратява автоматичното изпращане на формата
form.onsubmit = (e) => {
    e.preventDefault();
}

// Обработка на клик върху бутона за продължение
continueBtn.onclick = () => {
    // Инициализация на нов XMLHttpRequest обект
    let xhr = new XMLHttpRequest();

    // Конфигуриране на заявката към сървъра
    xhr.open("POST", "./php/signup.php", true);

    // Добавяне на обработчик за завършване на заявката
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            // Получаване на отговор от сървъра
            let data = xhr.response;

            // Проверка на успешността на заявката
            if (xhr.status === 200) {
                // Проверка за успешна регистрация
                if (data == "success") {
                    // Пренасочване към страницата след успешна регистрация
                    location.href = "./has-profile.php";
                } else {
                    // Показване на грешка, ако регистрацията не е успешна
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    };

    // Създаване на обект FormData, който събира данните от формата
    let formData = new FormData(form);

    // Изпращане на заявка със събраните данни от формата
    xhr.send(formData);
};


