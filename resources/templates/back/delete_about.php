<?php require_once("../resources/config.php");



if(isset($_GET['delete_about_id'])) {
    
    $query = query("DELETE FROM about WHERE id = " . escape_string($_GET['delete_about_id']) . " ");
    confirm($query);
    
    
    set_message("About Data Deleted");
    redirect("index.php?hwm");
    
    
    
    
} else {
    
    redirect("index.php?hwm");
    
    
}


 ?>
