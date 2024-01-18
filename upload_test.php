<?php
$uploadPath = 'C:\xampp\htdocs\invla\assets/';

if (move_uploaded_file($_FILES['bukti_pembayaran']['tmp_name'], $uploadPath . $_FILES['bukti_pembayaran']['name'])) {
    echo 'File uploaded successfully.';
} else {
    echo 'Error uploading file.';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload Test</title>
</head>

<body>
    <form action="upload_test.php" method="post" enctype="multipart/form-data">
        <label for="bukti_pembayaran">Upload File:</label>
        <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" required>
        <button type="submit">Upload</button>
    </form>
</body>

</html>