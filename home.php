<?
//cr.panupong niyakit //
session_start();
include('class.truewallet.php');
error_reporting(error_reporting() & ~ E_NOTICE);
$user = $_POST['username'];
$pass = $_POST['password'];
$_SESSION['user'] = $user;
$_SESSION['pwd'] = $pass;
$numbertrue = $_POST['cut']; //รหัสบัตรทรู
if($_SESSION['user']){
$wallet = new TrueWallet($_SESSION['user'],$_SESSION['pwd'],'email');
$wallet->GetToken();
$token = json_decode($wallet->GetToken(),true)['data']['accessToken']; 
$wallet->Profile($token);
$fullname = json_decode($wallet->Profile($token),true)['data']['fullname'];
$email = json_decode($wallet->Profile($token),true)['data']['email'];   //แสดงชื่อของบัญชี email
$monney = json_decode($wallet->Profile($token),true)['data']['currentBalance']; 
$fomat_number = number_format($monney ,2 , '.' , '');
}else
{
	header('Location: index.php');
}
 //แสดงผล

?>

<html><head>
    <meta charset="utf-8">
    <title>TrueWallet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://www.devexp.club/wallet/favicon.ico" rel="shortcut icon" />
	<link href="https://www.devexp.club/wallet/css/bootstrap.min.css" rel="stylesheet" />
	<link href="https://www.devexp.club/wallet/css/style.css" rel="stylesheet" /><script src="https://www.devexp.club/wallet/js/bootstrap.min.js"></script><script src="js/google.js"></script>
</head>
  <body>

    <div class="container">
      <div class="form-user">
        <img src="https://wallet.truemoney.com/v1web/assets/images/wallet/logo-m.png">
		<?php 
		
		
		if(!$email){
			session_start();
            
			 echo '<div class="alert alert-danger" role="alert">ชื่อผู้ใช้งานกรือรหัสผ่าน</div>'."<meta http-equiv='refresh' content='2 ;url=index.php'>";
			session_destroy();
		}
		?>
		
		<?php if($email)?>
                         <div class="form-group">
          <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
          <div class="input-group">
            <div class="input-group-addon">Email</div>
            <input type="text" class="form-control" disabled="" value="<? echo $email?>">
          </div>
        </div>
        <div class="form-group">
          <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
          <div class="input-group">
            <div class="input-group-addon">Name</div>
            <input type="text" class="form-control" disabled="" value="<? echo $fullname?>">
          </div>
        </div>
        <div class="form-group">
          <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
          <div class="input-group">
            <div class="input-group-addon">$</div>
            <input type="text" class="form-control" disabled="" value="<? echo $fomat_number?>">
          </div>
        </div>
				<div>
					<form action="topup.php" method="post">
	          <div class="form-group">
	            <div class="form-input">
                  <input type="text" class="form-control" maxlength="14" placeholder="เลขบัตรทรูมันนี้ 14 หลัก" name="truemoney">
	            </div>
	          </div>
	          <div class="form-group">
	            <div class="form-input">
                  <input type="submit" class="btn btn-success btn-lg btn-block" name="button" value="เติม">
	            </div>
	          </div>
	        </form>
          					<div class="form-group">
						<div class="form-input">
							<a href="logout.php" class="btn btn-danger btn-lg btn-block">
                  ออกจากระบบ              </a>
						</div>
					</div>
				</div>
      </div>
    </div>
		<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-111443837-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-111443837-1');
	</script>  

</body></html>