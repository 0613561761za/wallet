<?
//cr.panupong niyakit //
session_start();
include('class.truewallet.php');
error_reporting(error_reporting() & ~ E_NOTICE);
$numbertrue = $_POST['truemoney']; //รหัสบัตรทรู

$wallet = new TrueWallet($_SESSION['user'],$_SESSION['pwd'],'email');
$wallet->GetToken();
$token = json_decode($wallet->GetToken(),true)['data']['accessToken']; 
$wallet->Profile($token);
$fullname = json_decode($wallet->Profile($token),true)['data']['fullname'];
$number = json_decode($wallet->Profile($token),true)['data']['mobileNumber'];
$email = json_decode($wallet->Profile($token),true)['data']['email'];   //แสดงชื่อของบัญชี email
$monney = json_decode($wallet->Profile($token),true)['data']['currentBalance']; 
$fomat_number = number_format($monney ,2 , '.' , '');
$token = json_decode($wallet->GetToken(),true)['data']['accessToken']; 
$numbertrue = json_decode($wallet->Topup($numbertrue,$token),true)['amount']; 
?>
<html><head>
    <meta charset="utf-8">
    <title>TrueWallet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://www.devexp.club/wallet/favicon.ico" rel="shortcut icon" />
	<link href="https://www.devexp.club/wallet/css/bootstrap.min.css" rel="stylesheet" />
	<link href="https://www.devexp.club/wallet/css/style.css" rel="stylesheet" /><script src="https://www.devexp.club/wallet/js/bootstrap.min.js"></script><script src="js/google.js"></script>
</head>
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script><script src="js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="form-user">
        <img src="https://wallet.truemoney.com/v1web/assets/images/wallet/logo-m.png">
		<?
		if($numbertrue){
		echo '<div class="alert alert-success" role="alert">เติมเงินแล้ว '.$numbertrue.'</div>';
		}		
		else
		{	  
		echo '<div class="alert alert-danger" role="alert">รหัสบัตรไม่ถูกต้อง</div>';
		}
	 	?>
		<div class="form-group">
						<div class="form-input">
							<a href="logout.php" class="btn btn-danger btn-lg btn-block">ออกจากระบบ</a>
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

