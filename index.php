<?php
    require 'config.php';
    // fetching the data from datbase;
    $sql="select * from product";
    $result=mysqli_query($con,$sql);
    

    
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <?php 
                  while($row=mysqli_fetch_array($result)){
                  
                ?>
                    <div class="col-lg-4 mt-3 mb-3">
                    <div class="card" style="width:400px">
                        <img class="card-img-top" src="<?php echo $row['product_image']; ?>" height="320">
                        <div class="card-body">
                            <h4 class="card-title">Product:<?php echo $row['product_name']; ?></h4>
                            <h3 class="text-dark">Price:<?php echo number_format($row['product_price']); ?>/-</h3>
                            <a href="order.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-block ">Buy Now</a>
                            
                        </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    
            </div>
               
        </div>
    </div>

</body>
</html>