<?php
$a=0;
if(isset($_POST['Name'])){
$server="localhost";
$username="root";
$password="";

$con= mysqli_connect($server,$username,$password);

if(!$con){
    die("Connection to this database failed due to".mysqli_connect_error());
    //echo"Success connecting to the db";
}
$Name=$_POST['Name'];
$State=$_POST['State'];
$City=$_POST['City'];
$Description=$_POST['Description'];
//$Link=$_GET['Link'];
$Link = isset($_GET['Link']) ? $_GET['Link'] : '';
$sql="INSERT INTO `form`.`form` (`Name`, `State`, `City`, `Description`, `Link`, `Date`) VALUES ('$Name', '$State', '$City', '$Description', '$Link', current_timestamp())";
if($con->query($sql) == true){
    //echo"Sucessfully recieved!";
$a=1;
}
else{
    echo"ERROR :$sql <br> $con->error";
}
$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form page</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <!-- <img class="bg" src="bg.jpg" alt="indian culture" srcset=""> -->
<div class="container">
<h1><b>Welcome to Culture and Heritage Drive !</b></h1>
<br>
<p class="para">Share your travelogues and experiences with us to participate</p><br>
<?php
if($a==1){
echo"<p class='submit'><b>Your response has been recorded. Thank you! </b></p>";
}
?>

<form action="index.php" method="post">
    <input type="text" name="Name" id="Name" placeholder="Enter your name">
    <input type="text" name="State" id="State" placeholder="Enter your state">
    <input type="text" name="City" id="City" placeholder="Enter your city">
    
    <textarea name="Description" id="Description" cols="100" rows="10" placeholder="Describe here"></textarea>
    <input type="url" name="link" id="link" placeholder="Enter Google Drive link of photo or video (optional) ">
    <br>
    
    <button class="btn">SUBMIT</button>


</form>

</div> 
<script src="index.js"></script>

</body>
</html>