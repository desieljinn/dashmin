<?php 
include('connection.php');

if(isset($_POST['Addcategory'])){
    $catname = $_POST['categoryName'];
    $catImage = $_FILES['categoryImage']['name'];
    $catTempName = $_FILES['categoryImage']['tmp_name'];
    $extension = pathinfo($catImage,PATHINFO_EXTENSION);
    $des = 'img/categories/'.$catImage;
    if($extension == "jpg" || $extension == "png" || $extension =="jpeg" || $extension == "webp"){
        if(move_uploaded_file($catTempName,$des)){
            $query = $pdo-> prepare("insert into category (catName,catImage) values(:pn,:pi)");
            $query->bindParam("pn",$catname);
            $query->bindParam("pi",$catImage);
            $query->execute();
            echo "<script>alert('category added')</script>";

        }
    }
}
?>