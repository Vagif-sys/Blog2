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
          <h3 class="card-title">Categories</h3>

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
            <a href='team_add.php?page=category'><button type='submit' class='btn btn-info btn-sm' 
                   style='float:right'>Add New Category</button></a>
              <thead>
                  <tr>
                      <th >
                          Row
                      </th>
                      <th >
                         Title
                      </th>
                      <th >
                          Status
                      </th>   
                      <th >
                          Published Date
                      </th>    
                  </tr>
              </thead>
              <tbody>
              <?php
              $category = $pdo->prepare("SELECT * FROM category ORDER BY cat_row ASC");
              $category->execute(array());
              while($row = $category->fetch(PDO::FETCH_ASSOC)){?>;
                      <tr>
                          <td>
                             <?=$row['cat_row']?>
                          </td>
                          <td>
                              <?=$row['cat_title']?>
                          </td>

                          <td >
                            <?php if($row['cat_status'] == '1'){?>
                                 <span class="badge badge-success">On</span>
                            <?php }else{ ?>

                              <span class="badge badge-danger">Off</span>
                          <?php } ?>  
                          </td>
                        
                          <td >
                             <?=$row['cat_date']?>
                          </td>
                          <td class="project-actions text-right">
                              <a class="btn btn-primary btn-sm" 
                                  href="content.php?catid=<?=$row['cat_id']?>">
                                  <i class="fas fa-folder">
                                  </i>
                                  View
                              </a>
                              <a href='edit_team.php?page=category&id=<?=$row['cat_id']?>'class="btn btn-info btn-sm" href="#">
                                  <i class="fas fa-pencil-alt">
                                  </i>
                                  Edit
                              </a>
                              
                                <a onClick="return confirm('Are you sure to delete this item')" class="btn btn-danger btn-sm" 
                                     href="insert.php?del_category&id=<?=$row['cat_id']?>">
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

  <?php require 'layouts/footer.php'?>