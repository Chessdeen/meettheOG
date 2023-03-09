<?php require_once("../resources/config.php");



if(isset($_GET['delete_bride_id'])) {
    
    $query = query("DELETE FROM bride WHERE id = " . escape_string($_GET['delete_bride_id']) . " ");
    confirm($query);
    
    
    set_message("Bride Data Deleted");
    redirect("index.php?hwm");
    
    
    
    
} else {
    
    redirect("index.php?hwm");
    
    
}


 ?>
