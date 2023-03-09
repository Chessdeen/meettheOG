<?php 

if(is_admin($_SESSION['username'])) {
    
  header("Location: index.php");  
    
}

?>

        <div class="col-md-12">
<div class="row">
<br>
</div>

<div class="row">
    
         <div class="col-lg-6" style="justify-content:center;">
        <div class="card card-default">
            <div class="card-heading">
                <h3 class="card-title"><i class="fa fa-fw  fa-envelope"></i> Inbox Panel</h3>
            </div>
            <div class="card-body">
                   
                <table class="table table-striped">
                    <thead>
                        <tr>
                        
                        </tr>
                    </thead>
                        <tbody>
                        <?php display_pusher() ?>
                        </tbody>
                </table>
                   
                   
            </div>
        </div>
        </div>
        
        <div class="col-lg-12">
        
        
        
    </div>

</div>

