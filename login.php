<!DOCTYPE html>
<html lang="en">

<?php #Variables
    $titre = 'Login'
?>
<?php include 'templates/head.php'; ?>
<body id='login-page'>
<?php include 'templates/header.php'; ?>
    
    <div class="login-box">
        <h1>Login</h1>

        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder='Username' name='' value=''>
        </div>

        <div class="textbox">
            <i class="fas fa-unlock-alt"></i>
            <input type="password" placeholder='Password' name='' value=''>
        </div>

        <input type="button" class='btn' value='Se connecter'>
    </div>


<?php include 'templates/footer.php'; ?>
</body>
</html>