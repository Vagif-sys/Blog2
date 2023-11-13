<?php 
require_once 'layouts/header.php';
require_once 'layouts/sidebar.php';
?>


  <div class="content-wrapper">
   
    <section class="content">
      <?php
  if(isset($_GET['status1'])=='Added'){?>
      <div id='final_msg' class="alert alert-success" role="alert">
      Data Added Successfully!
  </div>
  <? } elseif(isset($_GET['status']) == 'Failed'){?>
  <div id='final_msg' class="alert alert-danger" role="alert">
      Something went wrong!
  </div>
  <? } elseif(isset($_GET['status3']) == 'Edited'){?>
  <div id='final_msg' class="alert alert-success" role="alert">
      Data Updated Successfully!
  </div>
  <?php } elseif(isset($_GET['status2']) == 'Edited'){?>
  <div id='final_msg' class="alert alert-success" role="alert">
      Data Deleted Successfully!
  </div>
  <?php }  ?>
     
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Subscribers</h3>

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
                          Id
                      </th>
                      <th >
                         Email
                      </th>
                          
                  </tr>
              </thead>
              <tbody>
              <?php
              $sql = $pdo->prepare("SELECT * FROM subscriber ORDER BY subs_id ASC");
              $sql->execute(array());
              while($row = $sql->fetch(PDO::FETCH_ASSOC)){?>;
                      <tr>
                          <td>
                             <?=$row['subs_id']?>
                          </td>
                          <td>
                              <?=$row['subs_email']?>
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

  <?php require 'layouts/footer.php'?>