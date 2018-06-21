function myFunction() {
    var r = confirm("Сигурен ли си че искаш да излезеш");
    if (r == true) {
        window.location.href = "/user/logout";
    } else {
        txt = "You pressed Cancel!";
    }
}
function deletePizza(id) {

    var r = confirm("Сигурен ли си че искаш да изтриеш пицата");
    if (r == true) {
        window.location.href = "/admin/deletePizza/"+id;
    } else {
        txt = "You pressed Cancel!";
    }
}
