<?php
require 'layouts/header.php';
$slider = $pdo->prepare("SELECT * FROM slider WHERE slider_id = ?");
$slider->execute(array(1));
$row = $slider->fetch(PDO::FETCH_ASSOC);

?>


  <section style="background-image:url(admin/assets/images/slider/<? echo $row['slider_image']?>)"
  id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1><?=$row['slider_title']  ?></h1>
      <h2><?=$row['slider_desc']  ?></h2>
      <a href="<?=$row['slider_link']  ?>" class="btn-get-started"><?=$row['slider_button']  ?></a>
    </div>
  </section>

  <main id="main">

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

  <?php
require 'layouts/footer.php';
  ?>