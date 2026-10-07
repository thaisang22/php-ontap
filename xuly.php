<?php
class xuly {
public function dangky($username,$password,$thongtin,$sothich) {
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
	
	setcookie('thongtin',$thongtin,time() + 86400*30,'/');
	setcookie('sothich',json_encode($sothich),time() + 86400*30,'/');

	return true;	
	
}	

public function dangnhap($username, $password)
    {
        if (
            isset($_SESSION['username']) &&
            isset($_SESSION['password']) &&
            $username == $_SESSION['username'] &&
            $password == $_SESSION['password']
        ) {
            $_SESSION['login'] = true;

            return true;
        }

        return false;
    }
	
	
public function dangxuat() {
	session_unset();
	session_destroy();
	return true;
	
}

public function uploadFile($file)
{
    if ($file['error'] != UPLOAD_ERR_OK) {
        return 'upload that bai';
    }

    // Giới hạn 5MB
    $maxsize = 5 * 1024 * 1024;

    if ($file['size'] > $maxsize) {
        return 'FILE KHONG DUOC QUA 5MB';
    }

    // Các loại file được phép
    $allowType = ['jpg', 'png', 'jpeg', 'pdf', 'doc'];

    $filename = $file['name'];

    // Lấy phần mở rộng
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    if (!in_array($ext, $allowType)) {
        return 'FILE KHONG PHU HOP';
    }

    // Đổi tên file
    $newname = 'vothaisang25001521' . '_' . rand(100, 999) . '.' . $ext;

    // Đường dẫn lưu file
    $uploadpath = 'uploads/' . $newname;

    // Upload
    if (move_uploaded_file($file['tmp_name'], $uploadpath)) {
        return 'upload thanh cong';
    }

    return 'upload that bai';
}
  // =========================
    // DOWNLOAD
    // =========================
    public function downloadFile($fileName)
    {
        $filePath = 'uploads/' . basename($fileName);

        if (!file_exists($filePath)) {
            echo "File không tồn tại";
            return;
        }

        // Thông báo cho trình duyệt tải file
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header(
            'Content-Disposition: attachment; filename="' .
            basename($fileName) .
            '"'
        );
        header('Content-Length: ' . filesize($filePath));

        readfile($filePath);
        exit;
    }


    // =========================
    // XÓA FILE
    // =========================
    public function deleteFile($fileName)
    {
        $filePath = 'uploads/' . basename($fileName);

        if (!file_exists($filePath)) {
            return "File không tồn tại";
        }

        if (unlink($filePath)) {
            return "Xóa file thành công";
        }

        return "Xóa file thất bại";
    }

}



?>