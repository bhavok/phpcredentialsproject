<!DOCTYPE html>
<html>
<head>
  <h1 align="center">File Upload Page</h1>
  <h5 align="center">Upload a file of PDF, PNG, JPG, JPEG format only. Size limit-1MB only</h5>
  <title></title>
</head>
  <body>
    <form action="upload.inc.php" method="post" enctype="multipart/form-data" target="iframe" >
    <p align="center">  <input  type="file" name="file" >
            <button align="center" type="submit" name="submit" >UPLOAD PHOTO</button><br>
    </p></form>
  <p align="center">  <iframe name="iframe" > </iframe>
  </p><br>
</body>
</html>
