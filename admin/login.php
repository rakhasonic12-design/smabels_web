<?php
session_start();
include 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");

    if ($result && mysqli_num_rows($result) == 1) {
        $_SESSION['admin'] = $username;
        header("Location: index.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login Admin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    background: #1d2f5d;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.login-card {
    width: 100%;
    max-width: 400px;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0,0,0,0.25);
    background-color: #fff;
    padding: 30px 25px;
}

.login-card h4 {
    margin-bottom: 25px;
    font-weight: 600;
    color: #333;
}

.form-control {
    border-radius: 8px;
    height: 45px;
    font-size: 14px;
}

.btn-login {
    border-radius: 8px;
    height: 45px;
    font-size: 16px;
    font-weight: 900;
    background: #ffa200;
    color: white;
    border: none;
    transition: 0.3s;
}

.btn-login:hover {
    background: #8b5800;
}

.alert {
    border-radius: 8px;
    font-size: 14px;
    padding: 10px 15px;
}
</style>
</head>
<body>

<div class="login-card">
    <h4 class="text-center">Login Admin</h4>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form method="post">
        <div class="form-group">
            <input class="form-control" name="username" placeholder="Username" required>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" type="password" placeholder="Password" required>
        </div>
        <button class="btn btn-login btn-block">Login</button>
    </form>
</div>

</body>
</html>
