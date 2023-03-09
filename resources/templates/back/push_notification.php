<?php 

if(!is_admin($_SESSION['username'])) {
    
  header("Location: index.php?info");  
    
}

?>

<?php pusher(); ?>
 

 <h1 class="page-header">
</h1>




<div class="row">
    <div class="col-md-4">
    
    <h3 class="bg-success"><?php  display_message(); ?></h3>
    
    <form action="" method="post">
    
        <div class="form-group">
            <label for="push-notification">message</label>
            <input name="push_notification" type="text" class="form-control">
        </div>

        <div class="form-group">
            
            <input name="pusher" type="submit" class="btn" value="Push" style="color:#fff;background-color:#C8A2C8;">
        </div>      


    </form>


</div>

    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list fa-fw"></i> Push Notification Panel</h3>
            </div>
            <div class="panel-body">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                
                                <th>Push Notification</th>
                                <th></th>
                            </tr>
                        </thead>
                            <tbody>
                                
                            <?php get_push(); ?>
                            
                            </tbody>
                    </table>
            </div>
        </div>
    </div>

</div>



                







