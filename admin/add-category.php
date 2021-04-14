<?php include "header.php"; ?>



<?php
if (isset($_POST['save'])) 
{

    include "config.php";
    $cat = mysqli_real_escape_string($conn, $_POST['cat']);

    $sql = "SELECT category_name FROM category WHERE category_name = '{$cat}'";
    $result = mysqli_query($conn, $sql) or die("Quary Failed");
    if(mysqli_num_rows($result) > 0)
    {
        
  
  
        echo "<p> category Already Exist</p>";
    }
    else
    {
        
        
        $sql1 = "INSERT INTO category (category_name)
       VALUES('".$cat."')";
        if(mysqli_query($conn, $sql1))
        {
            header("Location:{$hostname}/admin/users.php");
        }
    }

}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
