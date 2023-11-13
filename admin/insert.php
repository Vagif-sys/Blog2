<?php
session_start();
ob_start();
session_start();
require 'connection.php';
if(isset($_POST['send'])){
    $title = htmlspecialchars($_POST['title']);
    $desc = htmlspecialchars($_POST['desc']);
    $keyword = htmlspecialchars($_POST['keyword']);
    $address = htmlspecialchars($_POST['address']);
    $phone = htmlspecialchars($_POST['phone']);
    var_dump($phone);
    $email = htmlspecialchars($_POST['email']);
   
    $sql = $pdo->prepare("UPDATE settings SET set_title=:title,
                         set_desc=:desc,set_keyword=:keyword,set_address=:address,
                         set_phone=:phone,set_email=:email ");
    $sql->execute(array(':title'=>$title,':desc'=>$desc,':keyword'=>$keyword,':address'=>$address,':phone'=>$phone,':email'=>$email));
   
    if($sql){

        header('location: settings.php?pagestatus=Edited');
    }else{

        header('location: settings.php?page&status=Failed');
    }
}



if(isset($_POST['socialmedia'])){

    
    $facebook = htmlspecialchars($_POST['facebook']);
    $insta = htmlspecialchars($_POST['insta']);
    $youtube = htmlspecialchars($_POST['youtube']);
    $twitter = htmlspecialchars($_POST['twitter']);
    
   
    $sql = $pdo->prepare("UPDATE settings SET set_facebook=:facebook,
                         set_insta=:insta,set_youtube=:youtube,set_twitter=:twitter");
    $sql->execute(array(':facebook'=>$facebook,':insta'=>$insta,':youtube'=>$youtube,':twitter'=>$twitter));
   
    if($sql){

        header('location: settings.php?page=socialmedia&status=Edited');
    }else{

        header('location: settings.php?page=socialmedia&status=Failed');
    } 
}


if(isset($_POST['aboutSend'])){

     if($_FILES['image']['size']>0){
            $dir= 'assets/images/';
            $tmp_name = $_FILES['image']['tmp_name'];
            $name = $_FILES['image']['name'];


            $count1 = rand(1,100000);
            $count2 = rand(1,100000);
            $counts = $count1.$count2;
            $imageName = $counts.$name;
            move_uploaded_file($tmp_name,"$dir$counts$name");

        
            $about_title =$_POST['title'];
            
            $about_desc = $_POST['desc'];
            

            $sql = $pdo->prepare("UPDATE about_us SET about_title=:title,
                                about_desc=:desc, about_image=:image");
            $sql->execute(array(':title'=>$about_title,':desc'=>$about_desc,':image'=>$imageName));
         
        if($sql){
           /*  $oldImage = $_POST['oldImage'];
            if(file_exists($oldImage)){
            unlink("$dir$oldImage");
            } */
            header('location: about.php?status=Edited');
        }else{
            header('location: about.php?tatus=Failed');
        }    
    }else{

        $about_title = htmlspecialchars($_POST['title']);
        $about_desc = $_POST['desc'];
        
   
       $sql = $pdo->prepare("UPDATE about_us SET about_title=:title,
                            about_desc=:desc");
       $sql->execute(array(':title'=>$about_title,':desc'=>$about_desc));
    }
}



if(isset($_POST['sliderSend'])){
    
    if($_FILES['image']['size']>0){
         $dir= 'assets/images/slider';
        
         $tmp_name = $_FILES['image']['tmp_name'];
         $name = $_FILES['image']['name'];
         
         
         $count1 = rand(1,100000);
         $count2 = rand(1,100000);
         $counts = $count1.$count2;
         $imageName = $counts.$name;
         move_uploaded_file($tmp_name,"$dir/$imageName");

   
       $slider_title = $_POST['title'];
       $slider_button = $_POST['button'];
       $slider_link = $_POST['link'];
       $slider_desc = $_POST['desc']; 
       

       $sql = $pdo->prepare("UPDATE slider SET slider_title=:title,
                           slider_desc=:desc, slider_button=:button,slider_link=:link,slider_image=:image");
       $sql->execute(array(':title'=>$slider_title,':desc'=>$about_desc, 
                           ':button'=>$slider_button,
                            ':link'=>$slider_link,':image'=>$imageName));
        
        if($sql){

            $oldImage = $_POST['oldImage'];

            if(file_exists($oldImage)){
                unlink("$dir/$oldImage");
            } 
           
            header('location: slider.php?status=Edited');
        }else{
            header('location: slider.php?status=Failed');
        }    
    }
    else{

        $slider_title = $_POST['title'];
        $slider_desc = $_POST['desc'];
        $slider_button = $_POST['button'];
        $slider_link = $_POST['link'];
        

        $sql = $pdo->prepare("UPDATE slider SET slider_title=:title,
                            slider_desc=:desc, slider_button=:button,slider_link=:link");
        $sql->execute(array(':title'=>$slider_title,':desc'=>$slider_desc,
                            ':button'=>$slider_button,
                            ':link'=>$slider_link));

        if($sql){
            header('location: slider.php?status=OK');
        }else{

            header('location: slider.php?status=something went wrong');
        }
    }
}






// insert  the  team members
if(isset($_POST['teamSend'])){
    $dir= 'assets/images/team';
        
    $tmp_name = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    
    
    $count1 = rand(1,100000);
    $count2 = rand(1,100000);
    $counts = $count1.$count2;
    $imageName = $counts.$name;
    move_uploaded_file($tmp_name,"$dir/$imageName");

    $team_name = htmlspecialchars($_POST['name']);
    
    $team_position = htmlspecialchars($_POST['position']);
    $team_row = htmlspecialchars($_POST['row']);
    $team_desc = htmlspecialchars($_POST['desc']);
    $team_facebook = htmlspecialchars($_POST['facebook']);
    $team_twitter = htmlspecialchars($_POST['twitter']);
    $team_insta = htmlspecialchars($_POST['insta']);
    $team_youtube = htmlspecialchars($_POST['youtube']);
  

    $sql = $pdo->prepare("INSERT INTO team(team_name,team_postion,
                       team_row,team_desc,
                       team_facebook,team_twitter,team_insta,team_youtube,team_photo) 
                       VALUE(?,?,?,?,?,?,?,?,?)");
    $insert=$sql->execute([$team_name, $team_position, $team_row, $team_desc,
                          $team_facebook, $team_twitter,$team_insta, $team_youtube,$imageName]);
    //$team_id = $pdo->lastInsertId();
    if($insert){

        header('location: team.php?page=team&status=Ok');
    }else{

        header('location: team.php?page=team&status=No');
    }
}


// Edit of Team Member
if(isset($_POST['editSend'])){
    
       if($_FILES['image']['size']>0){
         $dir= 'assets/images/team';
        
         $tmp_name = $_FILES['image']['tmp_name'];
         $name = $_FILES['image']['name'];
         
         
         $count1 = rand(1,100000);
         $count2 = rand(1,100000);
         $counts = $count1.$count2;
         $imageName = $counts.$name;
         move_uploaded_file($tmp_name,"$dir/$imageName"); 
        

        
        
        
         $team_name = htmlspecialchars($_POST['name']);
         $team_position = htmlspecialchars($_POST['position']);
         $team_row = htmlspecialchars($_POST['row']);
         $team_desc = htmlspecialchars($_POST['desc']);
         $team_facebook = htmlspecialchars($_POST['facebook']);
         $team_twitter = htmlspecialchars($_POST['twitter']);
         $team_insta = htmlspecialchars($_POST['insta']);
         $team_youtube = htmlspecialchars($_POST['youtube']);
         $team_id       = $_POST['id'];

        $edit_team = $pdo->prepare("UPDATE team SET team_name=:name,
                                    team_desc=:desc, team_postion=:position,
                                    team_row=:row,team_facebook=:facebook,
                                    team_twitter=:twitter,team_insta=:insta,
                                    team_youtube=:youtube,team_photo=:photo WHERE team_id=:team_id");
        $edit = $edit_team->execute(array(':name'=>$team_name,':desc'=>$team_desc,':position'=>$team_position,
                                ':row'=> $team_row,':facebook'=> $team_facebook,':twitter'=>$team_twitter,
                                 ':insta'=> $team_insta,':youtube'=>$team_youtube,':photo'=>$imageName,':team_id'=>$team_id));
        
        if($edit){

            $oldImage = $_POST['oldImage'];

            if(file_exists($oldImage)){
                unlink("$dir/$oldImage");
            } 
           
            header('location: team.php?status=Edited');
        }else{
            header('location: team.php?status=Failed');
        }    
    }
    else{

        $team_name = htmlspecialchars($_POST['name']);
        $team_position = htmlspecialchars($_POST['position']);
        $team_row = htmlspecialchars($_POST['row']);
        $team_desc = htmlspecialchars($_POST['desc']);
        $team_facebook = htmlspecialchars($_POST['facebook']);
        $team_twitter = htmlspecialchars($_POST['twitter']);
        $team_insta = htmlspecialchars($_POST['insta']);
        $team_youtube = htmlspecialchars($_POST['youtube']);
        $team_id      =$_POST['id'];

       $edit_team = $pdo->prepare("UPDATE team SET team_name=:name,
                                   team_desc=:desc, team_postion=:position,
                                   team_row=:row,team_facebook=:facebook,
                                   team_twitter=:twitter,team_insta=:insta,
                                   team_youtube=:youtube WHERE team_id =:team_id ");
       $edit = $edit_team->execute(array(':name'=>$team_name,':desc'=>$team_desc,':position'=>$team_position,
                               ':row'=> $team_row,':facebook'=> $team_facebook,':twitter'=>$team_twitter,
                                ':insta'=> $team_insta,':youtube'=>$team_youtube,':team_id'=>$team_id));

        if($edit){
            header('location: team.php?status=OK');
        }else{

            header('location: team.php?status=something went wrong');
        }
    } 
}
//Delete Team Member
if(isset($_POST['delete'])){

    $oldImage = $_POST['oldImage'];

    if(file_exists($oldImage)){
        unlink("$dir/$oldImage");
    }

    $del_team = $pdo->prepare("DELETE FROM team WHERE team_id=:team_id");
    $del_team->execute(array(':team_id'=> $_POST['id']));

    if($del_team){
        header('location: team.php?status=Ok');
    }else{
        header('location: team.php?status=somethig went  wrong');
    }
    
}


// insert of Photo Gallery
if(isset($_POST['galerySend'])){
    $dir= 'assets/images/galery';
        
    $tmp_name = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    
    
    $count1 = rand(1,100000);
    $count2 = rand(1,100000);
    $counts = $count1.$count2;
    $imageName = $counts.$name;
    move_uploaded_file($tmp_name,"$dir/$imageName");

    
    $galery_row = htmlspecialchars($_POST['row']);

    $sql = $pdo->prepare("INSERT INTO gallery(galery_row,galery_photo) 
                       VALUE(?,?)");
    $insert=$sql->execute([ $galery_row,$imageName]);
    //$team_id = $pdo->lastInsertId();
    if($insert){

        header('location: gallery.php?page=gallery&status=Added');
    }else{

        header('location: gallery.php?page=gallery&status=Failed');
    }
}



// Edit of Photo Gallery
if(isset($_POST['galerySend'])){
    
    if($_FILES['image']['size']>0){
            $dir= 'assets/images/galery';
            
            $tmp_name = $_FILES['image']['tmp_name'];
            $name = $_FILES['image']['name'];
            
            
            $count1 = rand(1,100000);
            $count2 = rand(1,100000);
            $counts = $count1.$count2;
            $imageName = $counts.$name;
            move_uploaded_file($tmp_name,"$dir/$imageName"); 
            
            $galery_row = htmlspecialchars($_POST['row']);
        
            $edit_galery = $pdo->prepare("UPDATE gallery SET galery_row=:row, galery_photo=:photo WHERE galery_id={$_POST['id']}");
            $edit = $edit_galery->execute(array(':row'=> $galery_row,':photo'=>$imageName));
            
            if($edit){

                $oldImage = $_POST['oldImage'];

                if(file_exists($oldImage)){
                    unlink("$dir/$oldImage");
                } 
                
                header('location: gallery.php?status=Edited');
            }else{
                header('location: gallery.php?status=Failed');
            }    
    }else{

        $galery_row = htmlspecialchars($_POST['row']);
            
        
        $edit_galery = $pdo->prepare("UPDATE gallery SET galery_row=:row WHERE galery_id={$_POST['id']}");
        $edit = $edit_galery->execute(array(':row'=> $galery_row));
            

        if($edit){
            header('location: gallery.php?=gallery&status=OK');
        }else{

            header('location: gallery.php?=status=something went wrong');
        }
    } 
}
//Delete Team Member
if(isset($_POST['delete'])){

 $oldImage = $_POST['oldImage'];

 if(file_exists($oldImage)){
     unlink("$dir/$oldImage");
 }



 $del_galery = $pdo->prepare("DELETE FROM gallery WHERE galery_id=:galery_id");
 $del_galery->execute(array(':galery_id'=> $_POST['id']));

 if($del_galery){
     header('location: gallery.php?status=Deleted');
 }else{
     header('location: gallery.php?status=somethig went  wrong');
 }
 
}



// insert  Blog 
if(isset($_POST['blogSend'])){
    $dir= 'assets/images/blog';
        
    $tmp_name = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    
    
    $count1 = rand(1,100000);
    $count2 = rand(1,100000);
    $counts = $count1.$count2;
    $imageName = $counts.$name;
    move_uploaded_file($tmp_name,"$dir/$imageName");

    $blog_title = htmlspecialchars($_POST['title']);
    
    $blog_row = htmlspecialchars($_POST['row']);
    $blog_desc = htmlspecialchars($_POST['desc']);
    $blog_keyword = htmlspecialchars($_POST['keyword']);
    $user_id = 1;
    
    
    
  

    $blog = $pdo->prepare("INSERT INTO blog(blog_title,
                       blog_row,blog_desc,
                       blog_keyword,blog_photo,user_id) 
                       VALUE(?,?,?,?,?,?)");
    $insert=$blog->execute([$blog_title, $blog_row, $blog_desc,
                          $blog_keyword, $imageName,$user_id]);
    
    //$team_id = $pdo->lastInsertId();
    if($insert){

        header('location: blog.php?status1=Added');
    }else{

        header('location: blog.php?status=Failed');
    }
}



// Edit of Team Member
 if(isset($_POST['editSend'])){
    
        if($_FILES['image']['size']>0){
                $dir= 'assets/images/blog';
                
                $tmp_name = $_FILES['image']['tmp_name'];
                $name = $_FILES['image']['name'];
                
                
                $count1 = rand(1,100000);
                $count2 = rand(1,100000);
                $counts = $count1.$count2;
                $imageName = $counts.$name;
                move_uploaded_file($tmp_name,"$dir/$imageName"); 
                

                
                
                
                $blog_title = htmlspecialchars($_POST['title']);
                
                $blog_row = htmlspecialchars($_POST['row']);
                $blog_desc = htmlspecialchars($_POST['desc']);
                $blog_keyword = htmlspecialchars($_POST['keyword']);
                
                

                $edit_blog = $pdo->prepare("UPDATE blog SET blog_title=:title,
                                            blog_desc=:desc, blog_keyword=:keyword,
                                            blog_row=:row blog_photo=:photo WHERE blog_id = {$_POST['id']}");
                $edit = $edit_blog->execute(array(':title'=>$blog_title,':desc'=>$blog_desc,':keyword'=>$blog_keyword,
                                        ':row'=> $blog_row,':photo'=>$imageName));
            
                if($edit){

                    $oldImage = $_POST['oldImage'];

                    if(file_exists($oldImage)){
                        unlink("$dir/$oldImage");
                    } 
                
                    header('location: blog.php?status3=Edited');
                }else{
                    header('location: blog.php?status=Failed');
                }          
        }else{
            $blog_title = htmlspecialchars($_POST['title']);
            
            $blog_row = htmlspecialchars($_POST['row']);
            $blog_desc = htmlspecialchars($_POST['desc']);
            $blog_keyword = htmlspecialchars($_POST['keyword']);
            
            

            $edit_blog = $pdo->prepare("UPDATE blog SET blog_title=:title,
                                        blog_desc=:desc, blog_keyword=:keyword,
                                        blog_row=:row WHERE blog_id={$_POST['id']} ");
            $edit = $edit_blog->execute(array(':title'=>$blog_title,':desc'=>$blog_desc,':keyword'=>$blog_keyword,
                                    ':row'=> $blog_row));

            if($edit){
                header('location: blog.php?status=OK');
            }else{

                header('location: blog.php?status=something went wrong');
            }
        } 
} 


if(isset($_POST['delete'])){

    $oldImage = $_POST['oldImage'];

    if(file_exists($oldImage)){
        unlink("$dir/$oldImage");
    }

    $del_blog = $pdo->prepare("DELETE FROM blog WHERE blog_id=:blog_id");
    $del_blog->execute(array(':blog_id'=> $_POST['id']));

    if($del_blog){
        header('location: blog.php?status2=Deleted');
    }else{
        header('location: blog.php?status=something went  wrong');
    }
    
}



// insert  Category
if(isset($_POST['catInsertSend'])){
    

    $cat_title = htmlspecialchars($_POST['title']);
    
    $cat_row = htmlspecialchars($_POST['row']);
   
    $cat_status = htmlspecialchars($_POST['status']);
    

    $category = $pdo->prepare("INSERT INTO category(cat_title,cat_row, cat_status) 
                           VALUE(?,?,?)");
    $insert=$category->execute([$cat_title, $cat_row, $cat_status]);
    
    //$team_id = $pdo->lastInsertId();
    
    if($insert){

        header('location: category.php?status1=Added');
    }else{

        header('location: category.php?status=Failed');
    } 
}

if(isset($_POST['catEditSend'])){
        
        $cat_title = htmlspecialchars($_POST['title']);        
        $cat_row = htmlspecialchars($_POST['row']);
        $cat_status = htmlspecialchars($_POST['status']);
        



        $edit_category = $pdo->prepare("UPDATE  category SET cat_title=:title,
                                    cat_row=:row, cat_status=:status
                                     WHERE cat_id={$_POST['id']} ");
        $edit = $edit_category->execute(array(':title'=>$cat_title,':row'=>$cat_row,
                                ':status'=> $cat_status));
        
        if($edit){
            header('location: category.php?status3=Edited');
        }else{

            header('location: category.php?status=something went wrong');
        } 
}


if(isset($_GET['del_category'])){


    $del_category = $pdo->prepare("DELETE FROM category WHERE cat_id=:cat_id");
    $del_category->execute(array(':cat_id'=> $_GET['id']));

    if($del_category){
        header('location: category.php?status2=Deleted');
    }else{
        header('location: category.php?status=something went  wrong');
    }
    
}



// insert  Content
if(isset($_POST['contentSend'])){
    $catid = $_POST['catid'];
    $dir= 'assets/images/content';
        
    $tmp_name = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    
    
    $count1 = rand(1,100000);
    $count2 = rand(1,100000);
    $counts = $count1.$count2;
    $imageName = $counts.$name;
    move_uploaded_file($tmp_name,"$dir/$imageName");

    $content_title = htmlspecialchars($_POST['title']);
    $content_row = htmlspecialchars($_POST['row']);
    $content_desc = htmlspecialchars($_POST['desc']);
    $content_keyword = htmlspecialchars($_POST['keyword']);
    
    
  

    $sql = $pdo->prepare("INSERT INTO content(content_title,
                         content_row,content_desc,
                         content_keyword, cat_id, content_photo) 
                       VALUE(?,?,?,?,?,?)");
    $insert=$sql->execute([$content_title,  $content_row, $content_desc,
                          $content_keyword,$catid,$imageName]);
    //$team_id = $pdo->lastInsertId();
    
    if($insert){

        header("location: content.php?catid=$catid&status=Added");
    }else{

        header("location: content.php?catid=$catid&status=Something went wrong!");
    }
}

// deleting content 
if(isset($_POST['del_content'])){
    $catid = $_POST['catid'];
    $oldImage = $_POST['oldImage'];

    if(file_exists($oldImage)){
        unlink("$dir/$oldImage");
    }

    $del_content = $pdo->prepare("DELETE FROM content WHERE content_id=:content_id");
    $del_content->execute(array(':content_id'=> $_POST['id']));

    if($del_content){
        header("location: content.php?catid=$catid&status2=Deleted");
    }else{
        header("location: content.php?catid=$catid&status=something went  wrong");
    }
    
}



// Edit Content
if(isset($_POST['contentEditSend'])){
    $catid = $_POST['catid'];
    if($_FILES['image']['size']>0){
      $dir= 'assets/images/content';
     
      $tmp_name = $_FILES['image']['tmp_name'];
      $name = $_FILES['image']['name'];
      
      
      $count1 = rand(1,100000);
      $count2 = rand(1,100000);
      $counts = $count1.$count2;
      $imageName = $counts.$name;
      move_uploaded_file($tmp_name,"$dir/$imageName"); 
     

     
     
     
      $content_title = htmlspecialchars($_POST['title']);
      $content_row = htmlspecialchars($_POST['row']);
      $content_desc = htmlspecialchars($_POST['desc']);
      $content_keyword = htmlspecialchars($_POST['keyword']);
      
    
      $sql = $pdo->prepare("UPDATE content SET content_title=:title,
                            content_row=:row,content_desc=:desc,
                            content_keyword=:keyword, cat_id=:cat_id, content_photo=:photo) 
                             WHERE content_id={$_POST['id']}");
      $edit=$sql->execute(array(':title'=>$content_title, ':row'=>$content_row, ':desc'=>$content_desc,
                                ':keyword'=>$content_keyword, ':cat_id'=>$_POST['catid'],':photo'=>$imageName));
     
     if($edit){
         
         $oldImage = $_POST['oldImage'];

         if(file_exists($oldImage)){
             unlink("$dir/$oldImage");
         } 
        
         header("location: content.php?catid=$catid&status3=Edited");
     }else{
         header("location: content.php?catid=$catid&status=Failed");
     }    
 }
 else{

    $content_title = htmlspecialchars($_POST['title']);
    $content_row = htmlspecialchars($_POST['row']);
    $content_desc = htmlspecialchars($_POST['desc']);
    $content_keyword = htmlspecialchars($_POST['keyword']);
    

    $sql = $pdo->prepare("UPDATE content SET content_title=:title,
                          content_row=:row,content_desc=:desc,
                          content_keyword=:keyword, cat_id=:cat_id WHERE content_id={$_POST['id']}) 
                           ");
    $edit=$sql->execute(array(':title'=>$content_title, ':row'=>$content_row, ':desc'=>$content_desc,
                              ':keyword'=>$content_keyword,':cat_id'=>$_POST['catid']));

     if($edit){
         header("location: content.php?catid=$catid&status=OK");
     }else{

         header("location: content.php?catid=$catid&status=something went wrong");
     }
 } 
}

// insert  Subscriber
if(isset($_POST['subscribe'])){
    

    $subs_email = htmlspecialchars($_POST['email']);
    
    $sql = $pdo->prepare("INSERT INTO subscriber(subs_email) 
                           VALUE(:email)");
    $insert=$sql->execute(array(':email'=> $subs_email));
    
    //$team_id = $pdo->lastInsertId();
   
    if($insert){

        header('location: ../contact.php?status1=Added');
    }else{

        header('location: ../contact.php?status=Failed');
    } 
}


// insert  Comments
if(isset($_POST['blogComment'])){
    
    $link = $_SERVER['HTTP_REFERER'];
    
    
    $comm_category = htmlspecialchars($_POST['category']);
    
    $content_id = htmlspecialchars($_POST['id']);
   
    $comm_name_surname = htmlspecialchars($_POST['name_surname']);
    $comm_detail = htmlspecialchars($_POST['detail']);
    

    $comment = $pdo->prepare("INSERT INTO comments(comment_category,content_id, 
                               comment_name_surname,comment_desc) 
                               
                               VALUE(?,?,?,?)");
    $insert=$comment->execute([$comm_category, $content_id, 
                                  $comm_name_surname,$comm_detail]);
    
    //$team_id = $pdo->lastInsertId();
    
    if($insert){

        header("location: $link?status1=Added");
    }else{

        header("location: $link?status=Failed");
    }    
}



//Approve  Comments
if (isset($_GET['approve'])) {

    $comm_update=$pdo->prepare("UPDATE comments SET 
    comment_approve=:approve
    
    WHERE comment_id={$_GET['id']}
    
        ");
    $update=$comm_update->execute(array(

    ':approve'=>1
    ));
   
    if ($update) {
    Header("Location:comments.php?status1=Approved");
    }else{
        Header("Location:comments.php?status=no");
    }
    
    }
    
    
    
    if (isset($_GET['delete'])) {
    
    $del=$pdo->prepare("DELETE  FROM comment where comment_id=:comment");
    $pdo->execute(array(
    
    'comment'=>$_GET['id']
    ));
    
    if ($del) {
    Header("Location:comments.php?durum=OK");
    }else{
        Header("Location:comments.php?durum=NO");
    }
    
    } 



    if(isset($_POST['contentComment'])){
    
        $link = $_SERVER['HTTP_REFERER'];
        
        
        $comm_category = htmlspecialchars($_POST['category']);
        
        $content_id = htmlspecialchars($_POST['id']);
       
        $comm_name_surname = htmlspecialchars($_POST['name_surname']);
        $comm_detail = htmlspecialchars($_POST['detail']);
        
    
        $comment = $pdo->prepare("INSERT INTO comments(comment_category,content_id, 
                                   comment_name_surname,comment_desc) 
                                   
                                   VALUE(?,?,?,?)");
        $insert=$comment->execute([$comm_category, $content_id, 
                                      $comm_name_surname,$comm_detail]);
        
        //$team_id = $pdo->lastInsertId();
       
        if($insert){
    
            header("location: $link?status1=Added");
        }else{
    
            header("location: $link?status=Failed");
        }    
    }


    if(isset($_POST['login'])){

        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $md5  = md5($password);
       
        $user = $pdo->prepare("SELECT * FROM users 
                             WHERE user_email=:email and user_password=:password");
        $user->execute(array(':email'=>$email,':password'=>$md5));
        $row = $user->rowCount();
        if($row==0){
          header('location: login.php?status=Error');
        }else{
            $_SESSION['email']=$email;
            header('location: settings.php?status=Success');
        }

    }