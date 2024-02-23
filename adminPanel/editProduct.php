<?php
include('query.php');
include('header.php');
?>

            <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $query = $pdo->prepare("select products.* , categories.name as cName , categories.id as catId from products inner join categories on products.c_id = categories.id where products.id = :id");
                $query->bindParam('id',$id);
                $query->execute();
                $product = $query->fetch(PDO::FETCH_ASSOC);
            }            
            ?>
            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded  mx-0">
                    <div class="col-md-6 ">
                        <h3> Update Product</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="">Name</label>
                          <input type="text" value="<?php echo $product['name']?>" name="productName" id="" class="form-control" placeholder="" aria-describedby="helpId">       
                        </div>
                        <div class="form-group">
                          <label for="">Price</label>
                          <input type="text" value="<?php echo $product['price']?>"   name="productPrice" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                          <label for="">Quantity</label>
                          <input type="text" value="<?php echo $product['qty']?>"  name="productQty" id="" class="form-control" placeholder="" aria-describedby="helpId">
                         
                        </div>

                        <div class="form-group">
                          <label for="">Image</label>
                          <input type="file" name="productImage" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            <span><?php echo $product['image']?></span>
                        </div>
                        <div class="form-group">
                          <label for="">Description</label>
                          <input value="<?php echo $product['des']?>"  type="text" name="productDes" id="" class="form-control" placeholder="" aria-describedby="helpId">
                         
                        </div>

                        <div class="form-group">
                          <label for="">Select Category</label>
                          <select class="form-control"  name="cId" id="">
                            <option value="<?php echo $product['catId']?>"><?php echo $product['cName']?></option>
                <?php
                $query = $pdo->prepare("select * from categories where name != :catName");
                 $query->bindParam('catName',$product['cName']);
                            $query->execute();
                            $allCategories = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach($allCategories as $cat){
                            ?>
                            <option value="<?php echo $cat['id']?>"><?php echo $cat['name']?></option>
                                    <?php
                                    
                            }?>
                          </select>
                        </div>

                        <button name="updateProduct" class="btn mt-3 btn-primary" type="submit">Update Product</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Blank End -->


          <?php
          include('footer.php');
          ?>