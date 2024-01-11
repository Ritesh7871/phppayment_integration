<?php
    require "config.php";
    $msg="";
    if(isset($_POST['submit'])){
        $pName=$_POST['pName'];
        $pPrice=$_POST['pPrice'];

        $target_dir="image/";
        $target_file=$target_dir.basename($_FILES['pImage']['name']);
        move_uploaded_file($_FILES['pImage']['tmp_name'],$target_file);
        
        $sql ="insert into product (product_name,product_price,product_image)values('$pName','$pPrice','$target_file')";
        $result=mysqli_query($con,$sql);
        if($result){
            $msg="Product Added to the database successfully!";
        }
        else{
            $msg="Failed to add the product!";
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Information</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</head>
<body class="bg-success">
    <div class="container-fluid">
        <div class="row justify-content-center">
        <div class="col-md-6 bg-light mt-5 rounded">
            <h2 class="text-center text-primary">Add Product Information</h2>
            <form action=""method="post"class="p-2"enctype="multipart/form-data"id="form-box">
                <div class="form-group mb-3">
                    <input type="text"name="pName"class="form-control"placeholder="Product Name"required/>
                </div>
                <div class="form-group mb-3">
                    <input type="text"name="pPrice"class="form-control"placeholder="Product Price"required/>
                </div>
                <div class="form-group mb-3">
                     <input type="file"name="pImage"class="form-control"id="custom-file"required/>
                </div>
                <div class="form-group">
                    <input type="submit"name="submit"class="btn btn-danger  form-control"value="Add"/>
                </div>
                <div class="form-group">
                    <h4 class="text-center"><?php echo $msg; ?></h4>
                </div>
                

            </form>
        </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 mt-3 p-4 bg-light rounded">
                <a href="index.php"class="btn btn-warning form-control btn-lg">Go to product page</a>
            </div>
        </div>
    </div>

    
</body>
</html>