<?php
include('query.php');
include('header.php');
?>

            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 ">
                        <h3> View Product</h3>
                       `<table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Des</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Action</th> 
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = $pdo->query("select products.* , categories.name as cName , categories.id as catId from products inner join categories on products.c_id = categories.id");
                            $allProducts = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach($allProducts as $product){
                            ?>
                            <tr>
                                <td><?php echo $product['name'] ?></td>
                                <td><?php echo $product['des'] ?></td>
                                <td><?php echo $product['price'] ?></td>
                                <td><?php echo $product['qty'] ?></td>
                                <td><?php echo $product['cName'] ?></td>
                                <td><img height="100px" src="img/<?php echo $product['image']?>" alt=""></td>
                                <td><a class="btn btn-info" href="editProduct.php?id=<?php echo $product['id']?>">Edit</a></td>
                                <td><a class="btn btn-danger" href="?did=<?php echo $product['id']?>">Delete</a></td>
                            </tr>
                           <?php
                           }
                           ?>

                        </tbody>
                       </table>
                    </div>
                </div>
            </div>
            <!-- Blank End -->


          <?php
          include('footer.php');
          ?>