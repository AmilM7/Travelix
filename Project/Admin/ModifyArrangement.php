<?php
require ('../Include/isLoggedInAdmin.php');
require ('../Include/db.php');


$id = $_GET['id'];

$query = mysqli_query($conn, "select *
                                    from arrangement
                                    where Ar_ID='{$id}' ");

$row = mysqli_fetch_assoc($query);
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
    <title>Modifications</title>
    <link rel="stylesheet" href="../FormsSignUp.css">
</head>
<body>
<?php
include '../Header/HeaderAdmin.php';

if ($_POST) {

    $event = $_POST['event'];
    $CF = $_POST['CF'];
    $transport = $_POST['Transport'];
    $transportPrice = $_POST['priceOfTransport'];
    $facilityPrice = $_POST['priceOfFacility'];
    $eventPrice = $_POST ['priceOfEvent'];
    $profit = $_POST ['profit'];
    $canceled = $_POST ['cancel'];
    $trending = $_POST ['trending'];
    $imageName = '';



    if (isset($_FILES['image']) && $_FILES['image']) {
        $imageName = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],'../ArrangementPictures/'. $imageName);
    }

    if($imageName!=null) {
        echo 'jesi unio';
        $row = mysqli_query($conn, "update arrangement set events = '{$event}', catering_facility = '{$CF}', transport='{$transport}', 
                                          priceOfTransport= '{$transportPrice}', priceOfFacility = '{$facilityPrice}', priceOfEvent= '{$eventPrice}',
                                          profit= '{$profit}', picture = '{$imageName}', trending = '{$trending}',
                                          isCanceled='{$canceled}'
                                          where Ar_ID = '{$id}'");

    }
    if($imageName==null) {
        echo 'nisi unio';
        $row = mysqli_query($conn, "update arrangement set events = '{$event}', catering_facility = '{$CF}', transport='{$transport}', 
                                          priceOfTransport= '{$transportPrice}', priceOfFacility = '{$facilityPrice}', priceOfEvent= '{$eventPrice}',
                                         profit= '{$profit}', isCanceled='{$canceled}', trending = '{$trending}'
                                          where Ar_ID ='{$id}' ");

    }

        header('Location: DashboardAdmin.php');

}


?>



<form action="" method="post" enctype="multipart/form-data">
    <div class="wrapper">
        <fieldset>
            <legend>Modify Arrangement</legend>

            <div>
                <label for="event">Event ID</label>
                <input id="event" name="event" type="number"  value="<?= $row['events'] ?? '' ?>">

            </div>
            <div>
                <label for="CF">Catering Facility ID</label>
                <input id="CF" name="CF" type="number" value="<?= $row['catering_facility'] ?? '' ?>">
            </div>
            <div>
                <label for="Transport">Transport</label>
                <input id="Transport" name="Transport" value="<?= $row['transport'] ?? '' ?>" type="number">
            </div>
            <div>
                <label for="priceOfTransport">Price of transport</label>
                <input id="priceOfTransport"  type="number" name="priceOfTransport"  value="<?= $row['priceOfTransport'] ?? '' ?>">
            </div>
            <div>
                <label for="priceOfFacility">Price of facility</label>
                <input id="priceOfFacility"  type="number" name="priceOfFacility"  value="<?= $row['priceOfFacility'] ?? '' ?>">
            </div>
            <div>
                <label for="priceOfEvent">Price of event</label>
                <input id="priceOfEvent"  type="number" name="priceOfEvent"  value="<?= $row['priceOfEvent'] ?? '' ?>">
            </div>

            <label for="trending">Trending:</label>
            <select id="trending" name="trending" required>
                <option value=""></option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>



            <div>
                <label for="profit">Profit</label>
                <input id="profit"  type="number" name="profit"  value="<?= $row['profit'] ?? '' ?>">
            </div>

            <label for="cancel">Canceled</label>
            <select id="cancel" name="cancel">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>

            <div>
                <label for="image">Image</label>
                <input type="file" name="image" id="image">
            </div>

    <button type="submit">Submit</button>

</form>

</body>
</html>
