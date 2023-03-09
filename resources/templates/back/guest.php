<div class="col-lg-12">
    <p class="page-header">  </p>
    <h3 class="bg-success"><?php display_message(); ?></h3>
    <a href="index.php?add_guest" class="btn" style="color:#fff;background-color:#C8A2C8;">Add User</a>
    <a href="index.php?push_notification" class="btn btn-success" style="color:#fff;float:right;background-color:#d4af37">Push Notification</a>
 
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header">
                <h3 class="card-title"><i class="fa fa-user fa-fw"></i> Guests card</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Role</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            <?php display_users() ?>
                            
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
    