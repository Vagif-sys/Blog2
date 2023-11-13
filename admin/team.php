<?php require 'layouts/header.php';
 require 'layouts/sidebar.php';
$team = $pdo->prepare("SELECT * FROM team");
$team->execute(array());

 ?>;
<div class='content-wrapper'>
<div class="row">
 <div class="col-12">
<?php
 if(isset($_GET['status1'])=='Edited'){?>
    <div id='final_msg' class="alert alert-success" role="alert">
    Deleted Successfully!
</div>
<? } elseif(isset($_GET['status']) == 'Failed'){?>
<div id='final_msg' class="alert alert-danger" role="alert">
    Something went wrong!
</div>
<? } ?>
   <div class="card">
    <div class="card-header">
    <h3 class="card-title">Team Members</h3>
    <a href='team_add.php?page=team'><button style="float:right" type='submit' 
                class='btn btn-info'>+Add A Member</button></a>
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
                <th>Name</th>
                <th>Description</th>
                <th>Position</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row = $team->fetch(PDO::FETCH_ASSOC)){ ?>
            <tr>
               
                <td><img src='assets/images/team/<?=$row['team_photo']?>' width='200px'></td>
                <td><?= $row['team_row']?></td>
                <td><?= $row['team_name']?></td>
                <td><?= $row['team_desc']?></td>
                <td><?= $row['team_postion']?></td>
                <td>
                    <a href='edit_team.php?page=team&id=<?=$row['team_id']?>'>
                        <button type='submit'class='btn btn-success'>Edit</button>
                    </a>
                </td>
                <td>
                    <form action='insert.php' method='post'>
                        <button type='submit' name='delete' class='btn btn-danger' onlick="confirm('Are you to delete')">Delete</button>
                        <input type='hidden' name='id' value='<?=$row['team_id']?>'>
                        <input type='hidden' name='oldImage' value='<?=$row['team_photo']?>'>
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