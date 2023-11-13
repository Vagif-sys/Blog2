<?php require 'layouts/header.php';
 require 'layouts/sidebar.php';
$galery = $pdo->prepare("SELECT * FROM gallery");
$galery->execute(array());

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
<div id='final_msg' class="alert alert-danger" role="alert">
    Data deleted successfully
</div>
<?php } ?>
   <div class="card">
    <div class="card-header">
    <h3 class="card-title">Photo Gallery</h3>
    <a href='team_add.php?page=gallery'><button style="float:right" type='submit' 
                class='btn btn-info'>Add Photo Gallery</button></a>
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
                <th>Row</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row = $galery->fetch(PDO::FETCH_ASSOC)){ ?>
            <tr>
               
                <td><img src='assets/images/galery/<?=$row['galery_photo']?>' width='90px'></td>
                <td><?= $row['galery_row']?></td>
                <td>
                    <a href='edit_team.php?page=galery&id=<?=$row['galery_id']?>'>
                        <button type='submit'class='btn btn-success'>Edit</button>
                    </a>
                </td>
                <td>
                    <form action='insert.php' method='post'>
                        <button type='submit' name='delete' class='btn btn-danger' onClick="return confirm('Are you sure  to delete?!')">Delete</button>
                        <input type='hidden' name='id' value='<?=$row['galery_id']?>'>
                        <input type='hidden' name='oldImage' value='<?=$row['galery_photo']?>'>
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