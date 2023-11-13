<? require_once 'layouts/header.php'; ?>
  <main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Trainers</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <?php
          $team = $pdo->prepare("SELECT * FROM team");
          $team->execute(array());
           while($row = $team->fetch(PDO::FETCH_ASSOC)){ ?>
          
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="admin/assets/images/team/<?=$row['team_photo']?>" class="img-fluid" alt="">
              <div class="member-content">
                <h4><?=$row['team_name']?></h4>
                <span><?=$row['team_postion']?></span>
                <p><?=$row['team_desc']?></p>
                <div class="social">
                  <a href="<?=$row['team_twitter']?>"><i class="icofont-twitter"></i></a>
                  <a href="<?=$row['team_facebook']?>"><i class="icofont-facebook"></i></a>
                  <a href="<?=$row['team_insta']?>"><i class="icofont-instagram"></i></a>
                  <a href="<?=$row['team_youtube']?>"><i class="icofont-youtube"></i></a>
                </div>
              </div>
            </div>
          </div>
          <?php }  ?>
        </div>

      </div>
    </section><!-- End Trainers Section -->

  </main><!-- End #main -->

<?php require_once 'layouts/footer.php' ?>