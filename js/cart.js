// Кодът се изпълнява, когато документът е напълно зареден
$(document).ready(function() {

    // Промяна на количеството на артикула
    $(".itemQty").on('change', function() {
        // Намиране на родителския ред (tr) на текущия елемент
        var $el = $(this).closest('tr');

        // Извличане на стойностите на продукта (pid), цената (pprice) и новото количество (qty)
        var pid = $el.find(".pid").val();
        var pprice = $el.find(".pprice").val();
        var qty = $el.find(".itemQty").val();

        // Презареждане на страницата със задължително изчистване на кеша
        location.reload(true);

        // Изпращане на AJAX заявка за обновяване на количеството на продукта на сървъра
        $.ajax({
            url: './php/action.php',
            method: 'post',
            cache: false,
            data: {
                qty: qty,
                pid: pid,
                pprice: pprice
            },
            
            // Функция, изпълняема при успешен отговор от сървъра
            success: function(response) {
                // Извеждане на отговора в конзолата
                console.log(response);
            }
        });
    });

    // Функция за зареждане на броя на елементите в количката и показване в навигационната лента
    function load_cart_item_number() {
        $.ajax({
            url: './php/action.php',
            method: 'get',
            data: {
                cartItem: "cart_item"
            },
            
            // Функция, изпълняема при успешен отговор от сървъра
            success: function(response) {
                // Вмъква получения отговор в елемента с идентификатор "cart-item" на текущата страница
                $("#cart-item").html(response);
            }
        });
    }

    // Извиква функцията за зареждане на броя на елементите в количката при стартиране на страницата
    load_cart_item_number();
});
