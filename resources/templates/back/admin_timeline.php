<div class="col-lg-12">
    <p class="page-header">  </p>
    <h3 class="bg-success"><?php display_message(); ?></h3>
    <a href="index.php?add_timeline" class="btn" style="color:#fff;background-color:#C8A2C8;">Add Timeline</a>
 
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header">
                <h3 class="card-title"><i class="fa fa-user fa-fw"></i> Timeline card</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                            <th>Year</th>
                            <th>Timeline Title</th>
                            <th>Timeline Body</th>
                            <th>Timeline Title 2</th>
                            <th>Timeline Body 2</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            <?php display_timeline() ?>
                            
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
    