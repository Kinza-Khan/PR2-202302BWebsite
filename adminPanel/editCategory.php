<?php
include('query.php');
include('header.php');
?>
            <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $query = $pdo->prepare("select * from categories where id = :id");
                $query->bindParam('id',$id);
                $query->execute();
                $cat = $query->fetch(PDO::FETCH_ASSOC);
                // print_r($cat);
            }
            ?>
            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6">
                        <h3> Edit Category</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="">Name</label>
                          <input type="text" value="<?php echo   $cat['name']?>" name="categoryName" id="" class="form-control" placeholder="" aria-describedby="helpId">
                         
                        </div>
                        <div class="form-group">
                          <label for="">Image</label>
                          <input type="file" value="<?php echo   $cat['image']?>" name="categoryImage" id="" class="form-control" placeholder="" aria-describedby="helpId">
                         <span><?php echo   $cat['image']?> </span>
                        </div>
                        <div class="form-group">
                          <label for="">Description</label>
                          <input value="<?php echo   $cat['des']?>" type="text" name="categoryDes" id="" class="form-control" placeholder="" aria-describedby="helpId">
                         
                        </div>
                        <button name="updateCategory" class="btn btn-info mt-3" type="submit">Update Category</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Blank End -->


          <?php
          include('footer.php');
          ?>