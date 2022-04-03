<?php
require ('../Include/isLoggedInAdmin.php');
require ('../Include/db.php');

$query = mysqli_query($conn, "select  sum(a.profit) as profit
                                    from contracts c, arrangement a
                                    where  a.Ar_ID=c.arrangement and c.Date>CURDATE() - interval 1 month ");
 $row = mysqli_fetch_assoc($query);

$query2 = mysqli_query($conn, "select  sum(a.profit) as profit
                                    from contracts c, arrangement a
                                    where  a.Ar_ID=c.arrangement and c.Date>CURDATE() - interval 1 year ");
$row2 = mysqli_fetch_assoc($query2);

$query3 = mysqli_query($conn, "select count(c.C_ID) as numberOfContracts
                                     from users u, contracts c
                                     where u.U_ID=c.user and c.Date>CURDATE() - interval 1 month; ");
$row3 = mysqli_fetch_assoc($query3);

$query4 = mysqli_query($conn, "select count(c.C_ID) as numberOfContracts
                                     from users u, contracts c
                                     where u.U_ID=c.user and c.Date>CURDATE() - interval 1 year; ");
$row4 = mysqli_fetch_assoc($query4);

$query5 = mysqli_query($conn, "select count(breakfast) as number
                                     from catering_facilities
                                     where breakfast=1 and type='Hotel' ");
$row5 = mysqli_fetch_assoc($query5);

$query6 = mysqli_query($conn, "select count(trending) as number
                                     from arrangement
                                      where trending=1 and priceOfEvent+priceOfFacility+priceOfTransport+profit>200;");
$row6 = mysqli_fetch_assoc($query6);

$query7 = mysqli_query($conn, "select sum(available_tickets) as suma, type
                                     from events e, arrangement a
                                     where e.E_ID=a.events
                                     group by type
                                     having suma>50;");

$query8 = mysqli_query($conn, "select count(distinct type) as number
                                     from transport
                                     where startPlace='Sarajevo'");
$row8 = mysqli_fetch_assoc($query8);

$query9 = mysqli_query($conn, "select  count(distinct u.U_ID) as number
                                     from users u, contracts c
                                     where u.U_ID=c.user and c.Date>CURDATE() - interval 6 month");
$row9 = mysqli_fetch_assoc($query9);

$query10 = mysqli_query($conn, "select e.type, count(distinct ar.Ar_ID) as number 
                                      from arrangement ar, catering_facilities cf , events e, contracts c
                                      where ar.events=e.E_ID and ar.catering_facility=cf.CF_ID and
                                      ar.Ar_ID=c.arrangement and cf.type!='Hotel' and c.Date> CURDATE() - interval 10 month
                                      group by e.type");

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
    <title>Statistics</title>
    <link rel="stylesheet" href="Statistics.css">
</head>
<body>
<?php
include '../Header/HeaderAdmin.php';
?>

<p>Amount of profit in last month:  <?= $row['profit']?>€</p>
<p>Amount of profit in last year:  <?= $row2['profit']?>€</p>
<p>Number of contracts in last month:  <?= $row3['numberOfContracts']?> </p>
<p>Number of contracts in last year:  <?= $row4['numberOfContracts']?> </p>
<p>Number of hotels with breakfast:  <?= $row5['number']?> </p>
<p>Number of trending events with price higher than 200€:  <?= $row6['number']?> </p>
<p>Sum of all available tickets for every type in arrangements:</p>
<ol>
<?php
   while ($row7 = mysqli_fetch_assoc($query7)) {
       echo '<li class="Posebni"> Number of available tickets for '. $row7['type'] .  's: ' . $row7['suma'] . '</li>';
   }
?>
</ol>
<p>Number of transport types from Sarajevo: <?= $row8['number']?> </p>
<p>Number of users with booked arrangement within last six month: <?= $row9['number']?> </p>
<p>Number of arrangements by event type, whose accommodation is not hotel, within last 10 months:</p>
<ol>
<?php
while ($row10 = mysqli_fetch_assoc($query10)) {
    echo '<li class="Posebni"> Number of arrangements for '. $row10['type'] .  's: ' . $row10['number'] . '</li>';
}
?>
</ol>
<p></p>
</body>
</html>
