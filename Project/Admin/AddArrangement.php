<?php
require ('../Include/isLoggedInAdmin.php');
require ('../Include/db.php');
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
    <title>Add</title>
    <link rel="stylesheet" href="../FormsSignUp.css">
</head>
<body>
<?php
include '../Header/HeaderAdmin.php';

if ($_POST) {

    $event = $_POST['event'];
    $CF = $_POST['CF'];
    $transport = $_POST['Transport'];
    $city= $_POST['city'];
    $transportPrice = $_POST['priceOfTransport'];
    $facilityPrice = $_POST['priceOfFacility'];
    $eventPrice = $_POST ['priceOfEvent'];
    $profit = $_POST ['profit'];
    $trending = $_POST ['trending'];
    $description = $_POST ['description'];
    $imageName = '';

    if (isset($_FILES['image']) && $_FILES['image']) {
        $imageName = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],'../ArrangementPictures/'. $imageName);
    }


    mysqli_query($conn, "insert into arrangement 
                               (events,catering_facility,transport,cities,priceOfFacility,priceOfTransport,
                                priceOfEvent,profit,description,picture,trending)
                                values ('{$event}','{$CF}','{$transport}','{$city}','{$facilityPrice}',
                                        '{$transportPrice}','{$eventPrice}','{$profit}','{$description}',
                                        '{$imageName}','{$trending}')" );

    header('Location: DashboardAdmin.php');
}


?>



<form action="" method="post" enctype="multipart/form-data" >
    <div class="wrapper">
        <fieldset>
            <legend>Add arrangement</legend>

            <div>
                <label for="event">Event ID</label>
                <input id="event" name="event" type="number"  required>
            </div>
            <div>
                <label for="CF">Catering Facility ID</label>
                <input id="CF" name="CF" type="number" required>
            </div>
            <div>
                <label for="Transport">Transport</label>
                <input id="Transport" name="Transport" type="number" required >
            </div>
                <label for="city">Cities</label>
                <select id="city" name="city">
                    <option value="1">Zagreb</option>
                    <option value="2">Beograd</option>
                </select>
            <div>
                <div>
                <label for="priceOfFacility">Price of facility</label>
                <input id="priceOfFacility"  type="number" name="priceOfFacility"  required>
            </div>
            <div>
                <label for="priceOfEvent">Price of event</label>
                <input id="priceOfEvent"  type="number" name="priceOfEvent"  required>
            </div>
            <div>
                <label for="priceOfTransport">Price of transport</label>
                <input id="priceOfTransport"  type="number" name="priceOfTransport" required>
            </div>
                <div>
                    <label for="profit">Profit</label>
                    <input id="profit"  type="number" name="profit" required>
                </div>

            <div>
                <label for="description">Description</label>
                <input id="description"  type="text" name="description" required>
            </div>

            <div>
                <label for="trending">Trending</label>
                <input id="trending"  type="text" name="trending" required>
            </div>

                <div>
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" required>
                </div>


            <button type="submit">Submit</button>

</form>

</body>
</html>
