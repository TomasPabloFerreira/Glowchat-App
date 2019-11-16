<?php
include('header.php');
if ( isset ($_POST['Password_change'])) {    

    $oldpassword = $_POST["Old_password"];

    $newpassword = $_POST["New_password"];

    $newpasswordrepeat = $_POST["New_password_repeat"];

    $servername = "localhost";
    $username = "poli_uno";
    $password = "poli1";
    $database = "poli_trece";
    $mysqli = new mysqli ($servername,$username,$password, $database);

    if ($mysqli->connect_errno) {
        printf("Conexión fallida: %s\n", $mysqli->connect_error);
        exit();
    }
} else {
    header("location: index.php");
}
?>

</body>
</html>