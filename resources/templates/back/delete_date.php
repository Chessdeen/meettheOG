<?php require_once("../resources/config.php");



if(isset($_GET['delete_date_id'])) {
    
    $query = query("DELETE FROM wedding_date WHERE id = " . escape_string($_GET['delete_date_id']) . " ");
    confirm($query);
    
    
    set_message("Wedding Date Deleted");
    redirect("index.php?data");
    
    
    
    
} else {
    
    redirect("index.php?data");
    
    
}


 ?>
