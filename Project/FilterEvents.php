
<?php
require ('Include/isLoggedIn.php');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Filter</title>
    <link rel="stylesheet" href="FormsSignUp.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500;700&family=Orelega+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Header/Header.css">
</head>
<body>
<?php include 'Header/Header2.php';?>

<form action="UserPage.php" method="post">
    <div class="wrapper">
        <fieldset>
            <div>
                <label for="startDate">Check-in</label>
                <input id="startDate" name="startDate"  type="date" required>
                <label for="endDate">Check-out</label>
                <input id="endDate" name="endDate"  type="date" required>
            </div>
            <div>
                <label for="event" >Type of event</label>
                <select id="event" name="event">
                    <option value="Concert">Concert</option>
                    <option value="Football Game">Football Game</option>
                    <option value="Basketball Game">Basketball Game</option>
                </select>
            </div>
            <div>
                <input id="DOB" name="startPrice" type="number" placeholder="Starting price" required>
                <input id="DOB" name="endPrice" type="number" placeholder="Ending price" required>
            </div>
            <div>
                <input id="city" name="city"  type="text" placeholder="Desired city" required>
            </div>

        </fieldset>
    </div>
    <button type="submit">Submit</button>
</form>

</body>
</html>
