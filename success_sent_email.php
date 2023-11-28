<?php
require_once("php/header2.php");
require_once("config-url.php");
?>

<style>
    .message-container {
        width: 100%;
        height: 100vh;
    }

    .message-wrapper {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
</style>

<body class="message-container">
    <div class="message-wrapper">
        <h1>
            Thank you for reaching out!
        </h1>
        <div>
            <a href="<?php echo BASE_URL ?>/index.php">Go Back to Home Page</a>
        </div>
    </div>
</body>

</html>