<?php
include('dbcon.php');
session_start();

// add category Work
        if(isset($_POST['addCategory'])){
            $cName = $_POST['categoryName'];
            $cDes = $_POST['categoryDes'];
             $imageName = $_FILES['categoryImage']['name'];
             $imageTmpName = $_FILES['categoryImage']['tmp_name'];
             $extension = pathinfo($imageName,PATHINFO_EXTENSION);
        //       print_r($extension);
             $destination = "img/".$imageName;
             if($extension == "jpg" || $extension  == "png" || $extension == "jpeg" || $extension == "webp"){
                        if(move_uploaded_file($imageTmpName , $destination)){
                              $query = $pdo->prepare("insert into categories (name, image, des) values (:cName  , :cImage, :cDes)");
                              $query->bindParam('cName',$cName);
                              $query->bindParam('cImage', $imageName);          
                              $query->bindParam('cDes',$cDes);
                              $query->execute();
                              echo "<script>alert('category added successfully');
                              location.assign('index.php')</script>";
                        }
             }
             else{
                echo "<script>alert('invalid extension');
                             </script>";
             }
            
        }


        // update category
        if(isset($_POST['updateCategory'])){
                $id = $_GET['id'];
                $cName = $_POST['categoryName'];
                $cDes = $_POST['categoryDes'];
                $query = $pdo->prepare("update categories set name = :cName , des = :cDes where id = :cId");
                if(isset($_FILES['categoryImage'])){
                        $cImageName = $_FILES['categoryImage']['name'];
                        $cImageTmpName = $_FILES['categoryImage']['tmp_name'];
                        $extension = pathinfo($cImageName,PATHINFO_EXTENSION);
                        $destination = "img/".$cImageName;
                        if($extension == "png" || $extension == "jpeg" || $extension == "jpg" || $extension == "webp"){
                                        if(move_uploaded_file($cImageTmpName,$destination)){
                                                        $query = $pdo->prepare("update categories set name = :cName , des = :cDes , image = :cImage where id = :cId");  
                                                        $query->bindParam('cImage',$cImageName);
                        
                                        }
                        }
                }
                                                        $query->bindParam('cName',$cName);
                                                        $query->bindParam('cDes',$cDes);
                                                        $query->bindParam('cId',$id);
                                                        $query->execute();
                                                        echo "<script>alert('category Updated Successfully');
                                                        </script>";
        }


        // add Product
        if(isset($_POST['addProduct'])){
                $productName = $_POST['productName'];
                $productPrice = $_POST['productPrice'];
                $productDes = $_POST['productDes'];
                $productQty = $_POST['productQty'];
                $cId = $_POST['cId'];
                $productImageName = $_FILES['productImage']['name'];
                $productImageTmpName = $_FILES['productImage']['tmp_name'];
                $extension = pathinfo($productImageName,PATHINFO_EXTENSION);
                $destination = "img/".$productImageName;
                if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "webp"){
                        if(move_uploaded_file($productImageTmpName ,$destination)){
                                        $query = $pdo->prepare("insert into products (name,price,image,des,qty,c_id) values (:pName,:pPrice,:pImage , :pDes, :pQty , :cId)");
                                        $query->bindParam('pName',$productName); 
                                        $query->bindParam('pImage',$productImageName);
                                        $query->bindParam('pDes',$productDes);
                                        $query->bindParam('pQty',$productQty);
                                        $query->bindParam('pPrice',$productPrice);
                                        $query->bindParam('cId',$cId);
                                        $query->execute();
                                        echo "<script>alert('product added Successfully');
                                        </script>";
                        }
                }
        }



        // edit product 
        if(isset($_POST['updateProduct'])){
                $id = $_GET['id'];
                $productName = $_POST['productName'];
                $productPrice = $_POST['productPrice'];
                $productQty = $_POST['productQty'];
                $productDes = $_POST['productDes'];
                $productcId = $_POST['cId'];
                $query  = $pdo->prepare("update products set name = :pName ,  price = :pPrice , des = :pDes , qty = :pQty , c_id = :cId where id = :id");
                if(isset($_FILES['productImage'])){
                $productImageName = $_FILES['productImage']['name'];
                $productImageTmpName = $_FILES['productImage']['tmp_name'];
                $extension = pathinfo($productImageName,PATHINFO_EXTENSION);
                $destination = "img/".$productImageName;
                if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "webp"){
                        if(move_uploaded_file($productImageTmpName, $destination)){
                                $query = $pdo->prepare("update products set name = :pName , image = :pImage , price = :pPrice , des = :pDes , qty = :pQty , c_id = :cId where id = :id");
                                $query->bindParam('pImage',$productImageName);
                        }
                } 
        }
        $query->bindParam('id',$id);
        $query->bindParam('pName',$productName);   
        $query->bindParam('pPrice',$productPrice);
        $query->bindParam('pQty',$productQty);
        $query->bindParam('pDes',$productDes);
        $query->bindParam('cId',$productcId);
        $query->execute();
        echo "<script>alert('product updated Successfully');
        </script>";
                
        }
?>