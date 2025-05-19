<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Image</title>
</head>
<body>
    <h2>Upload an Image</h2>
    <form action="upload_process.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*" required>
        <button type="submit">Upload</button>
    </form>

    <?php
date_default_timezone_set('Africa/Johannesburg');
echo "PHP time: " . date('Y-m-d H:i:s');
?>

</body>
</html>
