<?php
include 'db.php';

if(isset($_POST['user'], $_POST['email'], $_POST['pwd'], $_POST['pwd1'])){
    $username = $_POST['user'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwd1 = $_POST['pwd1'];

    if($pwd !== $pwd1){
        die("Gesli se ne ujemata.");
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    try {
        $stmt->execute([$username, $email, $hashedPwd]);
        // Uspešna registracija – HTML stran
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Registracija uspešna :: miro.mirc</title>
            <link rel="stylesheet" href="style.css">
            <meta http-equiv="refresh" content="3;url=index.html"> <!-- Samodejno preusmeri po 3s -->
        </head>
        <body>
        <div class="center-wrapper">
            <div class="signin-box">
                <h2><font color="#fe9b02">miro</font>.mirc</h2>
                <h3 class="signin-title-secondary">Uspešna registracija!</h3>
                <p>Preusmeritev na <a href="index.html">prijavo</a> čez 3 sekunde...</p>
            </div>
        </div>
        </body>
        </html>
        <?php
    } catch(PDOException $e){
        die("Napaka: " . $e->getMessage());
    }
}
?>
