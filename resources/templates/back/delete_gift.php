<?php require_once("../resources/config.php");



if(isset($_GET['delete_gift_id'])) {
    
    $query = query("DELETE FROM products WHERE product_id = " . escape_string($_GET['delete_gift_id']) . " ");
    confirm($query);
    
    
    set_message("Gift Deleted");
    redirect("index.php?gift");
    
    
    
    
} else {
    
    redirect("index.php?gift");
    
    
}





 ?>