<!DOCTYPE html>
<html lang="en">

<head>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a href="index.php" class="navbar-brand">
                <!-- Logo Image -->
                <img src="images/logo.svg" alt="logo">
            </a>
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <div class="d-grid gap-2">
                        <a href="index.php" type="button" name="home" class="btn btn-primary btn-lg">Home</a>
                    </div>
                    <div class="d-grid gap-2" style="padding-left: 5px">
                        <a href="events.php" type="button" name="events" class="btn btn-primary btn-lg">Events</a>
                    </div>
                </ul>
            </div>
            <div class="navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <!-- Logout/event sign up buttons show when user is logged in -->
                    <?php if (isset($_SESSION['username'])) {
                    ?>
                        <div class="d-grid gap-2">
                            <a href="eventssignup.php" type="button" name="event-signup-rd" class="btn btn-primary btn-lg text-nowrap">Sign up to an event</a>
                        </div>
                        <div class="d-grid gap-2" style="padding-left: 5px">
                            <a href="index.php?logout=1" type="submit" name="logout-btn" class="btn btn-danger btn-lg logout">Logout</a>
                        </div>

                        <!-- Register/login buttons show when not logged in -->
                    <?php } else { ?>
                        <div class="d-grid gap-2">
                            <a href="signup.php" type="button" name="register" class="btn btn-primary btn-lg">Register</a>
                        </div>
                        <div class="d-grid gap-2" style="padding-left: 5px">
                            <a href="login.php" type="button" name="login" class="btn btn-primary btn-lg">Login</a>
                        </div>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

</head>

</html>