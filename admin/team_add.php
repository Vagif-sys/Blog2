<?php
require 'layouts/header.php';
?>
 
<?php
require 'layouts/sidebar.php';
?>

<? if($_GET['page'] == 'team'){ ?>
    <div class='content-wrapper'>
    <section class='content'>
      <div class='container-fluid'>
        <div class='row'>
          <div class='col-md-12'>
            <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">TEAM</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action ='insert.php' method='POST' enctype='multipart/form-data'>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Team Name</label>
                          <input name='name'  type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                        </div>
                    
                        <div class="form-group">
                          <label for="exampleInputEmail1">Team Position</label>
                          <input name='position'  type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter position">
                        </div>
                    
                        <div class="form-group">
                          <label for="exampleInputPassword1">Team Image</label>
                          <input type='file' name='image' class="form-control" id="exampleInputPassword1" >
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Team Description</label>
                          
                          <textarea name='desc'  id='editor1' class='ckeditor'></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Team Twitter</label>
                          <input name='twitter'  type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter address">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Team Facebook</label>
                          <input name='facebook'  type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter address">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Team Insta</label>
                          <input name='insta'  type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter address">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Team YouTube</label>
                          <input name='youtube'  type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter address">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Team Row</label>
                          <input name='row'  type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter row">
                        </div>
                      
                      <div class="card-footer">
                        <button name='teamSend' style='float:right'type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
          </div> 
        </div>
    </div>
    </div>
  <?php }elseif($_GET['page']== 'gallery'){?>
    
    <div class='content-wrapper'>
    <section class='content'>
      <div class='container-fluid'>
        <div class='row'>
          <div class='col-md-12'>
            <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">GAllery</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action ='insert.php' method='POST' enctype='multipart/form-data'>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Image</label>
                          <input type='file' name='image' class="form-control" id="exampleInputPassword1" >
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Row</label>
                          <input name='row'  type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter position">
                        </div>
                      
                      <div class="card-footer">
                        <button name='galerySend' style='float:right'type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
          </div> 
        </div>
    </div>
    </div>
  <?php } elseif($_GET['page'] == 'blog'){?>
      
  <div class='content-wrapper'>
    <section class='content'>
      <div class='container-fluid'>
        <div class='row'>
          <div class='col-md-12'>
            <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Blog</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action ='insert.php' method='POST' enctype='multipart/form-data'>
                      <div class="card-body">

                      <div class="form-group">
                          <label for="exampleInputPassword1">Blog Image</label>
                          <input type='file' name='image' class="form-control" id="exampleInputPassword1" >
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Blog Title</label>
                          <input name='title'  type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
                        </div>
                  
                        <div class="form-group">
                          <label for="exampleInputEmail1">Blog Description</label>
                          
                          <textarea name='desc'  id='editor1' class='ckeditor'></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Blog Keyword</label>
                          <input name='keyword'  type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter keyword">
                        </div>

                        
                        <div class="form-group">
                          <label for="exampleInputEmail1">Blog Row</label>
                          <input name='row'  type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter row">
                        </div>
                      
                      <div class="card-footer">
                        <button name='blogSend' style='float:right'type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
          </div> 
        </div>
    </div>
    </div>
<?php } elseif($_GET['page'] == 'category'){?>
  <div class='content-wrapper'>
    <section class='content'>
      <div class='container-fluid'>
        <div class='row'>
          <div class='col-md-12'>
            <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Category </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action ='insert.php' method='POST' enctype='multipart/form-data'>
                      <div class="card-body">

                      
                        <div class="form-group">
                          <label for="exampleInputEmail1"> Category Title</label>
                          <input name='title'  type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Category Row</label>
                          <input name='row'  type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter row">
                        </div>
                  
                        <div class="form-group">
                          <label for="exampleInputEmail1">Category Status</label>
                          <select name='status' class='form control select2' style='width:100%'>
                            <option  selected='selected'>Active<option>
                            <option>Passive<option>
                          </select>
                        </div>
                    
                      <div class="card-footer">
                        <button name='catInsertSend' style='float:right'type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
          </div> 
        </div>
    </div>
    </div>
<?php }  ?>
<?
require 'layouts/footer.php';
?>

  