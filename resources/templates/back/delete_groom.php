<?php require_once("../resources/config.php");



if(isset($_GET['delete_groom_id'])) {
    
    $query = query("DELETE FROM groom WHERE id = " . escape_string($_GET['delete_groom_id']) . " ");
    confirm($query);
    
    
    set_message("Groom Data Deleted");
    redirect("index.php?hwm");
    
    
    
    
} else {
    
    redirect("index.php?hwm");
    
    
}


 ?>
