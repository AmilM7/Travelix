<?php

require ('Include/isLoggedIn.php');
require ('Include/db.php');
$city = $_SESSION['city'];


$queryArrangement = mysqli_query($conn, "select  a.priceOfTransport+a.priceOfEvent+a.priceOfFacility+a.profit as price,
                                               a.picture,a.Ar_ID, a.description, a.trending, e.Name, e.time, e.available_tickets, t.endPlace, t.arrivalTime,t.departureTime, cf.name
                                               from arrangement a, transport t, 
                                               catering_facilities cf, cities c, events e
                                               where t.departureTime> CURDATE() and t.T_ID=a.transport and t.startPlace='{$city}'
                                               and cf.CF_ID=a.catering_facility  and a.cities=c.City_ID and a.events=e.E_ID and a.isCanceled=0
                                               and e.available_tickets>0 and a.trending=1");

$queryArrangement2 = mysqli_query($conn, "select  a.priceOfTransport+a.priceOfEvent+a.priceOfFacility+a.profit as price,
                                                a.picture,a.Ar_ID, a.description, a.trending, e.Name, e.time, e.available_tickets, t.endPlace, t.arrivalTime,t.departureTime, cf.name
                                                from arrangement a, transport t,
                                                catering_facilities cf, cities c, events e
                                                where t.departureTime> CURDATE() and t.T_ID=a.transport and t.startPlace='{$city}'
                                                and cf.CF_ID=a.catering_facility  and a.cities=c.City_ID and a.events=e.E_ID and a.isCanceled=0
                                                and e.available_tickets>0
                                                order by rand()
                                                LIMIT 4")    // Currently no enough knowledge to make real suggestion, so we use random
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MainUserPage</title>
    <link rel="stylesheet" href="Header/Header.css">
    <link rel="stylesheet" href="MainUserPage.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="loader.css">
</head>
<body>

<div class="preload">
    <img class="airplane" src="Slike/airplane.png">
    <h3 id="Loader">Loading...</h3>
    <img class ="cloud1" src="Slike/unnamed.png">
    <img class ="cloud2" src="Slike/unnamed.png">
    <img class ="cloud3" src="Slike/unnamed.png">
    <img class ="cloud3" src="Slike/unnamed.png">
</div>

<?php include 'Header/Header2.php';
if(mysqli_num_rows($queryArrangement)!=0): ?>
    <h3 class="Hello" id="animated_title">Hi  <?= $_SESSION['f_name']?>  !</h3>
    <h1>The hottest this month!</h1>

    <div class="WrapperTrending">
        <?php


        $i=0;
        while ($row = mysqli_fetch_assoc($queryArrangement)):
            if($row['trending']):     //Maybe later arrangements that are not in trending will be used, that is reason why we took all arrangements from query
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
            <?php endif; ?>
        <?php endwhile; ?>
    </div>



    <h1 class="wrapper+">Our suggestions for You!!</h1>
    <div class="WrapperTrending">
        <?php
        $i=0;
        while ($row = mysqli_fetch_assoc($queryArrangement2)):
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
        <?php endwhile;?>



    </div>
    <footer>
        <a href="FilterEvents.php" class="zadnjiHref">Filter events</a>
    </footer>

<?php else: ?>
    <p class="Hello"> Sorry, but there are currently no events for You </p>
<?php endif; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<script src="Animacija.js"></script>
<script src="app.js"></script>
</body>
</html>
