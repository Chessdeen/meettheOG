<?php
if(!is_admin($_SESSION['email'])) {
    
  header("Location: index.php?info");  
    
}

?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2" id="counter"></h1>
        
      </div>
 
      
       <!-- FIRST ROW WITH cardS -->
<br />
               <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa-solid fa-gauge"></i> Dashboard Statistics Overview
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
               
                <!-- /.row -->
                <div class="row">

                            <div class="col-lg-4 col-md-6">
                        <div class="card panel-green" style="max-width: ; margin-bottom: 20px;">
                            <div class="card-header text-white bg-success">
                                <div class="row">
                                    <div class="col-3">
                                       <i class="fa-solid fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-9 text-end">
                                        <div class="huge"><?php echo count_all_records('users'); ?></div>
                                        <div>Guests</div>
                                    </div>
                                </div>
                            </div>
                            <a href="index.php?guest">
                                <div class="card-footer">
                                    <span class="float-start">View Details</span>
                                    <span class="float-end"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6">
                        <div class="card panel-yellow" style="max-width: ; margin-bottom: 20px;">
                            <div class="card-header text-white bg-warning">
                                <div class="row">
                                    <div class="col-3">
                                        <i class="fa fa-tags fa-5x"></i>
                                    </div>
                                    <div class="col-9 text-end">
                                        <div class="huge"><?php echo count_all_records('products'); ?></div>
                                        <div>Gifts!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="index.php?gift" class="card-foot-warning">
                                <div class="card-footer card-foot-warning">
                                    <span class="float-start">View Details</span>
                                    <span class="float-end"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
          
                    <div class="col-lg-4 col-md-6">
                        <div class="card panel-info" style="max-width: ; margin-bottom: 20px;">
                            <div class="card-header text-white bg-info">
                                <div class="row">
                                    <div class="col-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-9 text-end">
                                        <div class="huge"><?php echo count_all_records('categories'); ?></div>
                                        <div>Categories!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="index.php?categories">
                                <div class="card-footer">
                                    <span class="float-start">View Details</span>
                                    <span class="float-end"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
            
              
                </div>
        
                <!-- /.row -->