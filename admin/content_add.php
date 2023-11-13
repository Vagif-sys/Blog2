<?php 
require 'layouts/header.php';
require 'layouts/sidebar.php'
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
                          <label for="exampleInputPassword1">Team Image</label>
                          <input type='file' name='image' class="form-control" id="exampleInputPassword1" >
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Content Title</label>
                          <input name='title'  type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
                        </div>
                    
                        <div class="form-group">
                          <label for="exampleInputEmail1">Team Row</label>
                          <input name='row'  type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter row">
                        </div>
                    
                       

                        <div class="form-group">
                          <label for="exampleInputEmail1">Team Description</label>
                          
                          <textarea name='desc'  id='editor1' class='ckeditor'></textarea>
                        </div>
                        
                        <input name='catid'  type="" value='<?=$_GET['catid']?>' > 

                        <div class="form-group">
                          <label for="exampleInputEmail1">Content Keyword</label>
                          <input name='keyword'  type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter keyword">
                        </div>
                      <div class="card-footer">
                        <button name='contentSend' style='float:right'type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
          </div> 
        </div>
    </div>
    </div>
<?require 'layouts/footer.php'?>