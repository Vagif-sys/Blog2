<?php require_once 'layouts/header.php';

?>
  
  <main id="main" data-aos="fade-in">

  <br><br>
    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
<?php
$content = $pdo->prepare("SELECT * FROM  content WHERE cat_id=:cat_id ORDER BY content_row ASC");
$content->execute(array(':cat_id'=>$_GET['cat_id'])); 
while($row = $content->fetch(PDO::FETCH_ASSOC)){?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="admin/assets/images/content<?=$row['content_photo']?>" class="img-fluid" alt="...">
              <div class="course-content">
                
                  <h3><a href="content-detail-<?=seo($row['content_title']).'-'.$row['content_id']?>"><?=$row['content_title']?></a></h3>
                <p>
                  <?=$row['content_desc'];
                   $limitdesc = substr($row['content_desc'],0.50);
                   echo $limitdesc;
                  ?>
                  
                </p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                    <span>Antonio</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i>&nbsp;50
                    &nbsp;&nbsp;
                    <i class="bx bx-heart"></i>&nbsp;65
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->
<?php }  ?>
        </div>

      </div>
    </section><!-- End Courses Section -->

  </main><!-- End #main -->

  <?php require_once 'layouts/footer.php'?>