
<?php
require ('Include/isLoggedIn.php');
require ('Include/db.php');

$userID = $_SESSION['user_id'];


$queryArrangement = mysqli_query($conn, "select a.priceOfTransport+a.priceOfEvent+a.priceOfFacility+a.profit as price,
                                             a.picture,a.Ar_ID, a.description, e.Name, c.C_ID
                                             from users u, contracts c, arrangement a, events e, transport t
                                             where  u.U_ID = '{$userID}' and u.U_ID=c.user
                                             and c.arrangement=a.Ar_ID and e.E_ID=a.events
                                             and t.departureTime>CURDATE() and t.T_ID=a.transport");

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Header/Header.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet" >
    <title>Your events</title>
    <link href="Your%20events.css" rel="stylesheet">
</head>
<body>
<?php include 'Header/Header2.php'; ?>

<div class="mainDiv">
<?php
$i = 0;
while ($row = mysqli_fetch_assoc($queryArrangement)):?>
         <div class="details">
         <img src="ArrangementPictures/<?= $row['picture']?>" alt="Currently picture is not available" class="image" >
         <h2><?= $row['Name']?></h2>
         <p>Price: <?= $row['price']?> €</p>
         <p><?= $row['description']?></p>
         <a href="CancelEvent.php?cid=<?=$row['C_ID']?>" class="CancelNow">Cancel</a>
         </div>

<?php $i++;?>
<?php endwhile;
if($i==0) echo '<p class="Hello"> Sorry, but there are currently no booked events</p>';
?>
</div>
</body>
</html>
