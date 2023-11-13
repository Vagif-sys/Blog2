<?php require 'layouts/header.php';
 require 'layouts/sidebar.php';
$content = $pdo->prepare("SELECT * FROM content WHERE cat_id=:cat_id");
$content->execute(array(':cat_id'=>$_GET['catid']));

 ?>;
<div class='content-wrapper'>
<div class="row">
 <div class="col-12">
<?php
 if(isset($_GET['status1'])=='Added'){?>
    <div id='final_msg' class="alert alert-success" role="alert">
    Added Successfully!
</div>
<? } elseif(isset($_GET['status']) == 'Failed'){?>
<div id='final_msg' class="alert alert-danger" role="alert">
    Something went wrong!
</div>
<? } elseif(isset($_GET['status2']) == 'Deleted'){?>
<div id='final_msg' class="alert alert-success" role="alert">
    Data deleted successfully
</div>
<?php }elseif(isset($_GET['status3']) == 'Edited'){?>
<div id='final_msg' class="alert alert-success" role="alert">
    Data Updated successfully
</div> 
<?php }  ?>
   <div class="card">
    <div class="card-header">
    <h3 class="card-title">Content </h3>
    <a href='content_add.php?catid=<?=$_GET['catid']?>'><button style="float:right" type='submit' 
                class='btn btn-info'>Add New Content</button></a>
   <!--  <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

        <div class="input-group-append">
            <button type="submit" class="btn btn-default">
            <i class="fas fa-search"></i>
            </button>
        </div>
        </div>
    </div> -->
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
            
            <tr>
                <th>Photo</th>
                <th>Title</th>
                <th>Row</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row = $content->fetch(PDO::FETCH_ASSOC)){ ?>
            <tr>
               
                <td><img src='assets/images/content/<?=$row['content_photo']?>' width='90px'></td>
                <td><?= $row['content_title']?></td>
                <td><?= $row['content_row']?></td>
                <td>
                    <a href='content_edit.php?id=<?=$row['content_id']?>'>
                        <button type='submit'class='btn btn-success'>Edit</button>
                    </a>
                </td>
                <td>
                    <form action='insert.php' method='post'>
                        <button type='submit' name='del_content' class='btn btn-danger' onClick="return confirm('Are you sure  to delete?!')">Delete</button>
                        <input type='hidden' name='id' value='<?=$row['content_id']?>'>
                        <input type='hidden' name='catid' value='<?=$row['cat_id']?>'>
                        <input type='hidden' name='oldImage' value='<?=$row['content_photo']?>'>
                    </form>
                </td>
            </tr>
            <? }?>
            </tbody>
        </table>
    </div>
   </div>          <!-- /.card-body -->
  </div>
</div>
</div>


<?php require 'layouts/footer.php' ?>
<script>
$('#final_msg').fadeIn().delay(10000).fadeOut();

</script>