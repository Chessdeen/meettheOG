<h3 class="bg-success"><?php display_message(); ?></h3>   
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-envelope fa-fw"></i> Messages Panel</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                              
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th></th>
                            </tr>
                        </thead>
                            <tbody>
                                
                            <?php display_contact() ?>
                            
                            
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>