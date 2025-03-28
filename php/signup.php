<?php
// Стартиране на сесията
session_start();

// Конфигурационния файл
include_once "./configuration.php";

// Защита от SQL инжекции
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Проверка за попълненост на всички полета от формата
if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    // Проверка за валиден email формат
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Проверка дали имейла вече съществува в базата данни
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");

        if (mysqli_num_rows($sql) > 0) { // Ако имейла вече съществува в базата данни
            echo "$email - Имейла вече съществува!";
        } else {
            // Генериране на уникален идентификатор за новия потребител
            $random_id = rand(time(), 100000000);

            // Вмъкване на новия потребител в базата данни
            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password) 
                                VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}')");

            if ($sql2) {
                // Извличане на информация за въведения потребител от базата данни
                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");

                if (mysqli_num_rows($sql3) > 0) {
                    $row = mysqli_fetch_assoc($sql3);
                    // Задаване на уникален идентификатор на потребителя в сесионна променлива
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo "success";
                }
            } else {
                echo "Грешка!";
            }
        }
    } else {
        echo "$email - Този имейл е невалиден!";
    }
} else {
    echo "Моля, попълнете всички полета!";
}
