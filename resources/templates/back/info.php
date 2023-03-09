      <?php
if(is_admin($_SESSION['email'])) {
    
  header("Location: index.php");  
    
}

?>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome, <?php echo ucwords(get_user_email()); ?></h1>
        
      </div>

      
      <div class="table-responsive">
         <div class="col">
            <div class="card">
              <div class="card-body">
                  
                  <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa-solid fa-palette"></i> Colours
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
               
                <!-- /.row -->
                <div class="row">

                            <div class="col-lg-4 col-md-6">
                        <div class="card panel-lilac" style="max-width: ;  margin-bottom: 20px;">
                            <div class="card-header text-white " style="background-color:#C8A2C8;">
                                <div class="row">
                                    <div class="col-3">
                                       <i class="fa-solid fa-palette fa-5x"></i>
                                    </div>
                                    <div class="col-9 text-end">
                                        <div class="huge"></div>
                                        <div><strong>Lilac</strong></div>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6">
                        <div class="card panel-gold" style="max-width: ;  margin-bottom: 20px;">
                            <div class="card-header text-white" style="background-color:#D4AF37;">
                                <div class="row">
                                    <div class="col-3">
                                        <i class="fa-solid fa-palette fa-5x"></i>
                                    </div>
                                    <div class="col-9 text-end">
                                        <div class="huge"></div>
                                        <div><strong>Gold</strong></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
          
                    <div class="col-lg-4 col-md-6">
                        <div class="card panel-white" style="max-width: ;  margin-bottom: 20px;">
                            <div class="card-header text-white " style="background-color:#FFF;">
                                <div class="row">
                                    <div class="col-3">
                                        <i class="fa-solid fa-palette fa-5x" style="color:#C8A2C8;"></i>
                                    </div>
                                    <div class="col-9 text-end">
                                        <div class="huge"></div>
                                        <div><strong style="color:#C8A2C8;">White</strong></div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
            
              
                </div>
                
                <!-- /.row -->
      
              </div>
              
       
            </div>
          </div>
          
      </div>
      
      
      
       <!-- FIRST ROW WITH cardS -->
<br />

<div class="row">
          <div class="col-md-6">
                    <div class="card" style="margin-bottom:20px">
              <div class="card-header">
                <h5 class="card-title">Wedding Date</h5>
              </div>
              <div class="card-body">
                
                <p class="card-text"><strong><?php get_date_front(); ?></strong></p>
               
              </div>
              <div class="card-footer text-muted">
                <strong><h5 id="counter" class=""></h5></strong>
              </div>
            </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="card" style="margin-bottom:20px">
              <div class="card-header">
                <h5 class="card-title">Wedding Venue</h5>
              </div>
              <div class="card-body">
                
                <p class="card-text"><strong><?php get_venue_front(); ?></strong></p>
              </div>
              <div class="card-footer text-muted">
                
              </div>
            </div>
                    
                </div>
        
          
      </div>
              