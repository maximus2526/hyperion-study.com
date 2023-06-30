<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel login</title>
    <link rel="stylesheet" href="<?php echo get_url()?>/admin/views/css/auth/auth.css">
    <link rel="stylesheet" href="<?php echo get_url()?>/admin/views/css/base.css">
</head>

<body>
    <?php Errors::display(); ?>
    <div class="auth-form display-flex bg-white">
        <form action="?action=login" class="login-form display-flex column gap" method="POST">
            <p class="title">LOGIN</p>
            <input name="user_login" class="input-items" placeholder="Username" type="text">
            <input type="password" name="user_password" class="input-items" placeholder="Password" type="text">
            <button name="login" class="submit-btn" type="submit">LOGIN</button>
        </form>
        <form action="?action=register" class="singup-form display-flex column gap" method="POST">
            <p class="title">SING UP</p>
            <input name="user_name" class="input-items" placeholder="Username" type="text">
            <input type="password" name="user_password" class="input-items" placeholder="Password" type="text">
            <input type="password" name="user_password_repeat" class="input-items" placeholder="Repeat Password"
                type="text">
            <input type="password" name="access-key" class="input-items" placeholder="Access-Key" type="text">
            <button name="sign-up" class="submit-btn" type="submit">SIGN UP</button>
        </form>
    </div>
</body>

</html>