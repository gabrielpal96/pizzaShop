function myFunction() {
    var r = confirm("Сигурен ли си че искаш да излезеш");
    if (r == true) {
        window.location.href = "/user/logout";
    } else {
        txt = "You pressed Cancel!";
    }
}
(function(){

    $("#cart").on("click", function() {
        $(".shopping-cart").fadeToggle( "fast");
    });

})();

$(".quantity").InputSpinner();
$(".btn-decrement").on('click',function(){
    console.log($(this).closest('form').serializeArray());
});