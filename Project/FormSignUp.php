
<?php
session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FormsSignUp</title>
    <link rel="stylesheet" href="FormsSignUp.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500;700&family=Orelega+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Header/Header.css">
</head>
<body>
<?php include 'Header/Header.php';?>
<?php

if ($_POST) {
    require ('Include/db.php');

    $fname = mysqli_real_escape_string($conn, $_POST['name']);
    $laname =  mysqli_real_escape_string($conn, $_POST['laname']);
    $email = mysqli_real_escape_string($conn, $_POST['e-mail']);
    $contact = mysqli_real_escape_string($conn, $_POST['Contact']);
    $place =  mysqli_real_escape_string($conn, $_POST['City']);
    $DOB =  mysqli_real_escape_string($conn, $_POST['DOB']);
    $CardNUmber = (string) mysqli_real_escape_string($conn, $_POST['CardNumber']);
    $securityCode = (string) mysqli_real_escape_string($conn, $_POST['SecurityCode']);
    $password =  mysqli_real_escape_string($conn, $_POST['password']);
    $password2 =  mysqli_real_escape_string($conn, $_POST['password2']);

     $places= explode(',',$place);


    if ($password!=$password2) echo '<p class="error">Passwords are not equal </p>';
    else if ($place=='NULL') echo '<p class="error">City is not set </p>';
     else {
         mysqli_query($conn, "insert into users (Fname,Lname,Mail,contact,city,DOB,accountNumber,password,securityCode,country) 
                                    values ('{$fname}','{$laname}','{$email}','{$contact}','{$places[0]}','{$DOB}','{$CardNUmber}','{$password}','{$securityCode}','{$places[1]}')");

         if (mysqli_affected_rows($conn) > 0) {

                 $result = mysqli_query($conn, "select * from users where  Mail = '{$email}' and password = '{$password}'");
                 $user = mysqli_fetch_assoc($result);
                 $_SESSION['user_id'] = $user['U_ID'];
                 $_SESSION['f_name'] = $user['Fname'];
                 $_SESSION['email'] = $user['Mail'];
                 $_SESSION['city'] = $user ['city'];
                 $_SESSION['logged_in'] = true;
                 header('Location: MainUserPage.php');

                 header('Location: MainUserPage.php');
                 exit();

         } else {
             echo '<p class="error">There is problem with database, may your data is not valid. Please try again.</p>';
         }
     }
}

?>

<form action="" method="post">
    <div class="wrapper">
    <fieldset>
       <legend>Sign up information</legend>

        <div>
           <label for="name">First name</label>
            <input id="name" name="name" type="text"  value="<?= $_POST['name'] ?? '' ?>" autofocus required placeholder="Teodora">

        </div>
        <div>
            <label for="laname">Last Name</label>
            <input id="laname" name="laname" type="text" value="<?= $_POST['laname'] ?? '' ?>" required placeholder="Hodžić">
        </div>
        <div>
           <label for="e-mail">E-mail</label>
            <input id="e-mail" name="e-mail" value="<?= $_POST['e-mail'] ?? '' ?>" type="email" required placeholder="name.lastname@mail.com">
        </div>
        <div>
            <label for="Contact">Contact number</label>
            <input id="Contact"  name="Contact"  value="<?= $_POST['Contact'] ?? '' ?>" type="tel" required placeholder="387-61-923-123" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}-[0-9]{3}">
        </div>
        <div>
            <label for="City" >City</label>
            <select id="City" name="City">
                <option value="NULL">Your city</option>
                <option value="Sarajevo,B&H">Sarajevo</option>
                <option value="Mostar,B&H">Mostar</option>
                <option value="Tuzla,B&H">Tuzla</option>
                <option value="Zagreb,Cro">Zagreb</option>
                <option value="Split,Cro">Split</option>
                <option value="Beograd,Srb">Beograd</option>
                <option value="Niš,Srb">Niš</option>
            </select>
        </div>
        <div>
            <label for="DOB">Date of birth</label>
            <input id="DOB" name="DOB"  value="<?= $_POST['DOB'] ?? '' ?>" type="date" required>
        </div>
        <div>
            <label for="Card number">Card number</label>
            <input id="Card number" type="tel" value="<?= $_POST['CardNumber'] ?? '' ?>" name="CardNumber" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" required> <br>
            <label for="Security code">Security code</label>
            <input id="Security code" value="<?= $_POST['SecurityCode'] ?? '' ?>" name="SecurityCode" type="tel" inputmode="numeric" pattern="[0-9]{3}" required>
        </div>

        <div>
            <label for="Password">Password</label>
            <input id="Password" type="password" name="password" placeholder="At least one lowercase, capital letter and number (more than 8 characters)" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required> <br>
            <label for="Confirmation">Re-type your password</label>
            <input id="Confirmation"  name="password2" type="password" required>
        </div>

    </fieldset>
    </div>
    <button type="submit">Submit</button>

</form>



</body>
</html>