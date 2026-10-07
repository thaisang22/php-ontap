<?php
if(isset($_POST['btndangky'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$thongtin = $_POST['thongtin'];
	$sothich = $_POST['sothich'] ?? [];	
	if($sothich == [] || $thongtin == '') { 
		echo "<p> vui long tich chon so thich va dien thong tin </p>";
	}
	
	if($username == '' || $password == '') {
		echo "<p> Vui long nhap userame va password</p>";
	} else {
		$xuly->dangky($username,$password,$thongtin,$sothich);
		echo "dang ky thanh cong";	
	}
	
}

?>
<h1>DANG KY </h1>
<form action="" method="post"> 
<label> username </label> 
<input type="text" name="username"> <br>
<label>password</label>
<input type="password" name="password"> <br>
<label>thongtin</label>
<input type="text" name="thongtin"><br>
<label>sothich</label>
<input type="checkbox" name="sothich[]" value="da banh"> da banh <br> 
<input type="checkbox" name="sothich[]" value="boi"> boi <br>
<input type="checkbox" name="sothich[]" value="cau long"> cau long<br>
<br>
<button type="submit" name="btndangky">Dang ky </button>
</form>