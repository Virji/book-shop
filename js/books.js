// Кодът се изпълнява, когато документът е напълно зареден
$(document).ready(function() {

    // Изпращане на данни за продукта на сървъра
    $(".addItemBtn").click(function(e) {
        // Предотвратява стандартното действие при клик върху бутона
        e.preventDefault();
        
        // Намиране на формата, към която принадлежи бутона
        var $form = $(this).closest(".form-submit");
        
        // Извличане на стойностите на продукта от полетата на формата
        var pid = $form.find(".pid").val();
        var pname = $form.find(".pname").val();
        var pprice = $form.find(".pprice").val();
        var pimage = $form.find(".pimage").val();
        var pcode = $form.find(".pcode").val();
        var pqty = $form.find(".pqty").val();

        // Изпращане на AJAX заявка към сървъра с информацията за продукта
        $.ajax({
            // URL адрес на сървъра, който обработва заявката
            url: './php/action.php',
            // HTTP метод, използван при заявката (POST)
            method: 'post',
            // Данни, използвани при POST заявката; информация за продукта
            data: {
                pid: pid,
                pname: pname,
                pprice: pprice,
                pqty: pqty,
                pimage: pimage,
                pcode: pcode
            },
            
            // Функция, изпълняема при успешен отговор от сървъра
            success: function(response) {
                // Вмъква получения отговор в елемента с идентификатор "message" на текущата страница
                $("#message").html(response);
                
                // Премества прозореца за преглед нагоре
                window.scrollTo(0, 0);
                
                // Зарежда и показва обновения брой на елементите в количката
                load_cart_item_number();
            }
        });
    });

    // Функция за зареждане на броя на елементите в количката и показване в навигационната лента
    function load_cart_item_number() {
        $.ajax({
            // URL адрес на сървъра, който обработва заявката
            url: './php/action.php',
            // HTTP метод, използван при заявката (GET)
            method: 'get',
            // Данни, използвани при GET заявката; поискване на информация за броя на елементите в количката
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
