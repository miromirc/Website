<?php
session_start();
include 'db.php';

if(isset($_POST['uid'], $_POST['pwd'])){
    $username = $_POST['uid'];
    $password = $_POST['pwd'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($password, $user['password'])){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: main.php");
        exit();
    } else {
        echo "Napačno uporabniško ime ali geslo. <a href='index.html'>Nazaj</a>";
    }
}
?>
