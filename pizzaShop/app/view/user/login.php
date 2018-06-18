<?php
include VIEW . 'header.phtml';
?>

<h1>login</h1>
<hr>
    <!------ Include the above in your HEAD tag ---------->

    <div class = "container">
        <div class="wrapper">
            <form action="/user/loginProcess" method="post" name="Login_Form" class="form">
                <h3 class="form-signin-heading">Welcome Back! Please Sign In</h3>
                <hr class="colorgraph"><br>

                <input type="text" class="form-control" name="email" placeholder="Email" required="" autofocus="" />
                <input type="password" class="form-control" name="Password" placeholder="Password" required=""/>

                <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>
            </form>
        </div>
    </div>
<?php
include VIEW . 'footer.phtml';
?>