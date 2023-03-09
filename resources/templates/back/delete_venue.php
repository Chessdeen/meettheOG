<?php require_once("../resources/config.php");



if(isset($_GET['delete_venue_id'])) {
    
    $query = query("DELETE FROM wedding_venue WHERE id = " . escape_string($_GET['delete_venue_id']) . " ");
    confirm($query);
    
    
    set_message("Wedding Venue Deleted");
    redirect("index.php?data");
    
    
    
    
} else {
    
    redirect("index.php?data");
    
    
}


 ?>
