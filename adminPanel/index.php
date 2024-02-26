        <?php
        include('query.php');
        include('header.php');
        if(!isset($_SESSION['adminEmail'])){
            echo "<script>location.assign('signin.php')</script>";
        }
        ?>

            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today Sale</p>
                                <h6 class="mb-0"><?php 
                                $query = $pdo->query("SELECT SUM(p_price) as 'totalprice' FROM pendingorders");
                                $query->execute();
                                $price = $query->fetch(PDO::FETCH_ASSOC);
                                echo $price['totalprice']
                                ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">TotalCategories</p>
                                <h6 class="mb-0"><?php  
                                $query = $pdo->query("SELECT COUNT(id) as 'totalCategories' FROM categories");
                                $query->execute();
                                $categories = $query->fetch(PDO::FETCH_ASSOC);
                                echo $categories['totalCategories'] 
                                ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Products</p>
                                <h6 class="mb-0"><?php   $query = $pdo->query("SELECT COUNT(id) as 'totalProducts' FROM products");
                                $query->execute();
                                $products = $query->fetch(PDO::FETCH_ASSOC);
                                echo $products['totalProducts']?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Users</p>
                                <h6 class="mb-0"><?php 
                                $query = $pdo->query("SELECT COUNT(id) as 'totalUsers' FROM users");
                                $query->execute();
                                $users = $query->fetch(PDO::FETCH_ASSOC);
                                echo $users['totalUsers']
                                
                                
                                ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


 


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Salse</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Date</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = $pdo->query("select * from pendingorders");
                               $allOrders =  $query->fetchAll(PDO::FETCH_ASSOC);
                                foreach( $allOrders as $order){
                                ?>
                                <tr>
                                    <td><?php echo $order['dateTime']?></td>
                                    <td><?php echo $order['u_name']?></td>
                                    <td><?php echo $order['p_name']?></td>
                                    <td><?php echo $order['p_qty']?></td>
                                    <td>$<?php echo $order['p_price']?></td>
                                    <td><?php echo  $order['status']?></td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


       
<?php
include('footer.php');
?>