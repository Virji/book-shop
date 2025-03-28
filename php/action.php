<?php
// Стартиране на сесията
session_start();

// Конфигурационния файл
require './configuration.php';

// Добавяне на продукт в таблицата за количка
if (isset($_POST['pid'])) {
    // Инициализация на променливите с данните за продукта
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pimage = $_POST['pimage'];
    $pcode = $_POST['pcode'];
    $pqty = $_POST['pqty'];
    $total_price = $pprice * $pqty;


    /* $stmt - SQL кодът предварително се компилира от базата данни, 
    и само след това се изпълнява с различни стойности. 
    Подобряват се сигурността, като предотвратява SQL инжекции */
    
    // Подготовка и изпълнение на заявка за проверка на наличие на продукта в количката
    $stmt = $conn->prepare('SELECT product_code FROM cart WHERE product_code=?');
    $stmt->bind_param('s', $pcode);
    $stmt->execute();
    $res = $stmt->get_result();
    $r = $res->fetch_assoc();
    $code = $r['product_code'] ?? '';

    // Проверка и добавяне на продукта или извеждане на съобщение за наличие
    if (!$code) {
        $query = $conn->prepare('INSERT INTO cart (product_name,product_price,product_image,qty,total_price,product_code) VALUES (?,?,?,?,?,?)');
        $query->bind_param('ssssss', $pname, $pprice, $pimage, $pqty, $total_price, $pcode);
        $query->execute();

        echo '<div class="alert alert-success alert-dismissible mt-2">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Продуктът е добавен в количката Ви.</strong>
                    </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible mt-2">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Продуктът е вече добавен в количката Ви.</strong>
                    </div>';
    }
}

// Получаване на броя артикули в таблицата за количка
if (isset($_GET['cartItem']) && $_GET['cartItem'] == 'cart_item') {
    $stmt = $conn->prepare('SELECT * FROM cart');
    $stmt->execute();
    $stmt->store_result();
    $rows = $stmt->num_rows;

    echo $rows;
}

// Премахване на единичен артикул от количката
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];

    // Подготовка и изпълнение на заявка за изтриване на продукт от количката
    $stmt = $conn->prepare('DELETE FROM cart WHERE id=?');
    $stmt->bind_param('i', $id);
    $stmt->execute();

    // Задаване на сесионни променливи и пренасочване към страницата за количка
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Продуктът е премахнат от количката Ви.';
    header('location: ../cart.php');
}

// Премахване на всички артикули от количката
if (isset($_GET['clear'])) {
    // Подготовка и изпълнение на заявка за изтриване на всички продукти от количката
    $stmt = $conn->prepare('DELETE FROM cart');
    $stmt->execute();
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Всички продукти са премахнати!';
    header('location: ../cart.php');
}

// Задаване на общата цена на продукта в таблицата за количка
if (isset($_POST['qty'])) {
    $qty = $_POST['qty'];
    $pid = $_POST['pid'];
    $pprice = $_POST['pprice'];

    // Изчисляване на общата цена за дадения продукт
    $tprice = $qty * $pprice;

    // Подготовка и изпълнение на заявка за обновяване на данните за продукта в количката
    $stmt = $conn->prepare('UPDATE cart SET qty=?, total_price=? WHERE id=?');
    $stmt->bind_param('isi', $qty, $tprice, $pid);
    $stmt->execute();
}

// Обработка на поръчката и записване на информацията за клиента в таблицата за поръчки
if (isset($_POST['action']) && $_POST['action'] == 'order') {
    // Инициализация на променливите с данните за поръчката
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $products = $_POST['products'];
    $grand_total = $_POST['grand_total'];
    $address = $_POST['address'];
    $pmode = $_POST['pmode'];

    $data = '';

    // Подготовка и изпълнение на заявка за записване на поръчката в таблицата за поръчки
    $stmt = $conn->prepare('INSERT INTO orders (name,email,phone,address,pmode,products,amount_paid)VALUES(?,?,?,?,?,?,?)');
    $stmt->bind_param('sssssss', $name, $email, $phone, $address, $pmode, $products, $grand_total);
    $stmt->execute();

    // Подготовка и изпълнение на заявка за изтриване на всички продукти от количката
    $stmt2 = $conn->prepare('DELETE FROM cart');
    $stmt2->execute();

    // Формиране на съобщение за успешна поръчка
    $data .= '<div class="text-center">
                    <h1 class="display-4 mt-2 text-danger">Благодаря, че пазарувахте при нас!</h1>
                    <h2 class="text-success">Поръчката ви е изпратена!</h2>
                    <h4 class="bg-danger text-light rounded p-2">Поръчка : ' . $products . '</h4>
                    <h4>Име : ' . $name . '</h4>
                    <h4>Email : ' . $email . '</h4>
                    <h4>Тел.номер : ' . $phone . '</h4>
                    <h4>Обща стойност : ' . number_format($grand_total, 2) . '</h4>
                    <h4>Начин на плащане : ' . $pmode . '</h4>
            </div>';
    echo $data;
}
