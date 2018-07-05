<?php
include VIEW . 'header.phtml';
?>
<?php

$address=$this->view_data["address"]["user_address"];
$name=$this->view_data["address"]["user_name"];
$phone=$this->view_data["address"]["user_phone"];
$email=$this->view_data["address"]["user_email"];
?>
    <div class="jumbotron jumbotron-fluid">
        <h1 class="text-center"> edit Profile</h1>
        <div align="center">
            <form action="/profile/editProfileAction" method="post" >
                <div class="form-group">
                    <label for="exampleInputEmail1">NAME</label>
                    <div class="wop1">
                        <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name" type="name" name="name" value="<?php echo $name?>">
                    </div>
                </div>
<!--                <div class="form-group">-->
<!--                    <label for="exampleInputEmail1">email</label>-->
<!--                    <div class="wop1">-->
<!--                        <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" type="email" name="email" value="--><?php //echo $email?><!--">-->
<!--                    </div>-->
<!--                </div>-->
                <div class="form-group">
                    <label for="exampleInputEmail1">PHONE</label>
                    <div class="wop1">
                        <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="phone" type="phone" name="phone" value="<?php echo $phone?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">address</label>
                    <div class="wop1">
                        <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="äddress" type="address" name="address" value="<?php echo $address?>">
                    </div>
                </div>
                    <button type="submit" class="btn btn-outline-primary">запиши</button>
            </form>
            <br>
            <a href="/profile/"><button class="btn btn-outline-primary" >назад</button></a>
        </div>
    </div>

<?php
include VIEW . 'footer.phtml';
?>