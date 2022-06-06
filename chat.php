<?php 
$messages="SELECT * FROM messages order by message_id";
$messagesquery=mysqli_query($connect, $messages);
?>
<div class='driver_roster'>
        <h2>Chat</h2>
        <div class="chat">
			
          <div class="chat-history">
          <?php  
            while ($takemessage=mysqli_fetch_assoc($messagesquery)) {
              $user_id = $takemessage['user_id'];
              $user = "SELECT * FROM users WHERE userid = $user_id ";
              $quey_user=mysqli_query($connect, $user);
              $take_user=mysqli_fetch_array($quey_user);?>
              <div class="chat-message clearfix">
                
                <img src="<?php echo $take_user['user_avatar']; ?>" alt="" width="32" height="32">
      
                <div class="chat-message-content clearfix">
                  
                  <span class="chat-time"><?php echo $takemessage['mDate']; ?></span>
      
                  <h5><?php echo $take_user['user_name']; ?></h5>
      
                  <p><?php echo $takemessage['content']; ?></p>
      
                </div> <!-- end chat-message-content -->
      
              </div>
      
              <hr>
                <?php
            }
            ?>
          </div> <!-- end chat-history -->
    
          <form action="process.php" method="post">
    
            <fieldset>
              
              <input type="text" name="content" placeholder="Text your message" autofocus>
              <input type="hidden" name="user_name" value="<?php echo $_SESSION["user_name"]; ?>">
              <input class="msg_btn" type="submit" name="send_message" value="Send">
    
            </fieldset>
    
          </form>
    
        </div>
      </div>