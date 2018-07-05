<?php
include VIEW . 'header.phtml';
?>
    <div class="jumbotron jumbotron-fluid">
        <h1 class="text-center">добави доставчик</h1>
        <div align="center">
            <form action="/admin/addDeliverer" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">име</label>
                    <div class="wop1">
                        <input class="form-control" id="exampleInputEmail1"  placeholder="име и фамилия" type="name" name="name" >

                    </div>

                </div>
                <input type="submit" value="добави" class="btn btn-outline-primary">
            </form>
        </div>
    </div>
<?php
include VIEW . 'footer.phtml';
?>