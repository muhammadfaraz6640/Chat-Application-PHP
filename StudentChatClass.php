<?php

class Chat{
    
    public $Cid;
    public $Message;    
    public $Sid;    
    public $Time;    
    public function InsertChat(Chat $chat){
        include('Includes/connection.php');                          
        $query_insert_chat = "INSERT INTO chat (Message,Sid,Time) VALUES('$chat->Message' , '$chat->Sid' , '$chat->Time')";                    
        $is_inserted_chat = mysqli_query($conn,$query_insert_chat);        
        // if($is_inserted_chat)
        // {
        //     echo "<script>alert('Chat Inserted Successfully')</script>";            
        // }
        // else{
        //     echo "<script>alert('fill all fields Correctly')</script>";
        // }               
    }
    public function GetAllChat(Chat $chat){
        include('Includes/connection.php');                          
        $query_get_chat = "SELECT * FROM studentreg";                    
        $is_get_chat = mysqli_query($conn,$query_get_chat);                
        while($rd1 = mysqli_fetch_array($is_get_chat))
        {                         
            $std_id = $rd1["Sid"];    
            $name = $rd1["SName"];    

            echo " <div class='card'>                    
            <div class='card-body'>
              <h5 class='card-title'>$name</h5>            
            </div>
            <div class='card-footer'>                                     
            <a href='AdminChat.php?sid=$std_id' class='btn btn-info'>Chat</a><br /><br />                       
          </div>
          </div> ";
        }            
    }
    public function InsertAdminChat(Chat $chat){
        include('Includes/connection.php');                          
        $query_insert_chat_admin = "INSERT INTO adminchat (Message,Sid,Time) VALUES('$chat->Message' , '$chat->Sid' , '$chat->Time')";                    
        $is_inserted_chat_admin = mysqli_query($conn,$query_insert_chat_admin);              
    }
    
}

?>