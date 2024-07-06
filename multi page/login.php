<?php
$conn=mysqli_connect("localhost","root","","test");
if($conn){
    echo"connected";

}else{
    echo"failed";

}
$username = $_POST['fusername'];
$password = $_POST['fpassword'];

$data = "INSERT INTO lg VALUES('$username','$password')";
$check = mysqli_query($conn,$data);
if($check){
    echo "data sended";

}else {
    echo "data not send";
}
?>