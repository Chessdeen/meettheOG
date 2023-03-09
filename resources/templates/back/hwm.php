<?php groom(); ?>
<?php bride(); ?>
<?php pusher(); ?>
 

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Couple's Profile</h1>
        
      </div>




<div class="row">
<h3 class="bg-success"><?php display_message(); ?></h3>
    <div class="col-md-6">
        
         <form action="" method="post" style="padding-top:15px;">
        <div class="form-group">
            <label for="olayinka">Add Details</label>
            <input name="olayinka" type="text" class="form-control" placeholder="Add Olayinka's Details">
        </div>

        <div class="form-group">
            
            <input name="groom" type="submit" class="btn btn-primary" value="Olayinka's Data">
        </div>      


    </form>
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"><i class="fa-solid fa-mars"></i> Olayinka's Profile </h3>
                
            </div>
            <div class="card-body">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                
                                <th>About Olayinka</th>
                                <th></th>
                            </tr>
                        </thead>
                            <tbody>
                                
                            <?php get_groom(); ?>
                            
                            </tbody>
                    </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
         <form action="" method="post" style="padding-top:15px;">
    
        <div class="form-group">
            <label for="anuoluwa">Add Details</label>
            <input name="anuoluwa" type="text" class="form-control" placeholder="Add Anuoluwa's Details">
        </div>

        <div class="form-group">
            
            <input name="bride" type="submit" class="btn btn-success" value="Anuoluwa's Data">
        </div>      


    </form>
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"><i class="fa-solid fa-venus"></i> Anuoluwa's Profile </h3>
            </div>
            <div class="card-body">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                
                                <th>About Anuoluwa</th>
                                <th></th>
                            </tr>
                        </thead>
                            <tbody>
                                
                            <?php get_bride(); ?>
                            
                            </tbody>
                    </table>
            </div>
        </div>
    </div>

</div>

<hr />
<div class="row">
<?php about(); ?>
    <div class="col-md-12">
         <form action="" method="post" style="padding-top:15px;">
    
        <div class="form-group">
            <label for="about">Add Details</label>
            <input name="about" type="text" class="form-control" placeholder="Add How We Met Details">
        </div>

        <div class="form-group">
            
            <input name="about_us" type="submit" class="btn btn-warning" value="How We Met">
        </div>      


    </form>
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"><i class="fa-solid fa-shield-heart"></i> How We Met </h3>
            </div>
            <div class="card-body">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                
                                <th>Data</th>
                                <th></th>
                            </tr>
                        </thead>
                            <tbody>
                                
                            <?php get_about(); ?>
                            
                            </tbody>
                    </table>
            </div>
        </div>
    </div>

</div>