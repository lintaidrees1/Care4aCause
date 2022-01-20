<?php include 'db.php' ?>
<?php include 'nav.php'; ?>
<?php
if (!isset($_SESSION['donorid'])) {
    header("Location:login.php");
}
$obj = new database();
if (isset($_POST['donate'])) {
    $donor_id = $_SESSION['donorid'];
    $item_name = $_POST['item_name'];
    $category = $_POST['categorty'];
    $donor_address = $_POST['donor_address'];

    $show = $obj->insert('donation_by_mail', [
        'item_name' => $item_name,
        'categorty' => $category,
        'donor_id' => $donor_id,
        'donor_address' => $donor_address
    ]);
    if ($show) {
        header("location: mail-to-us.php");
    }
}
?>
<div class="registration-form">
    <form action="" method="POST">
        <div class="form-icon">
            <span><i class="icon icon-envelope"></i></span>
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" name="item_name" placeholder="Enter Item Name">
        </div>
        <div class="form-group">
            <select class="form-control item" name="categorty">
                <option disabled selected>Select Category</option>
                <option>Health Care</option>
                <option>Clothes</option>
                <option>Others</option>
            </select>
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" name="donor_address" placeholder="Enter your complete address">
        </div>
        <div class="form-group text-center">
            <button type="submit" name="donate" value="donate" class="btn btn-block donate-button">Donate</button>
        </div>
    </form>

</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="assets/js/script.js"></script>
</body>

</html>