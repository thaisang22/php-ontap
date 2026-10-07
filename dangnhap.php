<?php
if(isset($_POST['btndangnhap'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	if($xuly->dangnhap($username,$password)) {
		header("Location: index.php?page=home");
		exit;
	} else {
		echo "sai thong tin dang nhap";	
	}
	
}

?>
<h1>dang nhap </h1>
<form action="" method="post">

  <p>
      <label> ten dang nhap </label>
  </p>
  <p>
    <input type="text" name="username">
    <br>
    <label> password </label>
  </p>
  <p>
    <input type="password" name="password">
  </p>
  <button type="submit" name="btndangnhap">Dang nhap</button>
</form>