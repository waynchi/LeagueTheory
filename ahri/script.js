$(document).ready(function() {
	updateStats(1);
	tab('tab1');
});

itemList = [0,0,0,0,0,0];

function updateStats(champLevel) {
	// Create itemList

	// Calculate stats
	var champHealth = 380 + 80 * (champLevel-1);

	var champHP5 = 5.5 + 0.6 * (champLevel-1);

	var champMP = 250 + 50 * (champLevel-1);
	
	var champMP5 = 7 + 0.6 * (champLevel-1);
	
	var champAD = 50 + 3 * (champLevel-1);
	var baseAD = champAD;
	for (var i = 0; i < itemList.length; i++)
	{
		if (itemList[i].hasOwnProperty("addAD"))
			champAD = itemList[i].addAD(champAD);
	}
	var bonusAD = champAD - baseAD;
	
	var champAS = 0.668 * (1 + 0.02 * (champLevel-1));

	var champAP = 0;
	var baseAP = champAP;
	for (var i = 0; i < itemList.length; i++)
	{
		if (itemList[i].hasOwnProperty("addAP"))
			champAP = itemList[i].addAP(champAP);
	}
	var bonusAP = champAP - baseAP;
	
	var champArmor = 11 + 3.5 * (champLevel-1);

	var champMR = 30 + 0 * (champLevel-1);
	
	var champMS = 330;

	// Update stats on page
	$('#HP').text(champHealth);
	
	champHP5 = champHP5.toFixed(2);
	$('#HP5').text(champHP5);
	
	$('#MP').text(champMP);
	
	champMP5 = champMP5.toFixed(2);
	$('#MP5').text(champMP5);
	
	champAD = champAD.toFixed(0);
	bonusAD = bonusAD.toFixed(0);
	$('#AD').text(champAD);
	$('#ADBonus').text('(+' + bonusAD + ')');
	
	champAS = champAS.toFixed(3);
	$('#AS').text(champAS);
	
	$('#AP').text(champAP);
	$('#APBonus').text('(+' + bonusAP + ')');
	
	champArmor = champArmor.toFixed(0);
	$('#Armor').text(champArmor);
	
	champMR = champMR.toFixed(0);
	$('#MR').text(champMR);
	
	$('#MoveSpeed').text(champMS);
}

function createItem(name)
{
	switch(name) {
	// Amplifying Tome
	case 'Amplifying Tome':
		var amplifyingTome = new Object();
		amplifyingTome.addAP = function (AP) {
			return (AP + 20);
		};
		return amplifyingTome;
		
	// Ancient Coin
	case 'Ancient Coin':
		var ancientCoin = new Object();
		ancientCoin.addHP5 = function (HP5) {
			return (HP5 + 5);
		};
		ancientCoin.addMP5 = function (MP5) {
			return (MP5 + 3);
		};
		return ancientCoin;
		
	// B.F. Sword
	case 'B.F. Sword':
		var bfSword = new Object();
		bfSword.addAD = function (AD) {
			return (AD + 45);
		};
		return bfSword;
		
	// Long Sword
	case 'Long Sword':
		var longSword = new Object();
		longSword.addAD = function (AD) {
			return (AD + 20);
		};
		return longSword;
		
	default:
		return 0;
		}
}

function updateItem(item, num) {
	itemList[num-1] = createItem(item);
	var levelList = document.getElementById("champLevel");
	var champLevel = levelList.options[levelList.selectedIndex].text;
	updateStats(champLevel);
}

function resetItems() {
	itemList = [0,0,0,0,0,0];
	$('#item1').val('None');
	$('#item2').val('None');
	$('#item3').val('None');
	$('#item4').val('None');
	$('#item5').val('None');
	$('#item6').val('None');
	var levelList = document.getElementById("champLevel");
	var champLevel = levelList.options[levelList.selectedIndex].text;
	updateStats(champLevel);
	
}

function tab(tab) {
document.getElementById('tab1').style.display = 'none';
document.getElementById('tab2').style.display = 'none';
document.getElementById('tab3').style.display = 'none';
document.getElementById('tab4').style.display = 'none';
document.getElementById('tab5').style.display = 'none';
document.getElementById('li_tab1').setAttribute("class", "");
document.getElementById('li_tab2').setAttribute("class", "");
document.getElementById('li_tab3').setAttribute("class", "");
document.getElementById('li_tab4').setAttribute("class", "");
document.getElementById('li_tab5').setAttribute("class", "");
document.getElementById(tab).style.display = 'block';
document.getElementById('li_'+tab).setAttribute("class", "active");
}