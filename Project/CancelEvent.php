<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_GET['cid'] == null) {
    header('Location: FormLogIn.php');
    exit();
}

require ('Include/db.php');
$contractId = $_GET['cid'];
$query = mysqli_query($conn, "select arrangement
                                    from contracts
                                    where C_ID = '{$contractId}'"); /*firstly we find where is that stored*/

$row = mysqli_fetch_assoc($query);
$arrangementID = $row['arrangement'];
$query1 = mysqli_query($conn, "select ev.E_ID
                                    from arrangement ar, events ev
                                    where ar.events=ev.E_ID and ar.Ar_ID='{$arrangementID}';  "); /*we have to find event that is related with arrangement, so we can increase number of available tickets*/

$row1 = mysqli_fetch_assoc($query1);
$eventID = $row1['E_ID'];
mysqli_query($conn, "update events set available_tickets = available_tickets+1
                            where E_ID = '{$eventID}'");

mysqli_query($conn, "delete from contracts where C_ID = '{$contractId}'");
header('Location: MainUserPage.php');
exit();

?>

