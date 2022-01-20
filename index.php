<?php include 'nav.php';
?>

<div class="container">

    <div class="row main-hero">
        <div class="col-6">
            <div class="home-container">
                <div class="home-subtitle">
                    <h2>Your too little <br>may be enormous <br> for someone.</h2>
                    <a href="donate.php" class="btn btn-outline-success">Donate Now</a>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="home-picture text-center">
                <img src="vendor/img/home.svg" alt="">
            </div>
        </div>
    </div>


    <div class="row mt-5 mb-3">
        <div class="col-12">
            <div class="text-center">
                <span class="text-success">Our Features</span>
            </div>
            <h2 class="text-center mt-2">We Believe that We can Save <br> More Lives with you </h2>
        </div>
    </div>
    <div class="row mt-3">

        <div class="col-sm-12 col-md-3 col-lg-3">
            <div class="text-center">
                <img src="vendor/img/healthyfood.svg" class="features__img" />
                <h5 class="mt-2">Healthy Food</h5>
                <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error et quis
                    modi.</p>
            </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
            <div class="text-center">
                <img src="vendor/img/education.svg" class="features__img" />

                <h5 class="mt-2">Education</h5>
                <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error et quis
                    modi.</p>
            </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
            <div class="text-center">
                <img src="vendor/img/water.svg" class="features__img" />

                <h5 class="mt-2">Pure Water</h5>
                <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error et quis
                    modi.</p>
            </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
            <div class="text-center">
                <img src="vendor/img/medical.svg" class="features__img" />

                <h5 class="mt-2">Medical</h5>
                <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error et quis
                    modi.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-5">
            <h1 class="mb-5 text-center">Causes we are serving</h1>
        </div>

    </div>

    <?php
    if (isset($_POST['submit'])) {
        $_SESSION['fund_id'] = $_POST['id'];
        $_SESSION['fund_name'] = $_POST['name'];
        $_SESSION['fund_raise'] = $_POST['raise'];
        $_SESSION['fund_total'] = $_POST['total'];
        echo '<script>
        window.location.href = "DonateNow/donate.php";
        </script>';
    }


    ?>
    <form action="index.php" method="POST">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">

                    <div class="row">
                        <?php
                        include 'db.php';
                        $obj = new database();
                        $obj->select('funds_raised', '*', null, null, null, '3');
                        $funds = $obj->getResult();
                        if (!empty($funds) && count($funds) > 0) {
                            foreach ($funds as $fund) {
                        ?>

                                <div class="mx-2 card" style="width: 22rem;">
                                    <form action="index.php" method="POST">
                                        <input type="number" name="id" value="<?= $fund['id'] ?>" hidden>
                                        <input type="text" name="name" value="<?= $fund['name'] ?>" hidden>
                                        <input type="text" name="raise" value="<?= $fund['raise'] ?>" hidden>
                                        <input type="text" name="total" value="<?= $fund['total'] ?>" hidden>
                                        <img src="vendor/img/<?= $fund['image'] ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: <?= $fund['raise'] * 100 / $fund['total'] ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?= intval($fund['raise'] * 100 / $fund['total']) ?>%</div>
                                            </div>
                                            <h5 class="mt-3 card-title"><?= $fund['name'] ?></h5>
                                            <p class="card-text"><?= $fund['description'] ?></p>
                                            <div class="row">
                                                <div class="col">
                                                    <span>$<?= $fund['raise'] ?></span> <br>
                                                    <span>Raise</span>
                                                </div>
                                                <div class="col">
                                                    <span>$<?= $fund['total'] ?></span> <br>
                                                    <span>Goal</span>
                                                </div>
                                            </div>
                                            <?php if ($fund['raise'] >= $fund['total']) { ?>
                                                <a href="#"><button class="mt-3 w-100 btn btn-dark">Donation Goal Complete</button></a>
                                            <?php } else { ?>
                                                <a href="#"> <button type="submit" name="submit" class="mt-3 w-100 btn btn-success">Donate Now</button> </a>
                                            <?php } ?>
                                        </div>
                                    </form>
                                </div>


                        <?php
                            }
                        }
                        ?>
                    </div>

                </div>



            </div>
            <button class="text-dark carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class=" carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class=" carousel-control-next-icon" aria-hidden="true"></span>
                <span class="text-dark visually-hidden">Next</span>
            </button>
        </div>

        <!-- </div> -->

        <div class="row mt-5">
            <div class="col-sm-12 col-md-6 col-lg-6 ">
                <div class="text-center">
                    <img class=" img-fluid img-thumbnail" src="vendor/img/pictureP3.jpg" alt="">

                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="serve-section">
                    <h2>We Serve the Huminity</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                        Est quisquam nam adipisci ipsum dolor. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iste sed architecto laudantium?</p>
                </div>
            </div>

        </div>
        <div class="row mt-5">
            <div class="col-7">
                <h1>Contact us</h1>
                <p class="pt-3">If you have any query regardless anything, contact us and we will attend you quickly, with our 24/7 chat service.</p>

            </div>
            <div class="col-5">
                <div class="text-center">
                    <a href="contactus.php"> <button class="btn btn-success donate-btn">Contact us</button> </a>
                </div>


            </div>

        </div>
</div>
<footer>
    <div>
        <h3 class="text-success">Care4aCause</h3>
        <i class="fab fa-facebook-f"></i>
        <i class="fab fa-instagram"></i>
        <i class="fab fa-twitter"></i>

    </div>
    <div>
        <h4>Services</h4>
        <span class="services">Paypal</span><br>
        <span class="services">Easypaisa</span><br>
        <span class="services">JazzCash</span><br>
    </div>
    <div>
        <h4>Information</h4>
        <span class="services">Privacy Policy</span><br>
        <span class="services">Contact us</span><br>
        <span class="services">Terms of services</span><br>
    </div>
    <div>
        <h4>Address</h4>
        <span class="services">Islamabad - Pakistan</span><br>
        <span class="services">Jr Union #999</span><br>
        <span class="services">info@care4acause.com</span><br>
    </div>
    </div>
    </div>

</footer>
<div class="footer">
    <p class="text-center">&#169; Care4aCause. All right reserved</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>