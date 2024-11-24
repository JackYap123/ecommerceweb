<?php require_once('header.php');
require_once('config.php'); ?>


<?php
if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];

    $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_email = ? AND cust_token = ?");
    $statement->execute(array($email, $token));
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Update the user's status to verified
        $statement = $pdo->prepare("UPDATE tbl_customer SET cust_status = 1 WHERE cust_email = ?");
        $statement->execute(array($email));
        echo "Your email has been verified successfully!";
    } else {
        echo "Invalid verification link.";
    }
} else {
    echo "Missing parameters in the verification link.";
}
?>

<div class="page-banner" style="background-color:#444;">
    <div class="inner">
        <h1>Registration Successful</h1>
    </div>
</div>

<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="user-content">
                    <?php 
                        echo $error_message;
                        echo $success_message;
                    ?>
                </div>                
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>