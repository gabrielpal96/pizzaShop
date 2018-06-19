<?php
include VIEW . 'header.phtml';
?>

    <div class="jumbotron jumbotron-fluid">
        <h1 class="text-center">Registration</h1>
        <div align="center">
            <form action='/user/registrationA' method="POST">
                <div class="form-group">
                    <label for="=email">Email address</label>
                    <div class="wop1">
                        <input class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" type="email" name="email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
                <div class="form-group">
                    <label for="=email">NAME</label>
                    <div class="wop1">
                        <input class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name" type="name" name="name">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="wop1">
                        <input class="form-control" id="password" aria-describedby="passHelp" placeholder="Enter password" type="password" name="password">
                        <small id="passHelp" class="form-text text-muted">Your password should be at least 6 chaacters long.</small>
                    </div>

                </div>

                <div class="form-group">
                    <label for="repeatPassword">Repeat password</label>
                    <div class="wop1">
                        <input class="form-control" id="repeatPassword" aria-describedby="rpassHelp" placeholder="Repeat password" type="password">
                        <small id="rpassHelp" class="form-text text-muted">Just to make sure you typed it correctly the first time.</small>
                    </div>

                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <div class="wop1">
                        <input class="form-control" id="address" aria-describedby="adrHelp" placeholder="Enter you address" type="text" name="address">
                        <small id="adrHelp" class="form-text text-muted">So we can deliver it to your door.</small>
                    </div>

                </div>
                <div class="form-group">
                    <label for="address">phone</label>
                    <div class="wop1">
                        <input class="form-control" id="phone" aria-describedby="adrHelp" placeholder="Enter you phone" type="text" name="phone">
                        <small id="adrHelp" class="form-text text-muted">So we can deliver it to your door.</small>
                    </div>

                </div>
                <br>
                <button type="submit" class="btn btn-outline-primary">Register</button>
            </form>
        </div>
    </div>

<?php
include VIEW . 'footer.phtml';
?>