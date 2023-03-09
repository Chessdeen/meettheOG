
<!--<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">-->
<!--        <h1 class="h2"><?php echo ucwords(get_user_email()); ?></h1>-->
        
<!--      </div>-->

      
<!--      <div class="table-responsive">-->
<!--         <div class="col">-->
<!--            <div class="card">-->
<!--              <div class="card-body">-->
<!--                <h5 class="card-title" style="color:red;"> <span style="border-bottom: dashed 0.5px currentColor;">Welcome to our wedding Planner! We are so excited to have you here and to share our special day with you.</span></h5>-->
<!--                <p class="card-text">On this website, you will find all the important information you need to know about our wedding, including the date, time, and location. You will also find information about recommended accommodations and parking, as well as a link to RSVP. <br /><br />We can't wait to celebrate with you and share our love story. We've included some photos and information about ourselves and our wedding party so you can get to know us better.<br /><br />If you have any questions or concerns, please don't hesitate to reach out. You can find our contact information on the website or feel free to contact our wedding planner.<br /><br />Thank you for being a part of our special day. We can't wait to see you there!</p>-->
<!--                <hr>-->
              
<!--              </div>-->
              
       
<!--            </div>-->
<!--          </div>-->
<!--      </div>-->
      
      
      
      <?php
if(is_admin($_SESSION['email'])) {
    
  header("Location: index.php");  
    
}

?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Hi Lovely, <?php echo ucwords(get_user_name()); ?></h1>
        
      </div>

      
      <div class="table-responsive">
         <div class="col">
            <div class="card">
              <div class="card-body">
              </div>
              <h5 class="card-title" style="color:red;"> <span style="border-bottom: dashed 0.5px currentColor;">Welcome to our wedding Planner! We are so excited to have you here and to share our special day with you.</span></h5>
       
            </div>
          </div>
      </div>
      
       <!-- FIRST ROW WITH cardS -->
<br />
               <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa-solid fa-pallete"></i> Colours
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
      