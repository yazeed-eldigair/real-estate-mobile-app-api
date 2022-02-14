
<?php
include('db.php');

$UserEmail = $decodedData['Email'];
$UserPW = md5($decodedData['Password']);

$SQL = "SELECT * FROM login WHERE UserEmail = '$UserEmail'";
$exeSQL = mysqli_query($conn, $SQL);
$checkEmail =  mysqli_num_rows($exeSQL);

if ($checkEmail != 0) {
    $arrayu = mysqli_fetch_array($exeSQL);
    if ($arrayu['UserPw'] != $UserPW) {
        $Message = "Wrong password. Please try again.";
    } else {
        $Message = "Success";
    }
} else {
    $Message = "Account does not exist";
}

$response[] = array("Message" => $Message);
echo json_encode($response);