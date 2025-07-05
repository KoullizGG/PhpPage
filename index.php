<?php
session_start();

$errors = [
    'login'=> $_SESSION['login_error'] ?? '',
    'register'=> $_SESSION['register_error'] ?? '',
];
$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error){
    return !empty($error) ? "<div class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm) {
    return $formName === $activeForm ? 'active' : '';
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full-Stack Login & Register Form With User & Admin Page | Codehal</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container"> 
        <div class="form-box <?= isActiveForm('login',$activeForm); ?>" id="login-form">
            <form action="login_register.php" method="post">
                <h2>Login</h2>
                <?= showError($errors['login']) ?>
                <input tpye="email" name="email" placeholder="Email" required>
                <input tpye="password" name="password" placeholder="Password" required>
                <button type="submit" name="Login">Login</button>
                <p class="toggle">Don't have an account? <a href="#" onclick="showForm('Register-form')">Register</a></p>
            </form>
        </div>

         <div class="form-box  <?= isActiveForm('register',$activeForm); ?>" id="Register-form">
            <form action="login_register.php" method="post">
                <h2>Register</h2>
                <?= showError($errors['register']) ?>
                <input tpye="text" name="name" placeholder="Name" required>
                <input tpye="email" name="email" placeholder="Email" required>
                <input tpye="password" name="password" placeholder="Password" required>
                <select name="role" required>
                    <option value="" disabled selected>Select Role</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit" name="register">Register</button>
                <p class="toggle">Already have an account? <a href="#" onclick="showForm('login-form')">Register</a></p>
            </form>
        </div>

    </div>
    <script src="script.js"></script>
</body>

</html>