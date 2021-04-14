<?php include "header.php"; ?>


<?php
if (isset($_POST['submit'])) 
{
    
    include "config.php";
    $name = $_FILES['file']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extensions_arr = array("jpg","jpeg","png","gif");
    

    $post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
    $postdesc = mysqli_real_escape_string($conn, $_POST['postdesc']);
    $date = date("d/m/Y") ;
    echo $date;
    echo $name;
    if( in_array($imageFileType,$extensions_arr) ){
       
        $sql1 = "INSERT INTO post (title,description,post_date,post_img)
       VALUES('".$cat."','".$postdesc."','".$date."','".$name."')";
    }
    else
    {
        echo "Invalide Extension";
    }
    
        if(mysqli_query($conn, $sql1))
        {
            header("Location:{$hostname}/admin/users.php");
        }


}
?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Post</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="" method="POST" enctype="multipart/form-data" >
                      <div class="form-group">
                          <label for="post_title">Title</label>
                          <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="postdesc" class="form-control" rows="5"  required></textarea>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <select name="category" class="form-control">
                              <option value="" selected> Select Category</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Post image</label>
                          <input type="file" name="file" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
