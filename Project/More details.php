<?php


require ('Include/isLoggedIn.php');
require ('Include/db.php');

if ($_GET['id']){
$id = $_GET['id'];


$yourArrangement = mysqli_query($conn, "select  a.priceOfTransport+a.priceOfEvent+a.priceOfFacility+a.profit as price,
                        a.picture, a.Ar_ID, a.description, e.Name, e.time,e.E_ID, e.available_tickets, t.endPlace, t.arrivalTime,t.departureTime, cf.name,
                        cf.breakfast, cf.contact,  cf.type as cftype, cf.address, t.type, t.company
                        from arrangement a, transport t,
                        catering_facilities cf, cities c, events e
                        where   a.Ar_ID = '{$id}' and t.T_ID=a.transport and cf.CF_ID=a.catering_facility  
                        and a.cities=c.City_ID and a.events=e.E_ID;
   ");
$row = mysqli_fetch_assoc($yourArrangement);


$queryActivity = mysqli_query($conn, "select   ac.name, ac.description
                                            from arrangement a, cities c, activity ac, rec_activities ra
                                            where   a.Ar_ID = '{$id}' and a.cities = c.City_ID and c.City_ID=ra.Cities and ra.Activity=ac.A_ID ");



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>More details</title>
    <link rel="stylesheet" href="Header/Header.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet" >
    <link href="MoreDetails.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<?php
include 'Header/Header2.php';
?>

<h1><?= $row['Name']?></h1>

<div class="mainDiv">

<img class="image" src="ArrangementPictures/<?= $row['picture']?>">
    <div class="innerDiv">
    <p> Departure time: <?= $row['departureTime']?></p>
    <p> Arrival time: <?= $row['arrivalTime']?></p>
    <p> Price: <?= $row['price']?>€</p>
    <p> Available tickets: <?= $row['available_tickets']?></p>
    <p> Departure time: <?= $row['endPlace']?></p>
    <p> Transport-type: <?= $row['type']?></p>
    <p> Catering facility name: <?= $row['name']?></p>
    <p> Catering facility type: <?= $row['cftype']?></p>
    <p> Address: <?= $row['address']?></p>
    <h4> Additional activities:</h4>
        <ol>
        <?php
        while ($row1 = mysqli_fetch_assoc($queryActivity)):
        ?>
            <li><?= $row1['name']?> </li>
            <p>-<?= $row1['description']?> </p>
        <?php
        endwhile;
        ?>
        </ol>
    </div>

</div>
<div class="forA">
<a href="BookedPage.php?id1=<?=$id?>&idEvent=<?=$row['E_ID']?>" class="BuyNow">Buy now</a>
</div>




<?php
}
?>
</body>
</html>
