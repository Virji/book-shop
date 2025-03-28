<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: ./php/login.php");
}
?>

<!DOCTYPE html>
<html lang="bg">

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

    <link href="./css-folders/style.css" rel="stylesheet">

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

                <li><a href="books.php">Книги</a></li>
                <li><a href="#">Лимитирани издания</a></li>
                <li><a href="#">Доставка</a></li>
                <li><a href="./input.php" class="sign-in">Изход</a></li>
                <a href="#" class="book-mark"><li><ion-icon name="bookmark-outline"></ion-icon></li></a>
                <a href="./cart.php" class="shopping-cart">
                    <li><ion-icon name="cart-outline"></ion-icon></li>
                </a>
            </ul>
        </div>
    </header>
    <!-- Navigation Bar End -->

    <!-- Text over background -->
    <div class="background">
        <div class="background-text">'
            <h1>The Fantasy Bookshop</h1>
            <h3>Чудили ли сте се някога какви тайни крие фантастичният свят?<br>Време е да ги разкриете..</h3>
        </div>

        <div class="background-btn">
            <a href="#">Тийн Фентъзи</a>
            <a href="#">Фантастика</a>
        </div>
    </div>

    <!-- Main Section -->
    <div class="content">
        <!-- New Products -->
        <div class="product-container">
            <div class="header">
                <h1>Нови книги</h1>
            </div>

            <div class="products">
                <div class="product">
                    <!-- Image -->
                    <div class="pr-image">
                        <img src="./Images/New Books/svetlina-v-plamaka.jpg" alt="Светлина в пламъка">
                    </div>

                    <!-- Price -->
                    <div class="name-price">
                        <h3>Светлина в пламъка</h3>
                        <span>29.90лв</span>
                    </div>

                    <!-- Info text -->
                    <p>&nbsp;&nbsp;Единственият, който може да спаси Сера сега, е онзи, когото тя цял живот е планирала да убие.</p>

                    <!-- Rate -->
                    <div class="stars">
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>

                    <!-- Buy button -->
                    <div class="buy">
                        <i class="fa-regular fa-bookmark"></i><button>Купи</button>
                    </div>
                </div>

                <div class="product">
                    <!-- Image -->
                    <div class="pr-image">
                        <img src="./Images/New Books/shestimata-na-atlas.jpg" alt="">
                    </div>

                    <!-- Price -->
                    <div class="name-price">
                        <h3>Шестимата на Атлас</h3>
                        <span>30.00лв</span>
                    </div>

                    <!-- Info text -->
                    <p>&nbsp;&nbsp;Знанието е сеч. Не можеш да го получиш без жертва.</p>

                    <!-- Rate -->
                    <div class="stars">
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>

                    <!-- Buy button -->
                    <div class="buy">
                        <i class="fa-regular fa-bookmark"></i><button>Купи</button>
                    </div>
                </div>

                <div class="product">
                    <!-- Image -->
                    <div class="pr-image">
                        <img src="./Images/New Books/pozlata.jpg" alt="">
                    </div>

                    <!-- Price -->
                    <div class="name-price">
                        <h3>Позлата</h3>
                        <span>14.90лв</span>
                    </div>

                    <!-- Info text -->
                    <p>&nbsp;&nbsp;Позлатеният свят на Ореа ще ви плени от първата страница с романтика и опасности.</p>

                    <!-- Rate -->
                    <div class="stars">
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>

                    <!-- Buy button -->
                    <div class="buy">
                        <i class="fa-regular fa-bookmark"></i><button>Купи</button>
                    </div>
                </div>

                <div class="product">
                    <!-- Image -->
                    <div class="pr-image">
                        <img src="./Images/New Books/chistokravni-zavetat.jpg" alt="">
                    </div>

                    <!-- Price -->
                    <div class="name-price">
                        <h3>Чистокръвни</h3>
                        <span>19.90лв</span>
                    </div>

                    <!-- Info text -->
                    <p>&nbsp;&nbsp;„На света има два вида хора – онези, които седят около огъня и се взират в пламъците, и другите, които са запалили огъня.“</p>

                    <!-- Rate -->
                    <div class="stars">
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>

                    <!-- Buy button -->
                    <div class="buy">
                        <i class="fa-regular fa-bookmark"></i><button>Купи</button>
                    </div>
                </div>

                <div class="product">
                    <!-- Image -->
                    <div class="pr-image">
                        <img src="./Images/New Books/strahat-na-madretsa.jpg" alt="">
                    </div>

                    <!-- Price -->
                    <div class="name-price">
                        <h3>Страхът на мъдреца</h3>
                        <span>29.00лв</span>
                    </div>

                    <!-- Info text -->
                    <p>&nbsp;&nbsp;Това е историята за живота на талантлив млад мъж на име Квоте, който се превръща в най-могъщия магьосник на света.</p>

                    <!-- Rate -->
                    <div class="stars">
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>

                    <!-- Buy button -->
                    <div class="buy">
                        <i class="fa-regular fa-bookmark"></i><button>Купи</button>
                    </div>
                </div>

                <div class="product">
                    <!-- Image -->
                    <div class="pr-image">
                        <img src="./Images/New Books/vsichki-shepneshti-kosti.jpg" alt="">
                    </div>

                    <!-- Price -->
                    <div class="name-price">
                        <h3>Всички шепнещи кости</h3>
                        <span>20.00лв</span>
                    </div>

                    <!-- Info text -->
                    <p>&nbsp;&nbsp;„Всички води по света са свързани." „Една тайна рядко остава такава, ако бъде споделена.“</p>

                    <!-- Rate -->
                    <div class="stars">
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>

                    <!-- Buy button -->
                    <div class="buy">
                        <i class="fa-regular fa-bookmark"></i><button>Купи</button>
                    </div>
                </div>

                <div class="product">
                    <!-- Image -->
                    <div class="pr-image">
                        <img src="./Images/New Books/bezzvezdnata-korona.jpg" alt="">
                    </div>

                    <!-- Price -->
                    <div class="name-price">
                        <h3>Беззвездната корона</h3>
                        <span>29.99лв</span>
                    </div>

                    <!-- Info text -->
                    <p>&nbsp;&nbsp;Едно опасно пътешествие в далечното минало.
                        Една надарена ученичка предсказва апокалипсис.</p>

                    <!-- Rate -->
                    <div class="stars">
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>

                    <!-- Buy button -->
                    <div class="buy">
                        <i class="fa-regular fa-bookmark"></i><button>Купи</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of new products -->
    </div>
    <!-- End of main section -->

    <!-- Footer -->
    <footer class="footer">
        <div class="left-footer">
            <h2>The Fantasy Bookshop</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero atque itaque similique! Deserunt, cum unde! Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium vel illum provident unde iusto, ea.
            </p>

            <div class="social">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>

        <ul class="right-footer">
            <li>
                <h3>За нас</h3>
                <ul class="box h-box">
                    <li><a href="">Блог</a></li>
                    <li><a href="">Книги</a></li>
                    <li><a href="">Доставка</a></li>
                    <li><a href="">Контакти</a></li>
                </ul>
            </li>

            <li class="features">
                <h3>Помощ</h3>
                <ul class="box">
                    <li><a href="">Въпроси</a></li>
                    <li><a href="">Общи условия</a></li>
                    <li><a href="">Как да пазарувам?</a></li>
                    <li><a href="">Политика за поверителност</a></li>
                </ul>
            </li>
        </ul>

        <div class="bottom-footer">
            <p>All Right Reserved by &copy;Someone 2024</p>
        </div>
    </footer>
    <!-- Footer End -->

    <script>
        $(document).ready(function() {
            $(window).bind('scroll', function() {
                var gap = 50;
                if ($(window).scrollTop() > gap) {
                    $('header').addClass('active');
                } else {
                    $('header').removeClass('active');
                }
            });
        });
    </script>

    <!-- Icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>