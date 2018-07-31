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

function deleteOrder(id) {

    var r = confirm("Сигурен ли си че искаш да изтриеш поръчката");
    if (r == true) {
        window.location.href = "/admin/deleteOrder/"+id;
    } else {
        txt = "You pressed Cancel!";
    }
}
function deleteDeliverer(id) {
    var r = confirm("Сигурен ли си че искаш да изтриеш доставчика");
    if (r == true) {
        window.location.href = "/admin/deleteDeliverer/"+id;
    } else {
        txt = "You pressed Cancel!";
    }
}
function reload() {
    location.reload();
}

$('.quantity').on('change' ,function () {
    let total = $('.total').text().split(' ')[1];
    let $tr =  $(this).closest('tr');
    let data ={};
    data.total = total;
    data.index = $tr[0].rowIndex;
    $tr.children('td').map(function () {
       $(this).children().map(function () {
           if($(this).attr('name') !== undefined) {
               data[$(this).attr('name')] = $(this).is('input') ? $(this).val() : $(this).text().trim();
           }
       });
    });
    $.ajax({
        type: "POST",
        url: "./updateCart",
        data:  data,
        success: function(result) {
            if(result){
                $('.total').html('Общо: ' + result + ' лв.');
            }
        },
        error: function (error) {
            alert(error);
        }
    });
});

