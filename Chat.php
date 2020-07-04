<!DOCTYPE html>
<?php
session_start();
include('Includes/connection.php');   
include('Classes/StudentChatClass.php');
date_default_timezone_set("Asia/Karachi");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>24/7 Support</title>
    <!-- <link rel="stylesheet" href="style/Chat.css">   -->
    <link rel="stylesheet" href="style/Chat.css?v=<?php echo time(); ?>">      
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script
        src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
        crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script type="text.javascript" src="Jquery.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="Style.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.html">The Tutors Provider</a>
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>        
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <a href="index.php" class="btn btn-info">Back To Home</a>
          
        </div>
      </nav>
      <br />
<header>
<div class="main-header">
    
            <h1>Chat-24/7</h1>
            <hr/>
            <h3>Welcome to The Tutor's Provider Student Fascilitation Center</h3>
            <div class="container">
            <div class="row">            
                <div class="col">
                <p class="comments">Students Comments Starts Here</p>                    
                <div id="chat">
                </div>
                <div class="col">
                <p class="comments">Owner Comments Starts Here</p>
                <div id="chat2"></div>
                </div>                
            </div>
            </div>
            
               
            </div>
            
            <form action="" method="post" enctype="multipart/form-data">       
            
            <textarea name="Std_Chat" cols="30" rows="10" placeholder="Type your message Here..!" required></textarea>
            <input type="submit" class="btn btn-primary butt" name="ChatSend" id="" value="Send">               
            <form>
            <br />
            <?php
            if(isset($_POST['ChatSend'])){
                if(isset($_GET["sid"]))
                {
                    $Student_id = $_GET["sid"];     
                    $chat = new Chat();
                    $chat->Message =  $_POST['Std_Chat']; 
                    $now = new DateTime();
                    $chat->Time = $now->format('Y-m-d H:i:s');
                    $chat->Sid =  $Student_id;
                    $chat->InsertChat($chat);
                }
            }
            ?>            
        </div>
        </header>
        <script type="text/javascript">
                $(document).ready(function(){                   
                    setInterval(function(){
                        $('#chat').load('GetChat.php')
                    }, 0);                    
                });                            
            </script>  
            <script type="text/javascript">
                $(document).ready(function(){                   
                    setInterval(function(){
                        $('#chat2').load('GetChat2.php')
                    }, 0);                    
                });                            
            </script>        
</body>
</html>