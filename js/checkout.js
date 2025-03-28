// Кодът се изпълнява, когато документът е напълно зареден
$(document).ready(function () {

    // Функция, която се извиква при подаване на формата с идентификатор "placeOrder"
    $("#placeOrder").submit(function (e) {
        // Предотвратяваме стандартното действие при изпращане на формата
        e.preventDefault();

        // Използва AJAX заявка, за да изпратим данните от формата на сървъра
        $.ajax({
            // URL адрес на сървъра, който ще обработва заявката
            url: './php/action.php',
            // HTTP метод, използван при заявката (POST)
            method: 'post',
            // Данни, които се изпращат на сървъра; включват данните от формата и допълнителен параметър "action"
            data: $('form').serialize() + "&action=order",

            // Функция, изпълняема при успешен отговор от сървъра
            success: function (response) {
                // Вмъква получения отговор в елемента с идентификатор "order" на текущата страница
                $("#order").html(response);
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
            success: function (response) {
                // Вмъква получения отговор в елемента с идентификатор "cart-item" на текущата страница
                $("#cart-item").html(response);
            }
        });
    }

    // Извиква функцията за зареждане на броя на елементите в количката при стартиране на страницата
    load_cart_item_number();
});
