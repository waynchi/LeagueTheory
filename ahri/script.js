$(document).ready(function() {
	updateStats(1); // write initial stats onto page
	tab('tab1'); // switch to first tab
});

// Create itemList with 6 empty items
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
	ArmorRed: 0,
	ArmorRedp: 0, // percentage
	ArmorPen: 0,
	ArmorPenp: 0, // percentage
	AD: 0,
	AS: 0,
	ASbonus: 0,
	CritChance: 0,
	CritDamange: 0,
	LifeSteal: 0,
	MS: 0,
	Armor: 0,
	HP: 0,
	HP5: 0,
	MR: 0,
	PEHP: 0, // MaxHP * (1 + Armor/100)
	MEHP: 0, // MaxHP * (1 + MR/100)
	AP: 0,
	CDR: 0,
	MagicRed: 0,
	MagicRedp: 0, // percentage
	MagicPen: 0,
	MagicPenp: 0, // percentage
	MP: 0,
	MP5: 0,
	SpellVamp: 0
};

function updateStats(champLevel) {
	// Calculate stats based on level
	champ.ArmorRed = 0;
	champ.ArmorRedp = 0;
	champ.ArmorPen = 0;
	champ.ArmorPenp = 0;
	champ.AD = champBaseStats.AD + champBaseStats.AD_l * champLevel;
	champ.AS = champBaseStats.AS + champBaseStats.AS_l * champLevel;
	champ.ASbonus = 0;
	champ.CritChance = 0;
	champ.CritDamage = 100;
	champ.LifeSteal = 0;
	champ.MS = champBaseStats.MS;
	champ.Armor = champBaseStats.Armor + champBaseStats.Armor_l * champLevel;
	champ.HP = champBaseStats.HP + champBaseStats.HP_l * champLevel;
	champ.HP5 = champBaseStats.HP5 + champBaseStats.HP5_l * champLevel;
	champ.MR = champBaseStats.MR + champBaseStats.MR_l * champLevel;
	champ.PEHP = champ.HP * (1 + champ.Armor/100);
	champ.MEHP = champ.HP * (1 + champ.MR/100);
	champ.AP = 0;
	champ.CDR = 0;
	champ.MagicRed = 0;
	champ.MagicRedp = 0;
	champ.MagicPen = 0;
	champ.MagicPenp = 0;
	champ.MP = champBaseStats.MP + champBaseStats.MP_l * (champLevel-1);
	champ.MP5 = champBaseStats.MP5 + champBaseStats.MP5_l * (champLevel-1);
	champ.SpellVamp = 0;
	
	// Create a copy of object champ
	var champInitial = {
		ArmorRed: champ.ArmorRed,
		ArmorRedp: champ.ArmorRedp,
		ArmorPen: champ.ArmorPen,
		ArmorPenp: champ.ArmorPenp,
		AD: champ.AD,
		AS: champ.AS,
		ASbonus: champ.ASbonus,
		CritChance: champ.CritChance,
		CritDamage: champ.CritDamage,
		LifeSteal: champ.LifeSteal,
		MS: champ.MS,
		Armor: champ.Armor,
		HP: champ.HP,
		HP5: champ.HP5,
		MR: champ.MR,
		PEHP: champ.PEHP,
		MEHP: champ.MEHP,
		AP: champ.AP,
		CDR: champ.CDR,
		MagicRed: champ.MagicRed,
		MagicRedp: champ.MagicRedp,
		MagicPen: champ.MagicPen,
		MagicPenp: champ.Magicpenp,
		MP: champ.MP,
		MP5: champ.MP5,
		SpellVamp: champ.SpellVamp
	};
	
	// TODO: Add bonuses from Masteries/Runes/Skills
	
	// Add item bonuses to stats
	for (var i = 0; i < 6; i++) {
		itemList[i].addItemBonuses();
	}

	// Update stats on page
	var bonusArmorRed = (champ.ArmorRed - champInitial.ArmorRed).toFixed(0);
	$('#ArmorRedBonus').text('(+' + bonusArmorRed + ')');
	champ.ArmorRed = champ.ArmorRed.toFixed(0);
	$('#ArmorRed').text(champ.ArmorRed);
	
	var bonusArmorRedp = (champ.ArmorRedp - champInitial.ArmorRedp).toFixed(0);
	$('#ArmorRedpBonus').text('(+' + bonusArmorRedp + '%)');
	champ.ArmorRedp = champ.ArmorRedp.toFixed(0);
	$('#ArmorRedp').text(champ.ArmorRedp);
	
	var bonusArmorPen = (champ.ArmorPen - champInitial.ArmorPen).toFixed(0);
	$('#ArmorPenBonus').text('(+' + bonusArmorPen + ')');
	champ.ArmorPen = champ.ArmorPen.toFixed(0);
	$('#ArmorPen').text(champ.ArmorPen);
	
	var bonusArmorPenp = (champ.ArmorPenp - champInitial.ArmorPenp).toFixed(0);
	$('#ArmorPenpBonus').text('(+' + bonusArmorPenp + '%)');
	champ.ArmorPenp = champ.ArmorPenp.toFixed(0);
	$('#ArmorPenp').text(champ.ArmorPenp);
	
	var bonusAD = (champ.AD - champInitial.AD).toFixed(0);
	$('#ADBonus').text('(+' + bonusAD + ')');
	champ.AD = champ.AD.toFixed(0);
	$('#AD').text(champ.AD);

	// TODO: Calculate AS from champ.AS, attack delay, champ.ASbonus
	var bonusAS = (champ.AS - champInitial.AS).toFixed(3);
	$('#ASBonus').text('(+' + bonusAS + ')');
	champ.AS = champ.AS.toFixed(3);
	$('#AS').text(champ.AS);
	
	var bonusCritChance = (champ.CritChance - champInitial.CritChance).toFixed(2);
	champ.CritChance = champ.CritChance.toFixed(2);
	$('#CritChanceBonus').text('(+' + bonusCritChance + '%)');
	$('#CritChance').text(champ.CritChance + '%');
	
	var bonusCritDamage = (champ.CritDamage - champInitial.CritDamage).toFixed(0);
	$('#CritDamageBonus').text('(+' + bonusCritDamage + '%)');
	champ.CritDamage = champ.CritDamage.toFixed(0);
	$('#CritDamage').text('+' + champ.CritDamage + '%');
	
	var bonusLifeSteal = (champ.LifeSteal - champInitial.LifeSteal).toFixed(2);
	$('#LifeStealBonus').text('(+' + bonusLifeSteal + '%)');
	champ.LifeSteal = champ.LifeSteal.toFixed(2);
	$('#LifeSteal').text('+' + champ.LifeSteal + '%');
	
	var bonusMS = (champ.MS - champInitial.MS).toFixed(0);
	$('#MSBonus').text('(+' + bonusMS + ')');
	champ.MS = champ.MS.toFixed(0);
	$('#MS').text(champ.MS);
	
	var bonusArmor = (champ.Armor - champInitial.Armor).toFixed(0);
	$('#ArmorBonus').text('(+' + bonusArmor + ')');
	champ.Armor = champ.Armor.toFixed(0);
	$('#Armor').text(champ.Armor);
	
	var bonusHP = (champ.HP - champInitial.HP).toFixed(0);
	$('#HPBonus').text('(+' + bonusHP + ')');
	champ.HP = champ.HP.toFixed(0);
	$('#HP').text(champ.HP);
	
	var bonusHP5 = (champ.HP5 - champInitial.HP5).toFixed(2);
	$('#HP5Bonus').text('(+' + bonusHP5 + ')');
	champ.HP5 = champ.HP5.toFixed(2);
	$('#HP5').text(champ.HP5);
	
	champ.PEHP = champ.HP * (1 + champ.Armor/100);
	var bonusPEHP = (champ.PEHP - champInitial.PEHP).toFixed(0);
	$('#PEHPBonus').text('(+' + bonusPEHP + ')');
	champ.PEHP = champ.PEHP.toFixed(0);
	$('#PEHP').text(champ.PEHP);
	
	champ.MEHP = champ.MEHP * (1 + champ.MR/100);
	var bonusMEHP = (champ.MEHP - champInitial.MEHP).toFixed(0);
	$('#MEHPBonus').text('(+' + bonusMEHP + ')');
	champ.MEHP = champ.MEHP.toFixed(0);
	$('#MEHP').text(champ.MEHP);
	
	var bonusAP = (champ.AP - champInitial.AP).toFixed(0);
	$('#APBonus').text('(+' + bonusAP + ')');
	champ.AP = champ.AP.toFixed(0);
	$('#AP').text(champ.AP);
	
	var bonusCDR = (champ.CDR - champInitial.CDR).toFixed(2);
	$('#CDRBonus').text('(+' + bonusCDR + '%)');
	champ.CDR = champ.CDR.toFixed(2);
	$('#CDR').text(champ.CDR + '%');
	
	var bonusMagicRed = (champ.MagicRed - champInitial.MagicRed).toFixed(0);
	$('#MagicRedBonus').text('(+' + bonusMagicRed + ')');
	champ.MagicRed = champ.MagicRed.toFixed(0);
	$('#MagicRed').text(champ.MagicRed);

	var bonusMagicRedp = (champ.MagicRedp - champInitial.MagicRedp).toFixed(0);
	$('#MagicRedBonusp').text('(+' + bonusMagicRedp + '%)');
	champ.MagicRedp = champ.MagicRedp.toFixed(0);
	$('#MagicRedp').text(champ.MagicRedp + '%');
	
	var bonusMagicPen = (champ.MagicPen - champInitial.MagicPen).toFixed(0);
	$('#MagicMagicPen').text('(+' + bonusMagicPen + ')');
	champ.MagicPen = champ.MagicPen.toFixed(0);
	$('#MagicPen').text(champ.MagicPen);
	
	var bonusMagicPenp = (champ.MagicPenp - champInitial.MagicPenp).toFixed(0);
	$('#MagicMagicPenp').text('(+' + bonusMagicPenp + '%)');
	champ.MagicPenp = champ.MagicPenp.toFixed(0);
	$('#MagicPenp').text(champ.MagicPenp + '%');
	
	var bonusMP = (champ.MP - champInitial.MP).toFixed(0);
	$('#MPBonus').text('(+' + bonusMP + ')');
	champ.MP = champ.MP.toFixed(0);
	$('#MP').text(champ.MP);
	
	var bonusMP5 = (champ.MP5 - champInitial.MP5).toFixed(2);
	$('#MP5Bonus').text('(+' + bonusMP5 + ')');
	champ.MP5 = champ.MP5.toFixed(2);
	$('#MP5').text(champ.MP5);
	
	var bonusSpellVamp = (champ.SpellVamp - champInitial.SpellVamp).toFixed(2);
	$('#SpellVampBonus').text('(+' + bonusSpellVamp + '%)');
	champ.SpellVamp = champ.SpellVamp.toFixed(2);
	$('#SpellVamp').text('+' + champ.SpellVamp + '%');
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
		
	// Blasting Wand
	case 'Blasting Wand':
		var blastingWand = new Object();
		blastingWand.addItemBonuses = function() {
			champ.AP += 40;
		};
		return blastingWand;
		
	// Boots of Speed
	case 'Boots of Speed':
		var bootsOfSpeed = new Object();
		bootsOfSpeed.addItemBonuses = function() {
			champ.MS += 25;
		};
		return bootsOfSpeed;
		
	// Brawler's Gloves
	case "Brawler's Gloves":
		var brawlersGloves = new Object();
		brawlersGloves.addItemBonuses = function() {
			champ.CritChance += 8;
		};
		return brawlersGloves;
		
	// Chain Vest
	case 'Chain Vest':
		var chainVest = new Object();
		chainVest.addItemBonuses = function() {
			champ.Armor += 40;
		};
		return chainVest;
		
	// Cloak of Agility
	case 'Cloak of Agility':
		var cloakOfAgility = new Object();
		cloakOfAgility.addItemBonuses = function() {
			champ.CritChance += 15;
		};
		return cloakOfAgility;
		
	// Cloth Armor
	case 'Cloth Armor':
		var clothArmor = new Object();
		clothArmor.addItemBonuses = function() {
			champ.Armor += 15;
		};
		return clothArmor;
		
	// Dagger
	case 'Dagger':
		var dagger = new Object();
		dagger.addItemBonuses = function() {
			champ.ASbonus += 0.12;
		};
		return dagger;
		
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