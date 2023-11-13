<?php
require 'layouts/header.php';

$settings = $pdo->prepare("SELECT * FROM settings WHERE set_id = ?");
$settings->execute(array(1));
$row = $settings->fetch(PDO::FETCH_ASSOC);
//var_dump($row);
?>
 
<?php
require 'layouts/sidebar.php';
?>

<?php if($_GET['page'] =='settings'){?>
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
                      <h3 class="card-title">Settings</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action ='insert.php' method='POST'>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Site Title</label>
                          <input name='title' value='<?=$row['set_title']?>' type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
                        </div>
                      
                        <div class="form-group">
                          <label for="exampleInputEmail1">Site Description</label>
                          <input name='desc' value='<?=$row['set_desc']?>' type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter discription">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Site Keyword</label>
                          <input name='keyword' value='<?=$row['set_keyword']?>' type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter keyword">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Address</label>
                          <input name='address' value='<?=$row['set_address']?>' type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Phone</label>
                          <input name='phone' value='<?=$row['set_phone']?>' type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Number">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Email</label>
                          <input name='email' value='<?=$row['set_email']?>' type="email" class="form-control" id="exampleInputPassword1" placeholder="Enter Email">
                        </div>

                      <div class="card-footer">
                        <button name='send' style='float:right'type="submit" class="btn btn-primary">Send</button>
                      </div>
                    </form>
                  </div>
          </div> 
        </div>
    </div>
    </div>
    </section>     
    </div>
<?php } elseif($_GET['page']=='socialmedia'){ ?>
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
                      <h3 class="card-title">Social Media Settings</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action ='insert.php' method='POST'>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Facebook</label>
                          <input name='facebook' value='<?=$row['set_facebook']?>' type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
                        </div>
                      
                        <div class="form-group">
                          <label for="exampleInputEmail1">Instagram</label>
                          <input name='insta' value='<?=$row['set_insta']?>' type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter discription">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Youtube</label>
                          <input name='youtube' value='<?=$row['set_youtube']?>' type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter keyword">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Twitter</label>
                          <input name='twitter' value='<?=$row['set_twitter']?>' type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Address">
                        </div>
                      <div class="card-footer">
                        <button name='socialmedia' style='float:right'type="submit" class="btn btn-primary">Send</button>
                      </div>
                    </form>
                  </div>
          </div> 
        </div>
    </div>
    </div>
    </section>     
    </div>
<? } ?>
<?php
require 'layouts/footer.php';
?>

  