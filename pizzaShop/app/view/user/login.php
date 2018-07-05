<?php
include VIEW . 'header.phtml';
?>
    <div class="container jumbotron jumbotron-fluid" style="margin-top: 100px">
        <h1 class="text-center">Log in</h1>
        <div align="center">
            <form action="/user/loginProcess" method="post" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <div class="wop1">
                        <input required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" type="email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <div class="wop1">
                        <input required class="form-control" id="exampleInputPassword1" placeholder="Password" type="password" name="Password">
                        <div class="wop1"></div>

                    </div>
                    <br>
                    <button type="submit" class="btn btn-outline-primary">Login</button>
            </form>
        </div>
    </div>
<?php
include VIEW . 'footer.phtml';
?>