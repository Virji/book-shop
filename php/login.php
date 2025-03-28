<?php
// Стартиране на сесията
session_start();

// Kонфигурационния файл
include_once "./configuration.php";

// Защита от SQL инжекции
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Проверка дали email и парола са попълнени
if (!empty($email) && !empty($password)) {
    // Изпълнение на SQL заявка за извличане на потребител от базата данни
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");

    // Проверка дали има резултати от заявката
    if (mysqli_num_rows($sql) > 0) {
        // Ако има успешно съвпадение, извличане на реда с информация за потребителя
        $row = mysqli_fetch_assoc($sql);

        // Задаване на уникален идентификатор на потребителя
        $_SESSION['unique_id'] = $row['unique_id'];

        // Извеждане на успешно съобщение
        echo "success";
    } else {
        // Извеждане на съобщение за грешка при невалиден email или парола
        echo "Грешен имейл или парола!";
    }
} else {
    // Извеждане на съобщение за грешка при липсващи данни
    echo "Моля, попълнете всички полета!";
}
?>
