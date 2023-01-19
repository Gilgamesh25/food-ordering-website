<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    <title>YOsan Warmindo</title>


<!-- Header-->
 <header class="bg-dark py-5" id="main-header">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Your Stomach Deserve The Best</h1>
            <p class="lead fw-normal text-white-50 mb-0">Looking for your Noodles needs? Shop Now!</p>
        </div>
    </div>
</header><br><br><br>
<section class="section">
        <div class="container">
                        <div class="section-heading text-center">
                            <h2>Yosan Warmindo is one of the best choice you have</h2>
                        </div>
</section>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php 
                $products = $conn->query("SELECT * FROM `products` where status = 1 order by rand() limit 8 ");
                while($row = $products->fetch_assoc()):
                    $upload_path = base_app.'/uploads/product_'.$row['id'];
                    $img = "";
                    if(is_dir($upload_path)){
                        $fileO = scandir($upload_path);
                        if(isset($fileO[2]))
                            $img = "uploads/product_".$row['id']."/".$fileO[2];
                        // var_dump($fileO);
                    }
                    $inventory = $conn->query("SELECT * FROM inventory where product_id = ".$row['id']);
                    $inv = array();
                    while($ir = $inventory->fetch_assoc()){
                        $inv[$ir['size']] = number_format($ir['price']);
                    }
            ?>
            <div class="col mb-5">
                <div class="card h-100 product-item">
                    <!-- Product image-->
                    <img class="card-img-top w-100" src="<?php echo validate_image($img) ?>" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder"><?php echo $row['product_name'] ?></h5>
                            <!-- Product price-->
                            <?php foreach($inv as $k=> $v): ?>
                                <span><b><?php echo $k ?>: </b><?php echo $v ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-flat btn-primary "   href=".?p=view_product&id=<?php echo md5($row['id']) ?>">View</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<section class="">
    <p class="text"><span class="text-danger">D</span>ISPLAY</p>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather&display=swap');
        .text {
            color: black;
            text-align: center;
            margin-top: 20px;
            font-size: 40px;
            font-weight: bold;
            font-style: italic;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    </style>
<div class="container-img mb-3">
    <div class="card-img">
        <img class="gbr" src="uploads/product_2/real.jpg" alt="image1">
    </div>
    <div class="card-img">
        <img class="gbr" src="uploads/product_2/menu-item-01.jpg" alt="image1">
    </div>
    <div class="card-img">
        <img class="gbr" src="uploads/product_2/soto.jpg" alt="image1">
    </div>
    <div class="card-img">
        <img class="gbr" src="uploads/product_2/indomie goreng.jpeg" alt="image1">
    </div>
    <div class="card-img">
        <img class="gbr" src="uploads/product_2/kare.png" alt="image1">
    </div>
</div>

<style>
     .container-img {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    flex-direction: row;
    }
    .gbr {
        align-items: center;
        justify-content: center;
        margin: auto;
        display: flex;
        width: 75%;

    }
    .card-img {
        margin: 0 auto;
        width: 270px;
        height: 210px;
        display: inline-block;
        align-items: center;
        justify-content: space-between;
        background: rgb(255, 255, 255);
        margin-bottom: 20px;
        border-radius: 1em;
        box-shadow: 0.3em 0.3em 0.7em #00000015;
        animation: slide 15s linear infinite;
        transition: border 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: rgb(250, 250, 250) 0.2em solid;
    }

    .card-img:hover {
        border: #006fff 0.2em solid;
    }

    @keyframes slide {
  0% {
    transform: translateX(0);
  }
  20% {
    transform: translateX(-10%);
  }
  40% {
    transform: translateX(10%);
  }
  60% {
    transform: translateX(-10%);
  }
  80% {
    transform: translateX(10%);
  }
  100% {
    transform: translateX(0%);
  }
}

    @media screen and (max-width: 600px) {
        .card-img {
    width: 80%;
    height: auto;
    }
    }
   
</style>
</section>
<section>
  
</section>




