<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cart | The Fantasy Bookshop</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <link href="./css-folders/books.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar start -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="input.php"><img src=""></i>&nbsp;&nbsp;The Fantasy Bookshop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="books.php"></i>Книги</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></i>Луксозни издания</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></i>Контакти</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="checkout.php"></i>Плащане</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Navbar end -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- //Показва съобщения или предупреждения -->
                <div style="display:<?php if (isset($_SESSION['showAlert'])) {
                                        echo $_SESSION['showAlert'];
                                    } else {
                                        echo 'none';
                                    }
                                    unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php if (isset($_SESSION['message'])) {
                                echo $_SESSION['message'];
                            }
                            unset($_SESSION['showAlert']); ?></strong>
                </div>
                <div class="table-responsive mt-2">
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <td colspan="7">
                                    <h4 class="text-center text-info m-0">Продуктите в количката</h4>
                                </td>
                            </tr>
                            <tr>
                                <th>Инд.номер</th>
                                <th>Снимка</th>
                                <th>Продукт</th>
                                <th>Цена</th>
                                <th>Брой</th>
                                <th>Ед. цена</th>
                                <th>
                                    <a href="./books.php" class="badge-danger badge p-1" onclick="return confirm('Сигурни ли сте, че искате да изтриете количката си?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Изтрий количка</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // извлича данни от базата данни от таблицата cart и изчислява общата стойност 
                            // (grand total) на продуктите в количката
                            require './php/configuration.php';
                            $stmt = $conn->prepare('SELECT * FROM cart');
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $grand_total = 0;
                            while ($row = $result->fetch_assoc()) :
                            ?>
                            <!-- //Взима данните от базата, създава кошница на покупките, предупреждения, изчислява -->
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <input type="hidden" class="pid" value="<?= $row['id'] ?>"> 
                                    <td><img src="<?= $row['product_image'] ?>" width="50"></td> 
                                    <td><?= $row['product_name'] ?></td> 
                                    <td>
                                        </i>&nbsp;&nbsp;<?= number_format($row['product_price'], 2); ?>
                                    </td>
                                    <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                                    <td>
                                        <input type="number" class="form-control itemQty" value="<?= $row['qty'] ?>" style="width:75px;">
                                    </td>
                                    <td></i>&nbsp;&nbsp;<?= number_format($row['total_price'], 2); ?></td>
                                    <td>
                                        <a href="./php/action.php?remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Сигурни ли сте, че искате да изтриете този продукт?');"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <?php $grand_total += $row['total_price']; ?>
                            <?php endwhile; ?>
                            <tr>
                                <td colspan="3">
                                    <a href="./has-profile.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Продължете пазаруването</a>
                                </td>
                                <td colspan="2"><b>Общо</b></td>
                                <td><b></i>&nbsp;&nbsp;<?= number_format($grand_total, 2); ?></b></td>
                                <td>
                                    <a href="./checkout.php" class="btn btn-info <?= ($grand_total > 1) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Плащане</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

    <script src="./js/cart.js" type="text/javascript"></script>
</body>

</html>