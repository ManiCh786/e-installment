<?php

include_once("includes/header.php");

require_once("classes/products.class.php");
require_once("classes/installmentplans.class.php");
require_once('classes/feedback.class.php');
require_once('classes/cart.class.php');

$pName = $_GET['pName'] ?? 'NEw Laptop';
$pId = $_GET['id'] ?? '12';

$products = new Products();
$checkIfToCompare = $products->checkCompareProduct($pName, $pId);
if (isset($_POST['buyThis'])) {
    $pId = $_POST['proId'];
    $pName = $_POST['proName'];

    echo "<script>
    window.location = 'product_details.php?pName=$pName&id=$pId';
    </script>";
}


?>
<div class="container mt-4">
    <h1 class="mb-4">Compare Products</h1>
    <div class="row">

        <div class="col-md-4">
            <div class="card">
                <img src="uploads/productsImages/<?= $checkIfToCompare[0]['pImage'] ?>" class="card-img-top" alt="Product 1">
                <div class="card-body">
                    <h5 class="card-title"><?= $checkIfToCompare[0]['pName'] ?></h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Category :: <?= $checkIfToCompare[0]['cat_Name'] ?></li>
                        <li><a href="#" class="list-group-item text-dark mb-2"><span>Availibility</span> :
                                <?= $checkIfToCompare[0]['inStock'] == "Yes" || "yes" ? 'In Stock' : 'Out of Stock' ?></a></li>

                        <li class="list-group-item">RS :: <?= $checkIfToCompare[0]['pPrice'] ?>PKR</li>
                        <li class="list-group-item">Shop Name :: <?= $checkIfToCompare[0]['shopName'] ?> </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <form action="" method="POST">
                    <input type="hidden" name="proId" value="<?= $checkIfToCompare[0]['pId'] ?>">
                    <input type="hidden" name="proName" value="<?= $checkIfToCompare[0]['pName'] ?>">

                    <input type="submit" name="buyThis" class="btn btn-primary btn-block" value="But This">
                </form>
            </div>
        </div>

        <div class="col-md-4">
        </div>

        <div class="col-md-4">
            <div class="card">

                <img src="uploads/productsImages/<?= $checkIfToCompare[1]['pImage'] ?>" class="card-img-top" alt="Product 2">
                <div class="card-body">
                    <h5 class="card-title"><?= $checkIfToCompare[1]['pName'] ?></h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Category :: <?= $checkIfToCompare[1]['cat_Name'] ?></li>
                        <li><a href="#" class="list-group-item text-dark mb-2"><span>Availibility</span> :
                                <?= $checkIfToCompare[1]['inStock'] == "Yes" || "yes" ? 'In Stock' : 'Out of Stock' ?></a></li>

                        <li class="list-group-item">RS :: <?= $checkIfToCompare[1]['pPrice'] ?>PKR</li>
                        <li class="list-group-item">Shop Name :: <?= $checkIfToCompare[1]['shopName'] ?> </li>

                    </ul>
                </div>
            </div>
            <div class="col-md-12 mt-3">

                <form action="" method="POST">
                    <input type="hidden" name="proId" value="<?= $checkIfToCompare[1]['pId'] ?>">
                    <input type="hidden" name="proName" value="<?= $checkIfToCompare[1]['pName'] ?>">

                    <input type="submit" name="buyThis" class="btn btn-primary btn-block" value="But This">
                </form>
            </div>

        </div>

    </div>


    <?php

    include_once("includes/footer.php");
    ?>