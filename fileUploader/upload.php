<?php
if (isset($_POST['submit'])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError == 0) {
            if ($fileSize < 2000000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/' .$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                
                echo "<h1>upload successful</h1><br>" . "<p>File Name: $fileName</p>" . "<p>File Type: $fileType" . "<p>File Size: $fileSize</p>";
                
            } else {
                echo "Your file is to big!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "you cannot upload files of this type";
    }
}
?>