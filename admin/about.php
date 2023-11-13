<?php
require 'layouts/header.php';

$about = $pdo->prepare("SELECT * FROM about_us WHERE about_id = ?");
$about->execute(array(1));
$row = $about->fetch(PDO::FETCH_ASSOC);
//var_dump($row);
?>
 
<?php
require 'layouts/sidebar.php';
?>


    <div class='content-wrapper'>
    <section class='content'>
      <div class='container-fluid'>
        <div class='row'>
          <div class='col-md-12'>
            <div class="card card-primary">
            <?php
                if(isset($_GET['status'])=='Edited'){?>
                  <div class="alert alert-success" role="alert">
                    Updated Successfully!
                </div>
              <? } elseif(isset($_GET['status']) == 'Failed'){?>
                <div class="alert alert-danger" role="alert">
                    Something went wrong!
                </div>
                <? } ?>
                    <div class="card-header">
                      <h3 class="card-title">About Us</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action ='insert.php' method='POST' enctype='multipart/form-data'>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Title</label>
                          <input name='title' value='<?=$row['about_title']?>' type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
                        </div>
                    
                        <div class="form-group">
                          <label for="exampleInputPassword1">Image</label>
                          <img src='assets/images/<?=$row['about_image']?>' width='200px'>
                        </div>
                        <input type='hidden' name='oldImage' value='<?=$row['about_image']?>'>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Image</label>
                          <input type='file' name='image' class="form-control" id="exampleInputPassword1" >
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Description</label>
                          
                          <textarea name='desc'  id='editor1' class='ckeditor'><?=$row['about_desc']?></textarea>
                        </div>
                      
                      <div class="card-footer">
                        <button name='aboutSend' style='float:right'type="submit" class="btn btn-primary">Send</button>
                      </div>
                    </form>
                  </div>
          </div> 
        </div>
    </div>
    </div>
    </section>
      

<?
require 'layouts/footer.php';
?>

  