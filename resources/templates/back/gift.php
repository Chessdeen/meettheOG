<?php 

if(!is_admin($_SESSION['username'])) {
    
  header("Location: index.php?info");  
    
}

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Gifts</h1>
        
</div>


<h3 class="bg-success"><?php display_message(); ?></h3>
<a href="index.php?add_gift" class="btn " style="color:#fff;background-color:#C8A2C8;">Add Gift</a>




<div class="row" style="padding-top:15px;">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"><i class="fa-solid fa-gift fa-fw"></i> Listed Gifts</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
           <th>Id</th>
           <th>Title</th>
           <th>Description</th>
           <th>Gift Link</th>
           <th>Gift Quantity</th>
            <th>Delete</th>
                            </tr>
                        </thead>
                            <tbody>
                                
                            <?php get_products_in_admin(); ?>
                            
                            
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>










                
               