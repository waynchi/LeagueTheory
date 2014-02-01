$(document).ready(function() {
	updateStats(1);
	tab('tab1');
});

itemList = [0,0,0,0,0,0];

function updateStats(champLevel) {
	// Create itemList

	// Calculate stats
	var champHealth = 395 + 85 * (champLevel-1);

	var champHP5 = 5.75 + 0.5 * (champLevel-1);

	var champMana = 0; // Champ uses health
	
	var champMP5 = 0; // Champ uses health
	
	var champAD = 55 + 3.2 * (champLevel-1);
	var baseAD = champAD;
	for (var i = 0; i < itemList.length; i++)
	{
		if (itemList[i].hasOwnProperty("addAD"))
			champAD = itemList[i].addAD(champAD);
	}
	var bonusAD = champAD - baseAD;
	
	var champAS = 0.651 * (1 + 0.03 * (champLevel-1));

	var champAP = 0;

	var champArmor = 14 + 3.8 * (champLevel-1);

	var champMR = 30 + 1.25 * (champLevel-1);

	// Update stats on page
	$('#GenHealth').text(champHealth);
	
	champHP5 = champHP5.toFixed(2);
	$('#GenHP5').text(champHP5);
	
	$('#GenMana').text('N/A');
	
	champMP5 = champMP5.toFixed(2);
	$('#GenMP5').text('N/A');
	
	champAD = champAD.toFixed(0);
	bonusAD = bonusAD.toFixed(0);
	$('#OffAD').text(champAD);
	$('#OffADBonus').text('(+' + bonusAD + ')');
	
	champAS = champAS.toFixed(3);
	$('#OffAS').text(champAS);
	
	$('#OffAP').text('N/A');
	
	champArmor = champArmor.toFixed(0);
	$('#DefArmor').text(champArmor);
	
	champMR = champMR.toFixed(0);
	$('#DefMR').text(champMR);
}

function createItem(name)
{
	switch(name) {
	case 'Amplifying Tome':
		var amplifyingTome = new Object();
		amplifyingTome.addAP = function (AP) {
			return (AP + 20);
		};
		return amplifyingTome;
	case 'Ancient Coin':
		var ancientCoin = new Object();
		ancientCoin.addHP5 = function (HP5) {
			return (HP5 + 5);
		};
		ancientCoin.addMP5 = function (MP5) {
			return (MP5 + 3);
		};
		return amplifyingTome;
	case 'B.F. Sword':
		var bfSword = new Object();
		bfSword.addAD = function (AD) {
			return (AD + 45);
		};
		return bfSword;
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