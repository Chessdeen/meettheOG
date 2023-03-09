<?php require_once("../resources/config.php");



if(isset($_GET['delete_timeline_id'])) {
    
    $query = query("DELETE FROM timeline WHERE id = " . escape_string($_GET['delete_timeline_id']) . " ");
    confirm($query);
    
    
    set_message("Timeline Deleted");
    redirect("index.php?admin_timeline");
    
    
    
    
} else {
    
    redirect("index.php?admin_timeline");
    
    
}





 ?>