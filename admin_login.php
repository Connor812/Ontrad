<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/admin_login.css" />
</head>

<body>


    <nav>
        <span>
            ONTRAD ADMIN
        </span>
    </nav>

    <?php
    session_start();

    require_once 'config-url.php';

    if (isset($_SESSION['username'])) {
        echo '<script>window.location.href = "' . BASE_URL . '/songmanager.php"</script>';
    }
    ?>

    <form action="functions/admin_login.inc.php" method="post">
        <div class="input-container">
            <h1>Admin Login</h1>
            <div class="input-section">
                <label for="username-input">Username</label>
                <input id="username-input" class="admin-input" type="text" name="username" placeholder="Username" />
            </div>
            <div class="input-section">
                <label for="pwd-input">Password</label>
                <input id="pwd-input" class="admin-input" type="password" name="pwd" placeholder="Password" />
            </div>
            <div class="submit-btn-container">
                <button class="submit-btn" type="submit">Login</button>
            </div>
        </div>
    </form>



</body>

</html>