<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Product | E-Shop</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css" />

    <link rel="icon" href="resources/logo.png" />

</head>

<body>

    <div class="container-fluid">
        <div class="row gy-3">
            <?php include "header.php"; ?>

            <div class="col-12">
                <div class="row">

                    <div class="col-12 text-center">
                        <h2 class="h2 text-primary fw-bold">Add New Product</h2>
                    </div>

                    <div class="col-12">
                        <div class="row">

                            <div class="col-12 col-lg-4 border-end border-success">
                                <div class="row">

                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">Select Product Category</label>
                                    </div>

                                    <div class="col-12">
                                        <select class="form-select text-center" id="category">
                                            <option value="0">Select Category</option>
                                            <?php
                                            include "connection.php";

                                            $category_resultset = Database::search("SELECT * FROM category");
                                            $category_num = $category_resultset->num_rows;

                                            for ($i = 0; $i < $category_num; $i++) {
                                                $category_data = $category_resultset->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $category_data["cat_id"]; ?>">
                                                    <?php echo $category_data["cat_name"]; ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 col-lg-4 border-end border-success">
                                <div class="row">

                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">Select Product Brand</label>
                                    </div>

                                    <div class="col-12">
                                        <select class="form-select text-center" id="brand">
                                            <option value="0">Select Brand</option>
                                            <?php
                                            $brand_resultset = Database::search("SELECT * FROM brand");
                                            $brand_num = $brand_resultset->num_rows;

                                            for ($x = 0; $x < $brand_num; $x++) {
                                                $brand_data = $brand_resultset->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $brand_data["brand_id"]; ?>">
                                                    <?php echo $brand_data["brand_name"]; ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 col-lg-4 border-end border-success">
                                <div class="row">

                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">Select Product Model</label>
                                    </div>

                                    <div class="col-12">
                                        <select class="form-select text-center" id="model">
                                            <option value="0">Select Model</option>
                                            <?php
                                            $model_resultset = Database::search("SELECT * FROM model");
                                            $model_num = $model_resultset->num_rows;

                                            for ($y = 0; $y < $model_num; $y++) {
                                                $model_data = $model_resultset->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $model_data["model_id"] ?>">
                                                    <?php echo $model_data["model_name"]; ?>
                                                </option>
                                            <?php
                                            }

                                            ?>
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12">
                                <hr class="border-success" />
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">
                                            Add a Title to your Product
                                        </label>
                                    </div>
                                    <div class="offset-0 offset-lg-2 col-12 col-lg-8">
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr class="border-success" />
                            </div>

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-12 col-lg-4 border-end border-success">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Select Product Condition</label>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check form-check-inline mx-5">
                                                    <input class="form-check-input" type="radio" name="c" id="checkNew" checked />
                                                    <label class="form-check-label fw-bold" for="">Brandnew</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="c" id="checkUsed" />
                                                    <label class="form-check-label fw-bold" for="">Used</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4 border-end border-success">
                                        <div class="row">

                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Select Product Colour</label>
                                            </div>

                                            <div class="col-12">

                                                <select class="col-12 form-select">
                                                    <option value="0">Select Colour</option>
                                                    <?php
                                                    $color_resultset = Database::search("SELECT * FROM color");
                                                    $color_num = $color_resultset->num_rows;

                                                    for ($y = 0; $y < $color_num; $y++) {
                                                        $color_data = $color_resultset->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $color_data["color_id"]; ?>">
                                                            <?php echo $color_data["color_name"]; ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>

                                            </div>

                                            <div class="col-12">
                                                <div class="input-group mt-2 mb-2">
                                                    <input type="text" class="form-control" placeholder="Add new Colour" id="addColor" />
                                                    <button class="btn btn-outline-primary" type="button" onclick="addColor();">+ Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Add Product Quantity</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="number" class="form-control" value="0" min="0" id="quantity" />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12">
                                <hr class="border-success" />
                            </div>

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-6 border-end border-success">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Cost Per Item</label>
                                            </div>
                                            <div class="offset-0 offset-lg-2 col-12 col-lg-8">
                                                <div class="input-group mb-2 mt-2">
                                                    <span class="input-group-text">Rs.</span>
                                                    <input type="text" class="form-control" id="costPerItem" />
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Approved Payment Methods</label>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="offset-0 offset-lg-2 col-2 pm pm1"></div>
                                                    <div class="col-2 pm pm2"></div>
                                                    <div class="col-2 pm pm3"></div>
                                                    <div class="col-2 pm pm4"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12">
                                <hr class="border-success" />
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">Delivery Cost</label>
                                    </div>
                                    <div class="col-12 col-lg-6 border-end border-success">
                                        <div class="row">
                                            <div class="col-12 offset-lg-1 col-lg-3">
                                                <label class="form-label">Delivery cost Within Colombo</label>
                                            </div>
                                            <div class="col-12 col-lg-8">
                                                <div class="input-group mb-2 mt-2">
                                                    <span class="input-group-text">Rs.</span>
                                                    <input type="text" class="form-control" id="deliveryCostWithinColombo" />
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <div class="col-12 offset-lg-1 col-lg-3">
                                                <label class="form-label">Delivery cost out of Colombo</label>
                                            </div>
                                            <div class="col-12 col-lg-8">
                                                <div class="input-group mb-2 mt-2">
                                                    <span class="input-group-text">Rs.</span>
                                                    <input type="text" class="form-control" id="deliveryCostOutOfColombo" />
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr class="border-success" />
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">Product Description</label>
                                    </div>
                                    <div class="col-12">
                                        <textarea cols="30" rows="15" class="form-control" id="pDescription"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr class="border-success" />
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">Add Product Images</label>
                                    </div>
                                    <div class="offset-lg-3 col-12 col-lg-6">
                                        <div class="row">
                                            <div class="col-4 border border-primary rounded">
                                                <img src="resources/addproductimg.svg" class="img-fluid" style="width: 250px;" id="img1" />
                                            </div>
                                            <div class="col-4 border border-primary rounded">
                                                <img src="resources/addproductimg.svg" class="img-fluid" style="width: 250px;" id="img2" />
                                            </div>
                                            <div class="col-4 border border-primary rounded">
                                                <img src="resources/addproductimg.svg" class="img-fluid" style="width: 250px;" id="img3" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
                                        <input type="file" class="d-none" multiple />
                                        <label for="" class="col-12 btn btn-primary">Upload Images</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr class="border-success" />
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold" style="font-size: 20px;">Notice...</label><br />
                                <label class="form-label">
                                    We are taking 5% of the product from price from every
                                    product as a service charge.
                                </label>
                            </div>

                            <div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3 mb-3">
                                <button class="btn btn-success" onclick="">Save Product</button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <?php include "footer.php"; ?>
        </div>
    </div>

    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>