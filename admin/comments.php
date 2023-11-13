<?php require_once 'layouts/header.php'; 
require_once 'layouts/sidebar.php';
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Comments</h3><br>
          <?php
 if(isset($_GET['status1'])=='Approved'){?>
    <div id='final_msg' class="alert alert-success" role="alert">
    Deleted Successfully!
</div>
<? } elseif(isset($_GET['status']) == 'Failed'){?>
<div id='final_msg' class="alert alert-danger" role="alert">
    Something went wrong!
</div>
<? } ?>
          <div class="card-tools">
             <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">

          <table class="table table-striped projects">
              <thead>

                  <tr>
                      <th >
                          name
                      </th>
                      <th >
                         Description
                       </th>
                     
                    <th></th>
                         
                  </tr>
              </thead>
              <tbody>
              
                <?php

            $comments=$pdo->prepare("SELECT * FROM comments  
                                    where comment_approve=:approve");
            $comments->execute(array(
            'approve'=>0,
            
            ));
            while($row=$comments->fetch(PDO::FETCH_ASSOC)) {
                 ?>
                  <tr>
                      <td>
                         Author: <?=$row['comment_name_surname'] ?>
                      </td>
                      <td>
                          <a>
                           <?=$row['comment_desc'] ?>
                          </a>
                          <br/>
                          <small>
                              <?=$row['comment_date'] ?>
                          </small>
                      </td>
                      <td class="project-actions text-right">
                           <a class="btn btn-success btn-sm" href="insert.php?approve&id=<?=$row['comment_id'] ?>">
                              <i class="fas fa-plus">
                              </i>
                              Approve
                          </a>
                             <a class="btn btn-danger btn-sm" href="insert.php?delete&id=<?=$row['comment_id'] ?>">
                              <i class="fas fa-trash">
                              </i>
                               Delete
                          </a>
                      </td>
                  </tr>
                  
                <?php } ?>
                  
              
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once 'layouts/footer.php'; ?>