<?php
include('query.php');
include('header.php');
?>
            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded  mx-0">
                    <div class="col-md-6 ">
                        <h3> Add Product</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="">Name</label>
                          <input type="text" name="productName" id="" class="form-control" placeholder="" aria-describedby="helpId">
                         
                          
                        </div>
                        <div class="form-group">
                          <label for="">Price</label>
                          <input type="text" name="productPrice" id="" class="form-control" placeholder="" aria-describedby="helpId">
                         
                        </div>
                        <div class="form-group">
                          <label for="">Quantity</label>
                          <input type="text" name="productQty" id="" class="form-control" placeholder="" aria-describedby="helpId">
                         
                        </div>

                        <div class="form-group">
                          <label for="">Image</label>
                          <input type="file" name="productImage" id="" class="form-control" placeholder="" aria-describedby="helpId">
                         
                        </div>
                        <div class="form-group">
                          <label for="">Description</label>
                          <input type="text" name="productDes" id="" class="form-control" placeholder="" aria-describedby="helpId">
                         
                        </div>

                        <div class="form-group">
                          <label for="">Select Category</label>
                          <select class="form-control" name="cId" id="">
                            <option>Select Category</option>
                            <?php
                            $query = $pdo->query("select * from categories");
                            $allCategories = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach($allCategories as $cat){
                            ?>
                            <option value="<?php echo $cat['id']?>"><?php echo $cat['name']?></option>
                                    <?php
                                    
                            }?>
                          </select>
                        </div>

                        <button name="addProduct" class="btn mt-3 btn-primary" type="submit">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Blank End -->


          <?php
          include('footer.php');
          ?>