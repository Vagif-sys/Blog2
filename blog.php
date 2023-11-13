<?php require_once 'layouts/header.php';
?>
  
  <main id="main" data-aos="fade-in">

  <br><br>
    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
<?php
$blog = $pdo->prepare("SELECT * FROM  blog ORDER BY blog_row ASC");
$blog->execute(array()); 

while($row = $blog->fetch(PDO::FETCH_ASSOC)){?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="admin/assets/images/blog/<?=$row['blog_photo']?>" class="img-fluid" alt="...">
              <div class="course-content">
                
                  <h3><a href="blog-detail-<?=seo($row['blog_title']).'-'.$row['blog_id']?>"><?=$row['blog_title']?></a></h3>
                <p>
                  <?=$row['blog_desc'];
                   $limitdesc = substr($row['blog_desc'],0.50);
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