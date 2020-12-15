<?php 

if (isset($_POST['submit'])) {
    
    $file = $_FILES['product_image'];

    $fileName = $_FILES['product_image']['name'];
    $fileTmpName = $_FILES['product_image']['tmp_name'];
    $fileSize = $_FILES['product_image']['size'];
    $fileError = $_FILES['product_image']['error'];
    $fileType = $_FILES['product_image']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) {
                $fileNameNew = $fileName;
                    $fileDestination = '../../images/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    header("location: dog-index.php");
            } else {
                echo "your file is too big!";
            }
        } else {
            echo "there was an error uploading your file!";
        }
    } else {
        echo "you cannot upload files of this type!";
    }
}
?>