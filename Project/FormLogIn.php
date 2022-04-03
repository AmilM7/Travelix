<?php
session_start(); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="FormsSignUp.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500;700&family=Orelega+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Header/Header.css">
</head>
<body>
<?php include 'Header/Header.php';?>

<?php
if ($_POST) {
    require ('Include/db.php');
    $username = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $result = mysqli_query($conn, "select * from users where  Mail = '{$username}' and password = '{$password}'");

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['logged_in'] = true;
        $user = mysqli_fetch_assoc($result);
        if ($user['U_ID']==55) {
            $_SESSION['admin'] = true;
            header('Location: Admin/DashboardAdmin.php');
        }
        else {
            $_SESSION['user_id'] = $user['U_ID'];
            $_SESSION['f_name'] = $user['Fname'];
            $_SESSION['email'] = $user['Mail'];
            $_SESSION['city'] = $user ['city'];
        header('Location: MainUserPage.php');
    }} else {
        echo '<p class="error">Invalid input, please try again</p>';
    }
}
?>

<form action="" method="post">
    <div class="wrapper">
        <fieldset>
            <legend>Log in</legend>
            <div>
                <label for="email">E-mail</label>
                <input id="email" type="email" name="email" required placeholder="name.lastname@mail.com">
            </div>
            <div>
                <label for="password">Password</label>
                <input id="password"  name="password" type="password"  required>
            </div>

        </fieldset>
    </div>

    <button type="submit">Log in</button>

    <div>
        <a href="FormSignUp.php" class="Zadnji">Don't Have an Account?</a>
    </div>
</form>

</body>
</html>