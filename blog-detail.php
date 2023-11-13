<?php 
require 'layouts/header.php';
$blog = $pdo->prepare("SELECT * FROM blog WHERE blog_id =:blog_id");
$blog->execute(array('blog_id'=>$_GET['blog_id']));
$row_blog = $blog->fetch(PDO::FETCH_ASSOC);
?>

  <main id="main">
<br><br>
    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-8">
            <img src="admin/assets/images/blog/<?=$row_blog['blog_photo']?>" class="img-fluid" alt="">
            <h3><?=$row_blog['blog_title']?></h3>
            <p>
              <?=$row_blog['blog_desc']?>
            </p>
            <?php
             $comments=$pdo->prepare("SELECT * FROM comments  
                                    where comment_category=:category 
                                    and content_id=:content and comment_approve=:approve");
            $comments->execute(array(
            ':category'=>1,
            ':content' => $_GET['blog_id'],
            ':approve'=> 1 
            
            ));
            while($row=$comments->fetch(PDO::FETCH_ASSOC)) { ?>    
            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Author:<?=$row['comment_name_surname']?></h5>
              <p> <?=$row['comment_desc']?></p>
            </div>
            <?php }  ?>
            <form action="admin/insert.php" method="post" >
          <div class="form-row">
            <div class="col-md-6 form-group">
              <input type="text" name="name_surname" class="form-control"  placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
           
          </div>
          
          <div class="form-group">
            <textarea class="form-control" name="detail" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
            <div class="validate"></div>
          </div>
         <!--  <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div> -->
           <input type="hidden" name='id' value='<?=$row['blog_id']?>' />
           <input type="hidden" name='category' value='1' />
          <div class="text-center"><button name='blogComment' class='btn btn-info' type="submit">Send Message</button></div>
        </form>
          </div>
         
          <div class="col-lg-4">

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Author</h5>
              <p>Malik</p>
            </div>
            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Email Address:</h5>
              <p>westlife-007@hotmail.com</p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Published date:</h5>
              <p><?=$row_blog['blog_date']?></p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End Cource Details Section -->

   

  </main><!-- End #main -->

  <?php require_once 'layouts/footer.php'; ?>