$(document).ready(function() {
	updateStats(1);
	tab('tab1');
});

itemList = [];
for (var i = 0; i < 6; i++)
{
	itemList.push(createItem());
}

var champBaseStats = {
	HP: 380,
	HP_l: 80,
	HP5: 5.5,
	HP5_l: 0.6,
	MP: 250,
	MP_l: 50,
	MP5: 7,
	MP5_l: 0.6,
	AD: 50,
	AD_l: 3,
	AS: 0.668,
	AS_l: 0.02, // percentage
	Armor: 11,
	Armor_l: 3.5,
	MR: 30,
	MR_l: 0,
	MS: 330
};

var champ = {
	ArmorPen: 0,
	AD: 0,
	AS: 0,
	CritChance: 0,
	CritDamange: 0,
	LifeSteal: 0,
	MS: 0,
	Armor: 0,
	HP: 0,
	HP5: 0,
	MR: 0,
	AP: 0,
	CDR: 0,
	MagicPen: 0,
	MP: 0,
	MP5: 0,
	SpellVamp: 0
};

function updateStats(champLevel) {
	// Calculate stats based on level
	champ.ArmorPen = 0;
	champ.AD = champBaseStats.AD + champBaseStats.AD_l * champLevel;
	champ.AS = champBaseStats.AS + champBaseStats.AS_l * champLevel;
	champ.CritChance = 0;
	champ.CritDamage = 0;
	champ.LifeSteal = 0;
	champ.MS = champBaseStats.MS;
	champ.Armor = champBaseStats.Armor + champBaseStats.Armor_l * champLevel;
	champ.HP = champBaseStats.HP + champBaseStats.HP_l * champLevel;
	champ.HP5 = champBaseStats.HP5 + champBaseStats.HP5_l * champLevel;
	champ.MR = champBaseStats.MR + champBaseStats.MR_l * champLevel;
	champ.AP = 0;
	champ.CDR = 0;
	champ.MagicPen = 0;
	champ.MP = champBaseStats.MP + champBaseStats.MP_l * (champLevel-1);
	champ.MP5 = champBaseStats.MP5 + champBaseStats.MP5_l * (champLevel-1);
	champ.SpellVamp = 0;
	
	// Create a copy of object champ
	var champInitial = {
		ArmorPen: champ.ArmorPen,
		AD: champ.AD,
		AS: champ.AS,
		CritChance: champ.CritChance,
		CritDamange: champ.Damage,
		LifeSteal: champ.LifeSteal,
		MS: champ.MS,
		Armor: champ.Armor,
		HP: champ.HP,
		HP5: champ.HP5,
		MR: champ.MR,
		AP: champ.AP,
		CDR: champ.CDR,
		MagicPen: champ.MagicPen,
		MP: champ.MP,
		MP5: champ.MP5,
		SpellVamp: champ.SpellVamp
	};
	
	// Add item bonuses to stats
	for (var i = 0; i < 6; i++) {
		itemList[i].addItemBonuses();
	}

	// Update stats on page 
	// UNFINISHED
	var bonusArmorPen = (champ.ArmorPen - champInitial.ArmorPen)
	
	var bonusHP = (champ.HP - champInitial.HP).toFixed(0);
	$('#HPBonus').text('(+' + bonusHP + ')');
	champ.HP = champ.HP.toFixed(0);
	$('#HP').text(champ.HP);
	
	champ.HP5 = champ.HP5.toFixed(2);
	$('#HP5').text(champ.HP5);
	
	$('#MP').text(champ.MP);
	
	champ.MP5 = champ.MP5.toFixed(2);
	$('#MP5').text(champ.MP5);
	
	champ.AD = champ.AD.toFixed(0);
	var bonusAD = champ.AD - champInitial.AD;
	bonusAD = bonusAD.toFixed(0);
	$('#AD').text(champ.AD);
	$('#ADBonus').text('(+' + bonusAD + ')');
	
	champ.AS = champ.AS.toFixed(3);
	$('#AS').text(champ.AS);
	
	var bonusAP = champ.AP - champInitial.AP;
	$('#AP').text(champ.AP);
	$('#APBonus').text('(+' + bonusAP + ')');
	
	champ.Armor = champ.Armor.toFixed(0);
	$('#Armor').text(champ.Armor);
	
	champ.MR = champ.MR.toFixed(0);
	$('#MR').text(champ.MR);
	
	$('#MoveSpeed').text(champ.MS);
}

function createItem(name) // UNFINISHED
{
	switch(name) {
	// Amplifying Tome
	case 'Amplifying Tome':
		var amplifyingTome = new Object();
		amplifyingTome.addItemBonuses = function() {
			champ.AP += 20;
		};
		return amplifyingTome;
		
	// Ancient Coin
	case 'Ancient Coin':
		var ancientCoin = new Object();
		ancientCoin.addItemBonuses = function() {
			champ.HP5 += 5;
			champ.MP5 += 3;
		};
		return ancientCoin;
		
	// B.F. Sword
	case 'B.F. Sword':
		var bfSword = new Object();
		bfSword.addItemBonuses = function() {
			champ.AD += 45;
		};
		return bfSword;
		
	// Long Sword
	case 'Long Sword':
		var longSword = new Object();
		longSword.addItemBonuses = function() {
			champ.AD += 20;
		};
		return longSword;
		
	default:
		var empty = new Object();
		empty.addItemBonuses = function() {
			return;
		};
		return empty;
	}
}

function updateItemList(item, num) {
	itemList[num-1] = createItem(item);
	var levelList = document.getElementById("champLevel");
	var champLevel = levelList.options[levelList.selectedIndex].text;
	updateStats(champLevel);
}

function resetItems() {
	for (var i = 0; i < 6; i++)
		itemList.pop();
	for (var i = 0; i < 6; i++)
		itemList.push(createItem());
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
document.getElementById('li_tab1').setAttribute("class", "");
document.getElementById('li_tab2').setAttribute("class", "");
document.getElementById('li_tab3').setAttribute("class", "");
document.getElementById('li_tab4').setAttribute("class", "");
document.getElementById(tab).style.display = 'block';
document.getElementById('li_'+tab).setAttribute("class", "active");
}