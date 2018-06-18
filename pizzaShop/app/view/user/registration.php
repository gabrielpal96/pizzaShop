<?php
include VIEW . 'header.phtml';
?>
<!------ Include the above in your HEAD tag ---------->
    <form action='/user/registrationA' method="POST">
        <div id="legend" class="form-group"">
            <legend class="">Register</legend>
        </div>
        <div class="form-group">
            <label for="user-email">Email address</label>
            <input required type="email" class="form-control" id="user-email" name="email" aria-describedby="emailHelp" placeholder="your@email.net">
            <small id="email-help" class="form-text text-muted">Please provide your E-mail.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input required type="password" class="form-control" name="password" placeholder="Password">
            <small id="password-help" class="form-text text-muted">Password should be at least 4 characters.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Confrim Passowrd</label>
            <input required type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm password">
            <small id="password-help" class="form-text text-muted">Please, confirm your password.</small>
        </div>
        <div class="form-group">
            <label for="user-address">Address</label>
            <input required type="text" class="form-control" name="address" id="user-address" aria-describedby="adress" placeholder="Your city, street number">
            <small id="adress-help" class="form-text text-muted">An address is required for delivery.</small>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
<?php
include VIEW . 'footer.phtml';
?>