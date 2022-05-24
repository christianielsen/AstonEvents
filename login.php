<?php require_once 'config/loginController.php'; ?>

<?php
if (isset($_SESSION['username'])) {
    header('Location: events.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="images/logo.png">

    <title>Login</title>
</head>

<body>
    <?php include_once('header.php'); ?>

            <div class="container">
                <div class="row">
                    <div class="col-md-4 offset-md-4 form-div login">
                        <form action="login.php" method="post">
                            <h3 class="text-center">Login</h3>

                            <?php if (count($errors) > 0) : ?>
                                <div class="alert alert-danger">
                                    <?php foreach ($errors as $error) : ?>
                                        <li><?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>


                            <div class="form-group">
                                <label for="username">ID Number or Email</label>
                                <input type="text" name="username" value="<?php echo $username; ?>" class="form-control form-control-lg rounded-pill">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control form-control-lg rounded-pill">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" name="login-btn" class="btn btn-primary rounded-pill">Login</button>
                                <a href="signup.php" class="text-center" id="nam">Not a member? Sign up here</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


    <?php include_once('footer.php'); ?>

</body>

</html>