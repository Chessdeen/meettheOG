<?php wedding_date(); ?>
<?php wedding_venue(); ?>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Hi Lovely, <?php echo ucwords(get_user_name()); ?></h1>
        
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
<h3 class="bg-success"><?php display_message(); ?></h3>
    <div class="col-md-6">
        
         <form action="" method="post" style="padding-top:15px;">
        <div class="form-group">
            <label for="olayinka">Input Date</label>
            <input name="date" type="text" class="form-control">
        </div>

        <div class="form-group">
            
            <input name="wed_date" type="submit" class="btn btn-primary" value="Update Wedding Date">
        </div>      


    </form>
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"><i class="fa-solid fa-calendar-days"></i> Wedding Date </h3>
                
            </div>
            <div class="card-body">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                            <tbody>
                                
                            <?php get_wedding_date(); ?>
                            
                            </tbody>
                    </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
         <form action="" method="post" style="padding-top:15px;">
    
        <div class="form-group">
            <label for="venue">Input Venue</label>
            <input name="venue" type="text" class="form-control">
        </div>

        <div class="form-group">
            
            <input name="wed_venue" type="submit" class="btn btn-success" value="Update Wedding Venue">
        </div>      


    </form>
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"><i class="fa-solid fa-map-location"></i> Wedding Venue </h3>
            </div>
            <div class="card-body">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                            <tbody>
                                
                            <?php get_wedding_venue(); ?>
                            
                            </tbody>
                    </table>
            </div>
        </div>
    </div>

</div>