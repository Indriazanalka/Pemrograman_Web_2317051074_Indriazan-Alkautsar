<?php
$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
    echo "File berhasil diupload.<br>";
    echo "Path file: " . htmlspecialchars($targetFile);
} else {
    echo "Maaf, terjadi kesalahan saat mengupload file.";
}
?>
