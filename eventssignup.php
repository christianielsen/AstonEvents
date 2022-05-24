<?php
require_once 'config/loginController.php';
require_once 'config/eventRegister.php';

?>
<!-- If user is not logged in, redirect to index -->
<?php
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
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

    <!-- Jscript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <link rel="icon" href="images/logo.png">

    <title>Events signup</title>
</head>

<body>
    <?php include('header.php'); ?>

    <div id="wrap">
        <div id="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 offset-md-4 form-div">
                        <form action="eventssignup.php" method="post">
                            <h3 class="text-center">Sign up for an event</h3>

                            <?php if (count($errors) > 0) : ?>
                                <div class="alert alert-danger">
                                    <?php foreach ($errors as $error) : ?>
                                        <li><?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>


                            <div class="form-group">
                                <label for="events">Select an event</label>
                                <select class="form-select form-select-lg mb-3" name="events">
                                    <option value="0" disabled>---Sports---</option>
                                    <option value="Basketball">Basketball</option>
                                    <option value="Football">Football</option>
                                    <option value="Cricket">Cricket</option>

                                    <option value="0" disabled>---Games---</option>
                                    <option value="PS4">PS4</option>
                                    <option value="Chess">Chess</option>
                                    <option value="Monopoly">Monopoly</option>

                                    <option value="0" disabled>---Other---</option>
                                    <option value="Cocktail">Cocktail Making</option>
                                    <option value="Debate">Debate</option>
                                    <option value="Painting">Painting</option>

                                </select>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" name="eventssignup-btn" class="btn btn-primary">Sign up</button>
                            </div>
                        </form>

                    </div>
                    <?php
                    $id = $_SESSION['id'];
                    $sql = "SELECT * FROM user_events WHERE user_id = '$id'";
                    $result = $conn->query($sql);
                    if ($result->num_rows == 0) { ?>
                    <?php } else { ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 offset-md-4 form-div">
                                    <h3>Events you've signed up for:</h3>
                                    <?php
                                    $id = $_SESSION['id'];
                                    $sql = "SELECT * FROM user_events WHERE user_id='$id'";
                                    $result = $conn->query($sql);

                                    while ($row = $result->fetch_assoc()) {
                                        echo "<li>" . $row['events'] . "</li>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

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
        <?php include_once('footer.php'); ?>

    </div>


</body>

</html>