<?php
session_start();


?>


<!DOCTYPE html>
<html lang="en">

<?php #Variables
    $titre = 'Login'
?>
<?php include 'templates/head.php'; ?>
<body id='login-page'>
<?php include 'templates/header.php'; ?>
    
    <form id="login-box" method="POST" class="login-box">
        <h1>Login</h1>

        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder='Username' name='username' required>
        </div>

        <div class="textbox">
            <i class="fas fa-unlock-alt"></i>
            <input type="password" placeholder='Password' name='password' required>
        </div>

        <input type="submit" class='btn' value='Se connecter'>
</form>

<div class="test">
    <p>Hola <?php echo $_SESSION['prenom']; ?></p>
</div>


<?php include 'templates/footer.php'; ?>
</body>
</html>
