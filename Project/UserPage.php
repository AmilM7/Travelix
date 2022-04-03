
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
    <title>UserPage</title>
    <link rel="stylesheet" href="Header/Header.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet" >
    <link rel="stylesheet" href="MainUserPage.css">
    <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<?php include 'Header/Header2.php';
if ($_POST) {

require ('Include/db.php');

$startDate = mysqli_real_escape_string($conn, $_POST['startDate']);
$endDate =  mysqli_real_escape_string($conn, $_POST['endDate']);
$startPrice = mysqli_real_escape_string($conn, $_POST['startPrice']);
$endPrice = mysqli_real_escape_string($conn, $_POST['endPrice']);
$city =  mysqli_real_escape_string($conn, $_POST['city']);
$event =  mysqli_real_escape_string($conn, $_POST['event']);
    $city1 = $_SESSION['city'];


    $queryArrangement = mysqli_query($conn, "select  a.priceOfTransport+a.priceOfEvent+a.priceOfFacility+a.profit as price,
      a.picture, a.Ar_ID, a.description, e.Name, e.time, e.available_tickets, t.endPlace, t.arrivalTime,t.departureTime, cf.name
      from arrangement a, transport t,
      catering_facilities cf, cities c, events e
      where  t.T_ID=a.transport and cf.CF_ID=a.catering_facility  and a.cities=c.City_ID and a.events=e.E_ID and t.startPlace='{$city1}' and
      LOWER(t.endPlace)=LOWER ('{$city}')  and e.type='{$event}' and 
      a.priceOfTransport+a.priceOfEvent+a.priceOfFacility+a.profit>'{$startPrice}' and a.priceOfTransport+a.priceOfEvent+a.priceOfFacility+a.profit<'{$endPrice}'
      and t.departureTime>'{$startDate}' and t.arrivalTime<'{$endDate}'
      and e.available_tickets>0 and a.isCanceled=0");
?>

<div class="WrapperTrending">

<?php
$i=0;
while ($row = mysqli_fetch_assoc($queryArrangement)):
if ($i%2==0):?>
<div class="contentRight">
    <img src="ArrangementPictures/<?= $row['picture']?>" alt="Currently picture is not available" class="rightPicture" >
    <div class="details">
        <h2><?= $row['Name']?></h2>
        <p>Price: <?= $row['price']?> €</p>
        <p>Place: <?= $row['endPlace']?></p>
        <p>Departure time: <?= $row['departureTime']?> </p>
        <p>Arrival time: <?= $row['arrivalTime']?> </p>
        <p>Available tickets: <?= $row['available_tickets']?> </p>
        <p><?= $row['description']?></p>
        <a href="More%20details.php?id=<?= $row['Ar_ID']; ?>" class="Href">More details</a>
    </div>
</div>
<?php else: ?>
<div class="contentLeft">
    <div class="details">
        <h2><?= $row['Name']?></h2>
        <p>Price: <?= $row['price']?> €</p>
        <p>Place: <?= $row['endPlace']?></p>
        <p>Departure time: <?= $row['departureTime']?> </p>
        <p>Arrival time: <?= $row['arrivalTime']?> </p>
        <p>Available tickets: <?= $row['available_tickets']?> </p>
        <p><?= $row['description']?></p>
        <a href="More%20details.php?id=<?= $row['Ar_ID']; ?>" class="Href">More details</a>
    </div>
    <img src="ArrangementPictures/<?= $row['picture']?>" alt="Currently picture is not available" class="rightPicture" >
</div>
<?php endif; ?>
<?php $i++;?>
<?php endwhile;
if($i==0) echo '<p class="Hello"> Sorry, but there are currently no events for You </p>';
}
else {
    echo '<p class="Hello"> Sorry, but you did not filter your events </p>';
}?>

</div>
</body>
</html>

