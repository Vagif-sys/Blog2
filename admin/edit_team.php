<?php
require 'layouts/header.php';
?>
 
<?php
require 'layouts/sidebar.php';
?>

<? if($_GET['page'] == 'team'){ 
    
$edit_team = $pdo->prepare("SELECT * FROM team WHERE team_id =:team_id");
$team_id = $_GET['id'];
$edit_team->execute(array(':team_id'=>$team_id));
$row = $edit_team->fetch(PDO::FETCH_ASSOC);    

?>
    <div class='content-wrapper'>
    <section class='content'>
      <div class='container-fluid'>
        <div class='row'>
          <div class='col-md-12'>
            <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">TEAM EDIT</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action ='insert.php' method='POST' enctype='multipart/form-data'>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Team Name</label>
                          <input name='name'  type="text" class="form-control" 
                            id="exampleInputEmail1" value='<?=$row['team_name']?>'  placeholder="Enter name">
                        </div>
                    
                        <div class="form-group">
                          <label for="exampleInputEmail1">Team Position</label>
                          <input name='position'  type="text" class="form-control" 
                            id="exampleInputEmail1"  value='<?=$row['team_postion']?>'placeholder="Enter position">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Team Image</label>
                          <img src="assets/images/team/<?=$row['team_photo']?>">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Change Image</label>
                          <input type='file' name='image' class="form-control" id="exampleInputPassword1" >
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Team Description</label>
                          
                          <textarea name='desc'  id='editor1' 
                                    class='ckeditor' ><?=$row['team_desc']?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Team Twitter</label>
                          <input name='twitter'  type="text" 
                             class="form-control" id="exampleInputEmail1"  value='<?=$row['team_twitter']?>'placeholder="Enter address">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Team Facebook</label>
                          <input name='facebook'  type="text" class="form-control" 
                           id="exampleInputEmail1"  value='<?=$row['team_facebook']?>'placeholder="Enter address">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Team Insta</label>
                          <input name='insta'  type="text" 
                             class="form-control" id="exampleInputEmail1" value='<?=$row['team_insta']?>' placeholder="Enter address">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Team YouTube</label>
                          <input name='youtube'  type="text" class="form-control"
                             id="exampleInputEmail1"  value='<?=$row['team_youtube']?>' placeholder="Enter address">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Team Row</label>
                          <input name='row'  type="text" class="form-control" 
                                id="exampleInputEmail1"  value='<?=$row['team_row']?>' placeholder="Enter row">
                        </div>
                        <input type='text' name='oldImage' value='<?=$row['team_photo']?>'>
                        <div class="form-group">
                        <input type='text' name='id' value='<?=$row['team_id']?>'>
                        <div class="form-group">
                      <div class="card-footer">
                        <button name='editSend' style='float:right'type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
          </div> 
        </div>
    </div>
    </div>
<?php } elseif($_GET['page']=='galery'){ 

$edit_galery = $pdo->prepare("SELECT * FROM gallery WHERE galery_id =:galery_id");

$edit_galery->execute(array(':galery_id'=> $_GET['id']));
$row = $edit_galery->fetch(PDO::FETCH_ASSOC); 
?> 
   <div class='content-wrapper'>
    <section class='content'>
      <div class='container-fluid'>
        <div class='row'>
          <div class='col-md-12'>
            <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">GALERY PHOTO EDIT</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action ='insert.php' method='POST' enctype='multipart/form-data'>
                      <div class="card-body">
                        
                        <div class="form-group">
                          <label for="exampleInputPassword1">Team Image</label>
                          <img src="assets/images/galery/<?=$row['galery_photo']?>">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Change Image</label>
                          <input type='file' name='image' class="form-control" id="exampleInputPassword1" >
                        </div>

           
                        <div class="form-group">
                          <label for="exampleInputEmail1">Team Row</label>
                          <input name='row'  type="text" class="form-control" 
                                id="exampleInputEmail1"  value='<?=$row['galery_row']?>' placeholder="Enter row">
                        </div>
                        <input type='hidden' name='oldImage' value='<?=$row['galery_photo']?>'>
                        <div class="form-group">
                        <input type='hidden' name='id' value='<?=$row['galery_id']?>'>
                        <div class="form-group">
                      <div class="card-footer">
                        <button name='galerySend' style='float:right'type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
          </div> 
        </div>
    </div>
    </div> 
<?php } elseif($_GET['page']=='blog'){ 
 $edit_blog = $pdo->prepare("SELECT * FROM blog WHERE blog_id =:blog_id");

 $edit_blog->execute(array(':blog_id'=> $_GET['id']));
 $row = $edit_blog->fetch(PDO::FETCH_ASSOC);  
  
  ?>
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
                          <label for="exampleInputPassword1">Curren Image</label>
                          <img src='assets/images/blog/<?=$row['blog_photo']?>'>
                        </div>                                            
                      <div class="form-group">
                          <label for="exampleInputPassword1">Change Blog Image</label>
                          <input type='file' name='image' class="form-control" id="exampleInputPassword1" >
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Blog Title</label>
                          <input name='title' value='<?=$row['blog_title']?>' type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
                        </div>
                  
                        <div class="form-group">
                          <label for="exampleInputEmail1">Blog Description</label>
                          
                          <textarea name='desc'   id='editor1' class='ckeditor'><?=$row['blog_desc']?>'</textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Blog Keyword</label>
                          <input name='keyword'  type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter keyword">
                        </div>

                        
                        <div class="form-group">
                          <label for="exampleInputEmail1">Blog Row</label>
                          <input name='row' value='<?=$row['blog_row']?>'  type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter row">
                        </div>
                        <input type='hidden' name='oldImage' value='<?=$row['blog_photo']?>'>
                        <div class="form-group">
                        <input type='' name='id' value='<?=$row['blog_id']?>'>
                      <div class="card-footer">
                        <button name='editSend' style='float:right'type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
          </div> 
        </div>
    </div>
    </div>
<?php } elseif($_GET['page']=='category'){ 
 $edit_category = $pdo->prepare("SELECT * FROM category WHERE cat_id =:cat_id");

 $edit_category->execute(array(':cat_id'=> $_GET['id']));
 $row = $edit_category->fetch(PDO::FETCH_ASSOC);  
var_dump($row);
?>
<div class='content-wrapper'>
    <section class='content'>
      <div class='container-fluid'>
        <div class='row'>
          <div class='col-md-12'>
            <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">CATEGORY EDIT</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action ='insert.php' method='POST' enctype='multipart/form-data'>
                      <div class="card-body">
                        
                       

           
                        <div class="form-group">
                          <label for="exampleInputEmail1">Team Row</label>
                          <input name='row'  type="text" class="form-control" 
                                id="exampleInputEmail1"  value='<?=$row['cat_row']?>' placeholder="Enter row">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Category Title</label>
                          <input name='title'  type="text" class="form-control" 
                                id="exampleInputEmail1"  value='<?=$row['cat_title']?>' placeholder="Enter title">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Category Status</label>
                          <select name='status' class='form control select2' style='width:100%'>
                            <option value='1' <?php if($row['cat_status']=='1') echo 'selected' ?>>Active<option>
                            <option value='2' <?php if($row['cat_status']=='2') echo 'selected' ?>>Passive<option>
                          </select>
                        </div>
                        
                        <input type='' name='id' value='<?=$row['cat_id']?>'>
                        <div class="form-group">
                      <div class="card-footer">
                        <button name='catEditSend' style='float:right'type="submit" class="btn btn-primary">Submit</button>
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

  