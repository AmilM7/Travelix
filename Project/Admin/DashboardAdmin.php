<?php
require ('../Include/isLoggedInAdmin.php');
require ('../Include/db.php');



$query = mysqli_query($conn, "select k.arrangementID, (profit*qty) as totalProfit, k.Name, k.available_tickets,
                                     k.place, k.time, k.country, k.contact, k.type, k.namecf,k.trType, k.arrivalTime,
                                     k.departureTime, k.company, k.picture, k.startPlace, k.endPlace
                                     from ( select a.Ar_ID arrangementID, a.profit, count(c.arrangement) qty, a.picture, e.Name,
                                     e.available_tickets, e.place, e.time, cf.name as namecf, cf.type, cf.country, cf.contact,
                                     t.type as trType, t.arrivalTime, t.departureTime, t.company, t.startPlace, t.endPlace
                                     from contracts c right join  arrangement a on a.Ar_ID = c.arrangement, events e,
                                     catering_facilities cf, transport t
                                     where e.E_ID=a.events and cf.CF_ID= a.catering_facility and t.T_ID=a.transport
                                     group by a.Ar_ID
                                     order by count(c.arrangement) desc) k order by totalProfit desc;");


$transportQuery = mysqli_query($conn, "select *, count(a.Ar_ID) as num
                                             from transport t, arrangement a
                                             where t.T_ID=a.transport and t.departureTime>CURDATE()
                                             group by t.T_ID;");


$transportQuery2 = mysqli_query($conn, "select t.*, count(a.Ar_ID) as num
                                              from transport t left join arrangement a
                                              on t.T_ID=a.transport where t.departureTime>CURDATE()
                                              group by T_ID
                                              having count(a.Ar_ID) <1;");


$eventQuery = mysqli_query($conn, "select e.E_ID, e.Name, e.type, e.place, e.address, e.type, e.time
                                         from events e, arrangement ar
                                         where e.E_ID=ar.events
                                         order by type;");

$eventQuery2 = mysqli_query($conn, "select  e.*, count(a.Ar_ID) as num
                                          from events e left join arrangement a
                                          on e.E_ID=a.events
                                          group by E_ID
                                          having count(a.Ar_ID) <1;");

$cateringFacilityQuery = mysqli_query($conn, "select distinct *
                                                    from catering_facilities cf                
                                                    order by cf.country, cf.type;");


$activityBeograd = mysqli_query($conn, "select ac.name, ac.A_ID
                                              from cities c, rec_activities rc, activity ac
                                              where  c.City_ID=rc.Cities and rc.Activity=ac.A_ID and c.name='Beograd';");

$activityZagreb = mysqli_query($conn, "select ac.name, ac.A_ID
                                             from cities c, rec_activities rc, activity ac
                                             where  c.City_ID=rc.Cities and rc.Activity=ac.A_ID and c.name='Zagreb';");


 ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Header/Header.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">
    <title>AdminDashboard</title>
    <link rel="stylesheet" href="DashboardAdmin.css">
</head>
<body>
<?php
include '../Header/HeaderAdmin.php';
?>

<div class="anchors">
    <a href="#CF" >All catering facilities</a>
    <a href="#EV" >All events</a>
    <a href="#TR" >All transport types</a>
    <a href="#Activity">Activity</a>
</div>

<h1>All arrangement sorted by total profit</h1>


<?php
while ($row = mysqli_fetch_assoc($query)): ?>
<div class="Main">
    <img src="../ArrangementPictures/<?=$row['picture']?>" alt="Currently not available" class="Slika">
    <div class="details">
        <h2><?= $row['Name']?></h2>
        <p>Total profit: <?= $row['totalProfit']?>€ </p>
        <p> Available tickets: <?= $row['available_tickets']?> </p>
        <p> Time of the event: <?= $row['time']?></p>
        <p> Start place: <?= $row['startPlace']?> </p>
        <p> End place: <?= $row['endPlace']?> </p>
        <p> Place of the event: <?= $row['place']?> </p>
        <p> Name of catering facility: <?= $row['namecf']?> </p>
        <p> Type: <?= $row['type']?> </p>
        <p> Type of transport: <?= $row['trType']?> </p>
        <p> Transport company: <?= $row['company']?> </p>
        <p> Departure time: <?= $row['departureTime']?> </p>
        <p> Arrival time: <?= $row['arrivalTime']?> </p>
        <a href="ModifyArrangement.php?id=<?= $row['arrangementID']?>" class="Href">Modify arrangement </a>
    </div>
</div>

<?php endwhile; ?>

<h1 id="TR">All transport services with arrangements</h1>


<div class="Transports">
<?php
while ($row= mysqli_fetch_assoc($transportQuery)): ?>
    <div class="details TransportDetails">
        <p> Start place: <?= $row['startPlace']?> </p>
        <p> End place: <?= $row['endPlace']?> </p>
        <p> Transport ID: <?= $row['T_ID']?> </p>
        <p> Type: <?= $row['type']?> </p>
        <p> Transport company: <?= $row['company']?> </p>
        <p> Departure time: <?= $row['departureTime']?> </p>
        <p> Arrival time: <?= $row['arrivalTime']?> </p>
        <p> Number of arrangement with this transport: <?= $row['num']?> </p>
        <a href="ModifyTransport.php?id=<?= $row['T_ID']?>" class="Href">Modify transport services </a>
    </div>
<?php endwhile; ?>
</div>


<h1>All transport services with no arrangements</h1>
   <div class="Transports">
       <?php
       while ($row= mysqli_fetch_assoc($transportQuery2)): ?>
       <div class="details TransportDetails">
           <p> Start place: <?= $row['startPlace']?> </p>
           <p> End place: <?= $row['endPlace']?> </p>
           <p> Transport ID: <?= $row['T_ID']?> </p>
           <p> Type: <?= $row['type']?> </p>
           <p> Transport company: <?= $row['company']?> </p>
           <p> Departure time: <?= $row['departureTime']?> </p>
           <p> Arrival time: <?= $row['arrivalTime']?> </p>
           <p> Number of arrangement with this transport: <?= $row['num']?> </p>
           <a href="ModifyTransport.php?id=<?= $row['T_ID']?>" class="Href">Modify transport services </a>
       </div>
       <?php endwhile; ?>
   </div>



<h1 id="EV">All events with arrangement</h1>
<div class="Transports">

    <?php
    while ($row= mysqli_fetch_assoc($eventQuery)): ?>
        <div class="details EventDetails">
            <p> Name: <?= $row['Name']?> </p>
            <p> Type: <?= $row['type']?> </p>
            <p> Event ID: <?= $row['E_ID']?> </p>
            <p> Place: <?= $row['place']?> </p>
            <p> Time: <?= $row['time']?> </p>
            <?php if ($row['address']!=null):?>
            <p> Adress: <?= $row['address']?> </p>
            <?php endif;?>
            <a href="ModifyEvent.php?id=<?= $row['E_ID']?> " class="Href">Modify events</a>
        </div>
    <?php endwhile; ?>

</div>

<h1 id="EV">All events with no arrangement</h1>
<div class="Transports">

    <?php
    while ($row= mysqli_fetch_assoc($eventQuery2)): ?>
        <div class="details EventDetails">
            <p> Name: <?= $row['Name']?> </p>
            <p> Type: <?= $row['type']?> </p>
            <p> Event ID: <?= $row['E_ID']?> </p>
            <p> Place: <?= $row['place']?> </p>
            <p> Time: <?= $row['time']?> </p>
            <?php if ($row['address']!=null):?>
                <p> Adress: <?= $row['address']?> </p>
            <?php endif;?>
            <a href="ModifyEvent.php?id=<?= $row['E_ID']?> " class="Href">Modify events</a>
        </div>
    <?php endwhile; ?>

</div>

<h1 id="CF">All catering facilities</h1>

<div class="Transports">

    <?php
    while ($row= mysqli_fetch_assoc($cateringFacilityQuery)): ?>
        <div class="details EventDetails">
            <p> Name: <?= $row['name']?> </p>
            <p> Type: <?= $row['type']?> </p>
            <p> ID: <?= $row['CF_ID']?> </p>
            <p> Contact: <?= $row['contact']?> </p>
            <p> Address: <?= $row['address']?> </p>
            <a href="ModifyCF.php?id=<?= $row['CF_ID']?>" class="Href">Modify catering facility</a>
        </div>
    <?php endwhile; ?>

</div>


<div class="Activities">
    <h3 id="Activity">Activities for Belgrade:</h3>
    <ol>
    <?php
    while ($row= mysqli_fetch_assoc($activityBeograd)): ?>
            <li> Name: <?= $row['name']?> </li>
           <a href="deleteActivity.php?id=<?= $row['A_ID']?>" class="deleteActivity">Delete activity</a>
    <?php endwhile; ?>
        <br>

        <a href="AddActivity.php?id=2" class="ZadnjiHref">Add Activity for Beograd</a>
    </ol>
</div>

<div class="Activities">
    <h3 id="Activity">Activities for Zagreb:</h3>
    <ol>
        <?php
        while ($row= mysqli_fetch_assoc($activityZagreb)): ?>
            <li> Name: <?= $row['name']?> </li>
             <a href="deleteActivity.php?id=<?= $row['A_ID']?>" class="deleteActivity">Delete activity</a>
        <?php endwhile; ?>
        <br>
        <a  href="AddActivity.php?id=1" class="ZadnjiHref">Add Activity for Zagreb</a>
    </ol>
</div>


<!--Currently we work only with two citites, there is no option to add event for another city.-->


</body>
</html>
