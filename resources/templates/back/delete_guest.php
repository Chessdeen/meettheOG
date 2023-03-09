<?php require_once("../resources/config.php");



if(isset($_GET['delete_guest_id'])) {
    
    $query = query("DELETE FROM users WHERE user_id = " . escape_string($_GET['delete_guest_id']) . " ");
    confirm($query);
    
    
    set_message("User Deleted");
    redirect("index.php?guest");
    
    
    
    
} else {
    
    redirect("index.php?guest");
    
    
}





 ?>