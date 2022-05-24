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

    <title>Register</title>
</head>

<body>

    <?php include_once('header.php'); ?>

    <div class="container" id="wrap">
        <div class="row" id="main">
            <div class="col-md-4 offset-md-4 form-div">
                <form action="signup.php" method="post">
                    <h3 class="text-center">Register</h3>

                    <!-- If no errors, don't display error box -->
                    <?php if (count($errors) > 0) : ?>
                        <div class="alert alert-danger">
                            <?php foreach ($errors as $error) : ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-control form-control-lg rounded-pill">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" class="form-control form-control-lg rounded-pill">
                    </div>
                    <div class="form-group">
                        <label for="username">ID Number</label>
                        <input type="text" name="username" value="<?php echo $username; ?>" class="form-control form-control-lg rounded-pill">
                        <small id="idHelpBlock" class="form-text text-muted">
                            Your ID Number must be 9 digits long.
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?php echo $email; ?>" class="form-control form-control-lg rounded-pill">
                        <small id="emailHelpBlock" class="form-text text-muted">
                            Your email address must be a valid Aston email, and must end in "@aston.ac.uk".
                        </small>

                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg rounded-pill">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" name="signup-btn" class="btn btn-primary rounded-pill">Sign up</button>
                        <a href="login.php" class="text-center" id="aam">Already have an account? Login here</a>
                    </div>
                </form>
            </div>

        </div>

    </div>
    <?php include_once('footer.php'); ?>

</body>

</html>