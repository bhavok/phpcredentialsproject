<?php

if (isset($_POST['submit'])){
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg','jpeg' , 'png' , 'pdf' );

    if (in_array($fileActualExt, $allowed)) {
       if ($fileError === 0) {if ($fileSize < 1000000) {
           $fileNameNew = uniqid('bhavok.2019', true). "." .$fileActualExt;
           $fileDestination = 'uploads/' . $fileNameNew;
           move_uploaded_file($fileTmpName, $fileDestination);
           echo "upload success";
           // echo '<a href = 'uploads/' , '$_FILES['file']['name'] >View Image </a>;
           //  echo "$file";
           //not able to operate header function"->  header("location : img.php?uploadsuccess");
          } else {
           echo "your file is too big";
         }
     } else {
        echo "Image upload failed. Please check size limit & try again.";
      }
      } else {
  echo "You can not upload files of this type.";
      }
}
 ?>
