<!-- Configuration-->
<?php require_once("../resources/config.php"); ?>

<!-- Header-->
<?php include(TEMPLATE_BACK .  "/header.php");?>

<?php


if(!isset($_SESSION['email'])) {
    
    redirect("../login");
    
}


?>

<?php 
                
                
    if($_SERVER['REQUEST_URI'] == "/admin/"  || $_SERVER['REQUEST_URI'] == "/admin/index.php") {
        
        include(TEMPLATE_BACK . "/dashboard.php");
        
    }
    
    if(isset($_GET['guest'])) {
        include(TEMPLATE_BACK . "/guest.php");
        
        
    }
    if(isset($_GET['add_guest'])) {
        include(TEMPLATE_BACK . "/add_guest.php");
        
        
        
    }
    if(isset($_GET['edit_guest'])) {
        include(TEMPLATE_BACK . "/edit_guest.php");
        
        
        
    }
    if(isset($_GET['delete_guest_id'])) {
        include(TEMPLATE_BACK . "/delete_guest.php");
        
        
        
    }
    if(isset($_GET['push_notification'])) {
                    include(TEMPLATE_BACK . "/push_notification.php");
                    
                    
                    
    }
    if(isset($_GET['delete_push_id'])) {
        include(TEMPLATE_BACK . "/delete_push.php");
        
        
        
    }
    if(isset($_GET['hwm'])) {
        include(TEMPLATE_BACK . "/hwm.php");
        
        
    }
    if(isset($_GET['gift'])) {
        include(TEMPLATE_BACK . "/gift.php");
        
        
    }
    if(isset($_GET['add_gift'])) {
         
        include(TEMPLATE_BACK . "/add_gift.php");
        
    }
    if(isset($_GET['edit_gift'])) {
        include(TEMPLATE_BACK . "/edit_gift.php");
        
        
    }
    if(isset($_GET['delete_gift_id'])) {
        include(TEMPLATE_BACK . "/delete_gift.php");
        
        
    }
    if(isset($_GET['user_gift'])) {
        include(TEMPLATE_BACK . "/user_gift.php");
        
        
    }
    if(isset($_GET['gallery'])) {
        include(TEMPLATE_BACK . "/gallery.php");
        
        
    }
    if(isset($_GET['delete_gallery_id'])) {
         
        include(TEMPLATE_BACK . "/delete_gallery.php");
        
    }
    if(isset($_GET['info'])) {
        include(TEMPLATE_BACK . "/info.php");
        
    }
    if(isset($_GET['data'])) {
        include(TEMPLATE_BACK . "/data.php");
        
    }
    if(isset($_GET['about'])) {
        include(TEMPLATE_BACK . "/about.php");
        
    }
    if(isset($_GET['delete_about_id'])) {
         
        include(TEMPLATE_BACK . "/delete_about.php");
        
    }
     if(isset($_GET['onboard'])) {
        include(TEMPLATE_BACK . "/onboard.php");
        
    }
    if(isset($_GET['profile'])) {
        include(TEMPLATE_BACK . "/profile.php");
        
    }
    if(isset($_GET['contact'])) {
        include(TEMPLATE_BACK . "/contact.php");
        
    }
    if(isset($_GET['delete_contact_id'])) {
         
        include(TEMPLATE_BACK . "/delete_contact.php");
        
    }
     if(isset($_GET['delete_groom_id'])) {
         
        include(TEMPLATE_BACK . "/delete_groom.php");
        
    }
    if(isset($_GET['delete_bride_id'])) {
         
        include(TEMPLATE_BACK . "/delete_bride.php");
        
    }
    if(isset($_GET['delete_date_id'])) {
         
        include(TEMPLATE_BACK . "/delete_date.php");
        
    }
    if(isset($_GET['delete_venue_id'])) {
         
        include(TEMPLATE_BACK . "/delete_venue.php");
        
    }
    if(isset($_GET['inbox'])) {
         
        include(TEMPLATE_BACK . "/inbox.php");
        
    }
    if(isset($_GET['add_timeline'])) {
         
        include(TEMPLATE_BACK . "/add_timeline.php");
        
    }
    if(isset($_GET['admin_timeline'])) {
         
        include(TEMPLATE_BACK . "/admin_timeline.php");
        
    }
    if(isset($_GET['timeline'])) {
         
        include(TEMPLATE_BACK . "/timeline.php");
        
    }
    if(isset($_GET['delete_timeline_id'])) {
         
        include(TEMPLATE_BACK . "/delete_timeline.php");
        
    }
                
?>
                
                
                
          <!-- Footer-->
<?php include(TEMPLATE_BACK .  "/footer.php");?>

     
   