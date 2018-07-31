<?php
include VIEW . 'header.phtml';
?>


    <div class="jumbotron jumbotron-fluid">
    <div align="center">
        <h2>Профил:</h2>
<a href="/profile/editProfile"><button class="btn btn-outline-primary"> edit Profile</button></a>
<?php
if(array_key_exists('user',$this->view_data)){
    $user=$this->view_data["user"];
    echo "" . "<br>";
    echo "" . "<br>";
    echo "<b>name: </b>" .$user["user_name"]. "<br>";
    echo "<b>email: </b>" .$user["user_email"]. "<br>";
    echo "<b>telefon: </b>" .$user["user_phone"]. "<br>";
    echo "<b>adres: </b>" .$user["user_address"]. "<br>";

}
?>
    </div>
    </div>
<?php
include VIEW . 'footer.phtml';
?>