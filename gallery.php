<?php require_once 'layouts/header.php';?>

  <main id="main" data-aos="fade-in">

 
     <br><br>
    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
        <?php  
        
        $galery = $pdo->prepare("SELECT * FROM gallery ORDER BY galery_row ASC");
        $galery->execute(array());
         while($row = $galery->fetch(PDO::FETCH_ASSOC)){ ?>
    
          <div  style='margin-top:10px'class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="admin/assets/images/galery/<?=$row['galery_photo']?>" class="img-fluid" alt="...">
              
            
            </div>
           
          </div> <!-- End Course Item-->
          <?php }?> 

          

   
           
              
               
          

        </div>
        
      </div>
    </section><!-- End Courses Section -->

  </main><!-- End #main -->

 <?php require_once 'layouts/footer.php'  ?>