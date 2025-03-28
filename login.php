<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Poppins:wght@200&display=swap" rel="stylesheet">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="./css-folders/signup.css" rel="stylesheet">

    <!-- jquary cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Title -->
    <title>The Fantasy Bookshop | Virjinia Ninarska</title>
    <link rel="icon" href="./Images/logo.png">

</head>

<body>
    <header>
        <!-- Logo -->
        <div class="logo">
            <img src="./Images/logo.png" alt="logo">
        </div>

        <!-- Navigation Bar -->
        <div class="navigation">
            <input type="checkbox" id="nav-checkbox">
            <label for="nav-checkbox" class="nav-toggle">
                <img src="./Images/menu-open.png" alt="open-menu" class="open">
            </label>

            <ul class="nav-menu">
                <li><a class="search_box"><input type="text" placeholder="Търсене.."><ion-icon name="search"></ion-icon></a></li>

                <li><a href="#">Книги</a></li>
                <li><a href="#">Лимитирани издания</a></li>
                <li><a href="#">Доставка</a></li>
                <li><a href="./signup.php" class="sign-in">Създай профил</a></li>
            </ul>
        </div>
    </header>
    <!-- Navigation Bar End -->
    <div class="wrapper">
        <section class="form login">
            <h1 class="headername">Вход</h1>
            <form action="#">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field inp">
                        <label>Email</label>
                        <input type="text" name="email" placeholder="">
                    </div>
                    <div class="field inp">
                        <label>Парола</label>
                        <input type="password" name="password" placeholder="">
                        <i class="fas fa-eye"></i>
                    </div>
                </div>
                <div class="field submit">
                    <input type="submit" value="Продължи към Fantasy Bookshop">
                </div>
            </form>
            <div class="link">Нямате профил? <a href="./signup.php">Създайте</a></div>
        </section>
    </div>
    <script src="./js/show-hide-pass.js"></script>
    <script src="./js/login.js"></script>
</body>

</html>