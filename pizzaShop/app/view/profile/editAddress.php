<?php
include VIEW . 'header.phtml';
?>
<?php
$address=$this->view_data["address"]["user_address"];
?>
    <div class="jumbotron jumbotron-fluid">
        <h1 class="text-center">edit address</h1>
        <div align="center">
            <form action="/profile/editAddressAction" method="post" >
                <div class="form-group">
                    <label for="exampleInputEmail1">address</label>
                    <div class="wop1">
                        <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="äddress" type="adrres" name="address" value="<?php echo $address?>">
                    </div>
                </div>
                    <button type="submit" class="btn btn-outline-primary">Login</button>
            </form>
        </div>
    </div>

<?php
include VIEW . 'footer.phtml';
?>