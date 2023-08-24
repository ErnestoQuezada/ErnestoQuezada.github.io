<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sats Calculator</title>
	<link rel="icon" href="images/bitcoin-logo.png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
	<style>
		body,html{height:100%;}
		p{color: orange;}
	</style>
</head>
<body>

<?php
// --- Binance ---
$readjson = file_get_contents('https://api.binance.com/api/v3/avgPrice?symbol=BTCUSDT');
$data = json_decode($readjson);
$btcPrice = $data -> price;

// --- Bitfinex ---
/**
$readjson = file_get_contents('https://api-pub.bitfinex.com/v2/ticker/tBTCUSD');
$data = json_decode($readjson);
$btcPrice = $data[0];
**/
?>
<script type="text/javascript">
	var btcPrice = <?php echo $btcPrice ?>;	
</script>
 
<div class="container h-100 text-center form">
	<div class="row h-100">
		<div class="card justify-content-center align-items-center">
		<div class="card-body">
			<h5 class="card-title">Sats Calculator</h5>
			<div class="card-text">
				<img src="images/bitcoin-logo.png" alt="Bitcoin logo" width="24" height="24"> bitcoin price
				<p><b>$<?php echo number_format($btcPrice, 2, '.', ','); ?></b></p>
				<div class="mb-3">
					<input class="form-control" type="number" placeholder="Amount" aria-label="default input" required id="amount">
				</div>
				<div>
					<button type="button" class="btn btn-primary mb-3" id="convert">Convert</button>
				</div>
			</div>
		
			<div class="card m-2">
			  <div class="card-body" id="convert2usd">
				Sats to USD
			  </div>
			</div>
			<div class="card m-2">
			  <div class="card-body" id="convertBtc">
				BTC to USD
			  </div>
			</div>
			<div class="card m-2">
			  <div class="card-body" id="convert2sats">
				USD to sats
			  </div>
			</div>
			<div class="card m-2">
			  <div class="card-body" id="convert2btc">
				USD to BTC
			  </div>
			</div>
		
		</div>
	</div>
</div>

<script src="js/conversion.js"></script>

</body>
</html>