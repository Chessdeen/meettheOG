<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Gallery</h1>
        
</div>
<div class="row">

    <h3 class="bg-success"><?php display_message(); ?></h3>

    <div class="col-4">

        <form action="" method="post" enctype="multipart/form-data">


            <?php add_slides(); ?>

            <div class="form-group">

                <input type="file" name="file">

            </div>

            <div class="form-group">
                <label for="title">Slide Title</label>
                <input type="text" name="slide_title" class="form-control">

            </div>

            <div class="form-group">

                <input class="btn" type="submit" name="add_slide" style="color:#fff;background-color:#C8A2C8;">

            </div>

        </form>

    </div>


    <div class="col-8">
       
        <?php get_current_slide_in_admin() ?>


    </div>

</div><!-- ROW-->

<hr>

<h1>Slides Available</h1>

<div class="row">

    

    <?php get_slide_thumbnails(); ?>


</div>


