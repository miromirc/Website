<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Main :: miro.mirc</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="center-wrapper">
    <div class="signin-box">
        <h2>Dobrodošel, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <p>To je tvoja glavna stran po prijavi.</p>
        <a href="logout.php" class="btn-signin">Odjava</a>
    </div>
</div>
</body>
</html>
