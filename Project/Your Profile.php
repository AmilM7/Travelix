<?php

require ('Include/isLoggedIn.php');
require ('Include/db.php');

$ID = $_SESSION['user_id'];
$query = mysqli_query($conn, 'select * from users where U_ID = '. $ID);
$row = mysqli_fetch_assoc($query);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Profile</title>
    <link rel="stylesheet" href="Header/Header.css">
    <link rel="stylesheet" href="FormsSignUp.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">

</head>
<body>
<?php include 'Header/Header2.php';
?>

<?php
if ($_POST) {

    $fname = mysqli_real_escape_string($conn, $_POST['name']);
    $laname = mysqli_real_escape_string($conn, $_POST['laname']);
    $email = mysqli_real_escape_string($conn, $_POST['e-mail']);
    $contact = mysqli_real_escape_string($conn, $_POST['Contact']);
    $place = mysqli_real_escape_string($conn, $_POST['City']);
    $CardNUmber = (string)mysqli_real_escape_string($conn, $_POST['CardNumber']);
    $securityCode = (string)mysqli_real_escape_string($conn, $_POST['SecurityCode']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
    $places = explode(',', $place);

    $places= explode(',',$place);

    if ($password!=$password2) echo '<p class="error">Passwords are not equal </p>';
    else{
        mysqli_query($conn, "update users set Fname = '{$fname}', Lname = '{$laname}', Mail='{$email}', contact= '{$contact}', city = '{$places[0]}', accountNumber= '{$CardNUmber}',  password= '{$password}', securityCode = '{$securityCode}', country = '{$places[1]}' where U_ID= {$ID}");
        $_SESSION['f_name'] = $fname;
        $_SESSION['email'] = $laname;
        header('Location: MainUserPage.php');
    }

}

?>
<form action="" method="post">
    <div class="wrapper">
        <fieldset>
            <legend>Manage Your profile</legend>

            <div>
                <label for="name">First name</label>
                <input id="name" name="name" type="text" value="<?= $row['Fname'] ?>" autofocus required >

            </div>
            <div>
                <label for="laname">Last Name</label>
                <input id="laname" name="laname" type="text" value="<?= $row['Lname'] ?>" required placeholder="Hodžić">
            </div>
            <div>
                <label for="e-mail">E-mail</label>
                <input id="e-mail" name="e-mail" value="<?= $row['Mail'] ?>" type="email" required placeholder="name.lastname@mail.com">
            </div>
            <div>
                <label for="Contact">Contact number</label>
                <input id="Contact"  name="Contact"  value="<?= $row['contact'] ?>"type="tel" required placeholder="387-61-923-123" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}-[0-9]{3}">
            </div>
            <div>
                <label for="City" >City</label>
                <select id="City" name="City">
                    <option value="<?= $row['city']?>,<?= $row['country']?> ">Your city</option>
                    <option value="Sarajevo,BiH">Sarajevo</option>
                    <option value="Mostar,BiH">Mostar</option>
                    <option value="Tuzla,BiH">Tuzla</option>
                    <option value="Zagreb,Hrv">Zagreb</option>
                    <option value="Split,Hrv">Split</option>
                    <option value="Beograd,Srb">Beograd</option>
                    <option value="Niš,Srb">Niš</option>
                </select>
            </div>
            <div>
                <label for="Card number">Card number</label>
                <input id="Card number" type="tel" value="<?= $row['accountNumber'] ?>" name="CardNumber" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" required> <br>
                <label for="Security code">Security code</label>
                <input id="Security code" value="<?= $row['securityCode'] ?>" name="SecurityCode" type="tel" inputmode="numeric" pattern="[0-9]{3}" required>
            </div>

            <div>
                <label for="Password">Password</label>
                <input id="Password" value="<?= $row['password'] ?>"  type="password" name="password" placeholder="At least one lowercase, capital letter and number (more than 8 characters)" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required> <br>
                <label for="Confirmation">Re-type your password</label>
                <input id="Confirmation" value="<?= $row['password'] ?>"  name="password2" type="password" required>
            </div>

        </fieldset>
    </div>
    <button type="submit">Save changes</button>

</form>


</body>