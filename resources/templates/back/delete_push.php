<?php require_once("../resources/config.php");



if(isset($_GET['delete_push_id'])) {
    
    $query = query("DELETE FROM push WHERE id = " . escape_string($_GET['delete_push_id']) . " ");
    confirm($query);
    
    
    set_message("Push Notification Deleted");
    redirect("index.php?push_notification");
    
    
    
    
} else {
    
    redirect("index.php?push_notification");
    
    
}





 ?>
