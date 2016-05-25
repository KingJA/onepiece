<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="../service/doUpload.php" method="post"
      enctype="multipart/form-data">
    <input type="file" name="myfile" id="file"/><br>
    <input type="hidden" name="MAX_FILE_SIZE" value="100">
    <input type="submit" name="submit" value="上传"/>
</form>
</body>
</html>