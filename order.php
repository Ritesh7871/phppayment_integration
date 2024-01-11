<?php
    include "config.php";
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="select * from product where id='$id'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_array($result);

        $pname=$row['product_name'];
        $pprice=$row['product_price'];
        $del_charge=50;
        $total_price=$pprice+$del_charge;
        $pimage=$row['product_image'];
    }
    else{
        echo "No product found!";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete your order</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Kashyap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Product</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Categories</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5">
                <h2 class="text-center text-primary p-2">Fill the details to complete your order</h2>
                <h3>Product Details :</h3>
                <table class="table table-bordered"width="500px">
                    <thead>
                        <tr>
                        <th>Product Name :</th>
                        <td><?php echo $pname; ?></td>
                        <td rowspan="4"class="text-center"><img src="<?php echo $pimage; ?>"width="200"></td>
                        </tr>
                        <tr>
                        <th>Product Price :</th>
                        <td>Rs.<?php echo number_format($pprice) ;?>/-</td>
                        </tr>
                        <tr>
                        <th>Delivery Charge :</th>
                        <td>Rs.<?php echo number_format($del_charge); ?>/-</td>
                        </tr>
                        <tr>
                        <th>Total Price :</th>
                        <td>Rs.<?php echo number_format($total_price); ?>/-</td>
                        </tr>
                    </thead>
                </table>
                <h4>Enter your details :</h4>
                <form action="pay.php"method="post"accept-charset="utf-8">
                    <input type="hidden"name="product_name"value="<?php echo $pname; ?>"/>
                    <input type="hidden"name="product_price"value="<?php echo $pprice; ?>"/>
                    <div class="form-group mb-3">
                        <input type="text"name="name"class="form-control"placeholder="Enter your name"required/>
                    </div>
                    <div class="form-group mb-3">
                        <input type="email"name="email"class="form-control"placeholder="Enter your email"required/>
                    </div>
                    <div class="form-group mb-3">
                        <input type="tel"name="phone"class="form-control"placeholder="Enter your phone"required/>
                    </div>
                    <div class="form-group mb-3">
                    <input type="submit"name="submit"class="btn btn-danger form-control"value="Click to pay:Rs.<?php echo number_format($total_price); ?>/-"/>

                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>