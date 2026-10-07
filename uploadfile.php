<?php

// =========================
// UPLOAD
// =========================

if (isset($_POST['btnupload'])) {

    if (isset($_FILES['fileUpload'])) {

        $result = $xuly->uploadFile(
            $_FILES['fileUpload']
        );

        echo "<p>$result</p>";
    }
}

if ($page == 'download') {

    if (!isset($_SESSION['login'])) {
        echo "Bạn chưa đăng nhập";
        exit;
    }

    if (isset($_GET['file'])) {

        $fileName = $_GET['file'];

        $xuly->downloadFile($fileName);
    }

    exit;
}
// =========================
// XÓA FILE
// =========================

if (isset($_GET['delete'])) {

    $fileName = $_GET['delete'];

    $result = $xuly->deleteFile($fileName);

    echo "<p>$result</p>";
}

?>

<h2>Upload file</h2>

<form method="post" enctype="multipart/form-data">

    <input type="file" name="fileUpload">

    <br><br>

    <button type="submit" name="btnupload">
        Upload
    </button>

</form>


<hr>


<h2>Danh sách file</h2>

<?php

$files = scandir('uploads');
foreach ($files as $file) {
    if ($file == '.' || $file == '..') {
        continue;
    }
    echo $file;
    echo " | ";
    echo '<a href="index.php?page=download&file=' . $file . '"> Download </a>';
    echo " | ";
    echo '<a href="index.php?page=uploadfile&delete=' . $file . '"> Xoa </a>';
    echo "<br>";
} ?>