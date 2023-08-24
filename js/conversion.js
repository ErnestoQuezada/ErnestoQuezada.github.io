let convert = document.querySelector('#convert');
let convert2usd = document.querySelector('#convert2usd');
let convert2sats = document.querySelector('#convert2sats');
let convert2btc = document.querySelector('#convert2btc');
let convertBtc = document.querySelector('#convertBtc');

convert.addEventListener('click', (e) => 
{
	let amount = $("#amount").val() || 0;
	
	//todo: add 
	var btc2usd = amount * btcPrice;
	var inDollars = (btc2usd).toFixed(2);
	convertBtc.innerHTML = '$' + addCommas(inDollars);
	
	var sats2usd = amount * btcPrice / 100000000;
	inDollars = (sats2usd).toFixed(2);
	convert2usd.innerHTML = '$' + addCommas(inDollars);
	
	var usd2sats = Math.round(amount * 100000000 / btcPrice);
	convert2sats.innerHTML = addCommas(usd2sats) + ' sats';
	
	var usd2btc = (amount / btcPrice).toFixed(8);
	convert2btc.innerHTML = addCommas(usd2btc) + ' btc';
});

function addCommas(nStr)
{
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) 
	{
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
    return x1 + x2;
}