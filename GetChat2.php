<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>     
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="Style.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<?php
session_start();
include('Includes/connection.php');   

$email1 =  $_SESSION["Std"] ; 
$query3 = "SELECT * FROM studentreg where SEmail = '$email1' ";          
$run_query3 = mysqli_query($conn , $query3);
while($rd1 = mysqli_fetch_array($run_query3))
{                         
    $std_id = $rd1["Sid"];    
}        

$result = $conn->query("SELECT * FROM adminchat where Sid = $std_id");
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<div class='alert alert-dark' role='alert'> ";
            echo $row['Time'];
            echo "</div>
        
        ";
        echo "<div class='alert alert-danger' role='alert'> ";
        echo $row['Message'];
        echo "</div>
    
    ";
    }
}
?>    
</body>
</html>
