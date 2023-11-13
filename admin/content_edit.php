<?php 
require 'layouts/header.php';
require 'layouts/sidebar.php';

$edit_content = $pdo->prepare("SELECT * FROM content WHERE content_id = :content_id");
$edit_content->execute(array(':content_id'=>$_GET['id']));
$row = $edit_content->fetch(PDO::FETCH_ASSOC);

?>
 <div class='content-wrapper'>
    <section class='content'>
      <div class='container-fluid'>
        <div class='row'>
          <div class='col-md-12'>
            <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Content</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action ='insert.php' method='POST' enctype='multipart/form-data'>
                      <div class="card-body">
                      <div class="form-group">
                          <label for="exampleInputPassword1">Content Image</label>
                          <img src='assets/images/content/<?=$row['content_photo']?>' width='200px'>
                      </div>

                      <div class="form-group">
                          <label for="exampleInputPassword1">Content Image</label>
                          <input type='file' name='image' class="form-control" id="exampleInputPassword1" >
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Content Title</label>
                          <input value='<?=$row['content_title']?>' name='title'  type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
                        </div>
                    
                        <div class="form-group">
                          <label for="exampleInputEmail1">Content Row</label>
                          <input value='<?=$row['content_row']?>' name='row'  type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter row">
                        </div>
                    
                       

                        <div class="form-group">
                          <label for="exampleInputEmail1">Content Description</label>
                          
                          <textarea  name='desc'  id='editor1' class='ckeditor'><?=$row['content_desc']?></textarea>
                        </div>
                        
                        <input name='id'  type="" value='<?=$row['content_id']?>' > 
                        <input type='' name='catid' value='<?=$row['cat_id']?>'>      
                        <div class="form-group">
                          <label for="exampleInputEmail1">Content Keyword</label>
                          <input value='<?=$row['content_keyword']?>' name='keyword'  type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter keyword">
                        </div>
                      <div class="card-footer">
                        <button name='contentEditSend' style='float:right'type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
          </div> 
        </div>
    </div>
    </div>
<?require 'layouts/footer.php'?>