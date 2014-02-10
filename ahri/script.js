

$(document).ready(function() {
	getChampionInfo();
	updateStatsCaller(); // write initial stats onto page
	tab('tab1'); // switch to first tab
});

function getChampionInfo() {
	//Gets Champion Information
	console.log("test");
	var name = champRef.name;
        var title = champRef.title;
        var statsRef = champRef.stats;
        var imageRef = champRef.images;
        
}

function updateStatsCaller() {
    // Get champ level selection from page
    var levelList = document.getElementById("champLevel");
    var champLevel = levelList.options[levelList.selectedIndex].text;
    // Get item list selection from page
    var itemArray = Array();
    for (var i = 1; i <= 6; i++) {
        var itemFormID = "item" + i;
        var itemForm = document.getElementById(itemFormID);
        itemArray.push(itemForm.options[itemForm.selectedIndex].text);
    }
    // Create string for data appended to PHP request
    var data = "?champLevel=" + champLevel;
    for (var i = 0; i < 6; i++) {
        data += "&items[]=" + itemArray[i];
    }
    // Call PHP file
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("mainStats").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST","updateStats.php"+data,true);
    xmlhttp.send();
}

/**
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
	
	// Abyssal Scepter
	case "Abyssal Scepter":
		var abyssalScepter = new Object();
		abyssalScepter.addItemBonuses = function() {
			champ.AP += 70;
			champ.MR += 45;
		};
		return abyssalScepter;
	
	// Amplifying Tome
	case "Amplifying Tome":
		var amplifyingTome = new Object();
		amplifyingTome.addItemBonuses = function() {
			champ.AP += 20;
		};
		return amplifyingTome;
		
	// Ancient Coin
	case "Ancient Coin":
		var ancientCoin = new Object();
		ancientCoin.addItemBonuses = function() {
			champ.HP5 += 5;
			champ.MP5 += 3;
		};
		return ancientCoin;
		
	// Avarice Blade
	case "Avarice Blade":
		var avariceBlade = new Object();
		avariceBlade.addItemBonuses = function() {
			champ.critChance += 10;
		};
		return avariceBlade;
		
	// B.F. Sword
	case "B.F. Sword":
		var bfSword = new Object();
		bfSword.addItemBonuses = function() {
			champ.AD += 45;
		};
		return bfSword;
		
	// Berserker's Greaves
	case "Berserker's Greaves":
		var berserkersGreaves = new Object();
		berserkersGreaves.addItemBonuses = function() {
			champ.ASbonus += 0.20;
			champ.MS += 45;
		};
		return berserkersGreaves;
		
	// Blasting Wand
	case "Blasting Wand":
		var blastingWand = new Object();
		blastingWand.addItemBonuses = function() {
			champ.AP += 40;
		};
		return blastingWand;
		
	// Boots of Mobility
	case "Boots of Mobility":
		var bootsOfMobility = new Object();
		bootsOfMobility.addItemBonuses = function() {
			champ.MS += 45;
		};
		return bootsOfMobility;
		
	// Boots of Speed
	case "Boots of Speed":
		var bootsOfSpeed = new Object();
		bootsOfSpeed.addItemBonuses = function() {
			champ.MS += 25;
		};
		return bootsOfSpeed;
		
	// Boots of Swiftness
	case "Boots of Swiftness":
		var bootsOfSwiftness = new Object();
		bootsOfSwiftness.addItemBonuses = function() {
			champ.MS += 60;
		};
		return bootsOfSwiftness;
		
	// Brawler's Gloves
	case "Brawler's Gloves":
		var brawlersGloves = new Object();
		brawlersGloves.addItemBonuses = function() {
			champ.CritChance += 8;
		};
		return brawlersGloves;
		
	// The Brutalizer
	case "The Brutalizer":
		var theBrutalizer = new Object();
		theBrutalizer.addItemBonuses = function() {
			champ.AD += 25;
			champ.CDR += 10; // UNIQUE
			champ.ArmorPen += 10; // UNIQUE
		};
		return theBrutalizer;
		
	// Catalyst the Protector
	case "Catalyst the Protector":
		var catalystTheProtector = new Object();
		catalystTheProtector.addItemBonuses = function() {
			champ.HP += 200;
			champ.MP += 300;
		};
		return catalystTheProtector;
	
	// Chalice of Harmony
	case "Chalice of Harmony":
		var chaliceOfHarmony = new Object();
		chaliceOfHarmony.addItemBonuses = function() {
			champ.MR += 25;
			champ.MP5 += 7;
		};
		return chaliceOfHarmony;
		
	// Chain Vest
	case "Chain Vest":
		var chainVest = new Object();
		chainVest.addItemBonuses = function() {
			champ.Armor += 40;
		};
		return chainVest;
		
	// Cloak of Agility
	case "Cloak of Agility":
		var cloakOfAgility = new Object();
		cloakOfAgility.addItemBonuses = function() {
			champ.CritChance += 15;
		};
		return cloakOfAgility;
		
	// Cloth Armor
	case "Cloth Armor":
		var clothArmor = new Object();
		clothArmor.addItemBonuses = function() {
			champ.Armor += 15;
		};
		return clothArmor;
		
	// Dagger
	case "Dagger":
		var dagger = new Object();
		dagger.addItemBonuses = function() {
			champ.ASbonus += 0.12;
		};
		return dagger;
		
	// Doran's Blade
	case "Doran's Blade":
		var doransBlade = new Object();
		doransBlade.addItemBonuses = function() {
			champ.HP += 80;
			champ.AD += 10;
		};
		return dagger;
		
	// Doran's Ring
	case "Doran's Ring":
		var doransRing = new Object();
		doransRing.addItemBonuses = function() {
			champ.HP += 60;
			champ.AP += 15;
			champ.MP5 += 3;
		};
		return doransRing;
		
	// Doran's Shield
	case "Doran's Shield":
		var doransShield = new Object();
		doransShield.addItemBonuses = function() {
			champ.HP += 100;
			champ.HP5 += 10;
		};
		return doransShield;
		
	// Faerie Charm
	case "Faerie Charm":
		var faerieCharm = new Object();
		faerieCharm.addItemBonuses = function() {
			champ.MP5 += 3;
		};
		return faerieCharm;
		
	// Fiendish Codex
	case "Fiendish Codex":
		var fiendishCodex = new Object();
		fiendishCodex.addItemBonuses = function() {
			champ.AP += 30;
		};
		return fiendishCodex;
	
	// Frostfang
	case "Frostfang":
		var frostfang = new Object();
		frostfang.addItemBonuses = function() {
			champ.AP += 20;
			champ.MP5 += 7;
		};
		return frostfang;
	
	// Frozen Mallet
	case "Frozen Mallet":
		var frozenMallet = new Object();
		frozenMallet.addItemBonuses = function() {
			champ.AD += 30;
			champ.HP += 700;
		};
		return frozenMallet;
		
	// Giant's Belt
	case "Giant's Belt":
		var giantsBelt = new Object();
		giantsBelt.addItemBonuses = function() {
			champ.HP += 380;
		};
		return giantsBelt;		

	// Glacial Shroud
	case "Glacial Shroud":
		var glacialShroud = new Object();
		glacialShroud.addItemBonuses = function() {
			champ.MP += 300;
			champ.Armor += 45;
		};
		return glacialShroud;	
	
	// Guardian Angel
	case "Guardian Angel":
		var guardianAngel = new Object();
		guardianAngel.addItemBonuses = function() {
			champ.Armor += 50;
			champ.MR += 30;
		};
		return guardianAngel;	
	
	// Guardian's Horn
	case "Guardian's Horn":
		var guardiansHorn = new Object();
		guardiansHorn.addItemBonuses = function() {
			champ.HP += 180;
			champ.HP5 += 12;
		};
		return guardiansHorn;	
	
	// Guinsoo's Rageblade
	case "Guinsoo's Rageblade":
		var guinsoosRageblade = new Object();
		guinsoosRageblade.addItemBonuses = function() {
			champ.AD += 30;
			champ.AP += 40;
		};
		return guinsoosRageblade;	
	
	// Haunting Guise
	case "Haunting Guise":
		var hauntingGuise = new Object();
		hauntingGuise.addItemBonuses = function() {
			champ.HP += 200;
			champ.AP += 25;
		};
		return hauntingGuise;	
	
	// Hexdrinker
	case "Hexdrinker":
		var hexdrinker = new Object();
		hexdrinker.addItemBonuses = function() {
			champ.AD += 25;
			champ.MR += 25;
		};
		return hexdrinker;	
	
	// Hextech Revolver
	case "Hextech Revolver":
		var hextechRevolver = new Object();
		hextechRevolver.addItemBonuses = function() {
			champ.AP += 40;
		};
		return hextechRevolver;	
		
	// Hunter's Machete
	case "Hunter's Machete":
		var huntersMachete = new Object();
		huntersMachete.addItemBonuses = function() {
			// butcher, maim
		};
		return huntersMachete;
		
	// Infinity Edge
	case "Infinity Edge":
		var infinityEdge = new Object();
		infinityEdge.addItemBonuses = function() {
			champ.AD += 70;
			champ.CritChance += 25;
			champ.CritDamage += 50; // UNIQUE
		};
		return infinityEdge;
	
	// Ionian Boots of Lucidity
	case "Ionian Boots of Lucidity":
		var ionianBootsOfLucidity = new Object();
		ionianBootsOfLucidity.addItemBonuses = function() {
			champ.CDR += 15; // UNIQUE
			champ.MS += 45;
		};
		return ionianBootsOfLucidity;
	
	// Kindlegem
	case "Kindlegem":
		var kindlegem = new Object();
		kindlegem.addItemBonuses = function() {
			champ.CDR += 10; // UNIQUE
			champ.HP += 200;
		};
		return kindlegem;
	
	// Kitae's Bloodrazor
	case "Kitae's Bloodrazor":
		var kitaesBloodrazor = new Object();
		kitaesBloodrazor.addItemBonuses = function() {
			champ.AD += 30;
			champ.ASbonus += 0.40;
		};
		return kitaesBloodrazor;
	
	// Last Whisper
	case "Last Whisper":
		var lastWhisper = new Object();
		lastWhisper.addItemBonuses = function() {
			champ.AD += 40;
			champ.ArmorPenp += 35;
		};
		return lastWhisper;
	
	// Long Sword
	case "Long Sword":
		var longSword = new Object();
		longSword.addItemBonuses = function() {
			champ.AD += 20;
		};
		return longSword;
		
	// Madred's Razors
	case "Madred's Razors":
		var madredsRazors = new Object();
		madredsRazors.addItemBonuses = function() {
			champ.Armor += 25;
			// maim
		};
		return madredsRazors;
	
	// Mejai's Soulstealer
	case "Mejai's Soulstealer":
		var mejaisSoulstealer = new Object();
		mejaisSoulstealer.addItemBonuses = function() {
			champ.AP += 20;
		};
		return mejaisSoulstealer;
	
	// Mercury's Treads
	case "Mercury's Treads":
		var mercurysTreads = new Object();
		mercurysTreads.addItemBonuses = function() {
			champ.MR += 25;
			champ.MS += 45;
		};
		return mercurysTreads;
		
	// Needlessly Large Rod
	case "Needlessly Large Rod":
		var needlesslyLargeRod = new Object();
		needlesslyLargeRod.addItemBonuses = function() {
			champ.AP += 80;
		};
		return needlesslyLargeRod;
		
	// Ninja Tabi
	case "Ninja Tabi":
		var ninjaTabi = new Object();
		ninjaTabi.addItemBonuses = function() {
			champ.Armor += 25;
			champ.MS += 45;
		};
		return ninjaTabi;
	
	// Nomad's Medallion
	case "Nomad's Medallion":
		var nomadsMedallion = new Object();
		nomadsMedallion.addItemBonuses = function() {
			champ.HP5 += 8;
			champ.MP5 += 11;
		};
		return nomadsMedallion;
		
	// Null-Magic Mantle
	case "Null-Magic Mantle":
		var nullMagicMantle = new Object();
		nullMagicMantle.addItemBonuses = function() {
			champ.MR += 20;
		};
		return nullMagicMantle;
		
	// Orb of Winter
	case "Orb of Winter":
		var orbOfWinter = new Object();
		orbOfWinter.addItemBonuses = function() {
			champ.MR += 70;
			champ.HP5 += 20;
		};
		return orbOfWinter;
	
	// Overlord's Bloodmail
	case "Overlord's Bloodmail":
		var overlordsBloodmail = new Object();
		overlordsBloodmail.addItemBonuses = function() {
			champ.HP += 850;
		};
		return overlordsBloodmail;
		
	// Pickaxe
	case "Pickaxe":
		var pickaxe = new Object();
		pickaxe.addItemBonuses = function() {
			champ.AD += 25;
		};
		return pickaxe;
		
	// Phage
	case "Phage":
		var phage = new Object();
		phage.addItemBonuses = function() {
			champ.HP += 200;
			champ.AD += 20;
		};
		return phage;
	
	// Prospector's Blade
	case "Prospector's Blade":
		var prospectorsBlade = new Object();
		prospectorsBlade.addItemBonuses = function() {
			champ.AD += 20;
			champ.LifeSteal += 5;
		};
		return prospectorsBlade;
		
	// Prospector's Ring
	case "Prospector's Ring":
		var prospectorsRing = new Object();
		prospectorsRing.addItemBonuses = function() {
			champ.AP += 40;
			champ.MP5 += 10;
		};
		return prospectorsRing;
		
	// Quicksilver Sash
	case "Quicksilver Sash":
		var quicksilverSash = new Object();
		quicksilverSash.addItemBonuses = function() {
			champ.MR += 45;
		};
		return quicksilverSash;
		
	// Rabadon's Deathcap
	case "Rabadon's Deathcap":
		var rabadonsDeathcap = new Object();
		rabadonsDeathcap.addItemBonuses = function() {
			champ.AP += 120;
		};
		return rabadonsDeathcap;
		
	// Recurve Bow
	case "Recurve Bow":
		var recurveBow = new Object();
		recurveBow.addItemBonuses = function() {
			champ.ASbonus += 0.30;
		};
		return recurveBow;
		
	// Rejuvenation Bead
	case "Rejuvenation Bead":
		var rejuvenationBead = new Object();
		rejuvenationBead.addItemBonuses = function() {
			champ.HP5 += 5;
		};
		return rejuvenationBead;
		
	// Relic Shield
	case "Relic Shield":
		var relicShield = new Object();
		relicShield.addItemBonuses = function() {
			champ.HP += 50;
			champ.HP5 += 6;
		};
		return relicShield;
		
	// Ruby Crystal
	case "Ruby Crystal":
		var rubyCrystal = new Object();
		rubyCrystal.addItemBonuses = function() {
			champ.HP += 180;
		};
		return rubyCrystal;
	
	// Runaan's Hurricane
	case "Runaan's Hurricane":
		var runannsHurricane = new Object();
		runannsHurricane.addItemBonuses = function() {
			champ.ASbonus += 0.70;
		};
		return runannsHurricane;
	
	// Rylai's Crystal Scepter
	case "Rylai's Crystal Scepter":
		var rylaisCrystalScepter = new Object();
		rylaisCrystalScepter.addItemBonuses = function() {
			champ.HP += 500;
			champ.AP += 80;
		};
		return rylaisCrystalScepter;
	
	// Sapphire Crystal
	case "Sapphire Crystal":
		var sapphireCrystal = new Object();
		sapphireCrystal.addItemBonuses = function() {
			champ.MP += 200;
		};
		return sapphireCrystal;
		
	// Seeker's Armguard
	case "Seeker's Armguard":
		var seekersArmguard = new Object();
		seekersArmguard.addItemBonuses = function() {
			champ.Armor += 30;
			champ.AP += 20;
		};
		return seekersArmguard;
	
	// Sheen
	case "Sheen":
		var sheen = new Object();
		sheen.addItemBonuses = function() {
			champ.Mana += 200;
			champ.AP += 25;
		};
		return sheen;
	
	// Sightstone
	case "Sightstone":
		var sightstone = new Object();
		sightstone.addItemBonuses = function() {
			champ.HP += 180;
		};
		return sightstone;
	
	// Sorcerer's Shoes
	case "Sorcerer's Shoes":
		var sorcerersShoes = new Object();
		sorcerersShoes.addItemBonuses = function() {
			champ.MagicPen += 15;
			champ.MS += 45;
		};
		return sorcerersShoes;
		
	// Spectre's Cowl
	case "Spectre's Cowl":
		var spectresCowl = new Object();
		spectresCowl.addItemBonuses = function() {
			champ.HP += 200;
			champ.MR += 45;
		};
		return spectresCowl;
		
	// Spellthief's Edge
	case "Spellthief's Edge":
		var spellthiefsEdge = new Object();
		spellthiefsEdge.addItemBonuses = function() {
			champ.AP += 10;
			champ.MP5 += 3;
		};
		return spellthiefsEdge;
		
	// Spirit Stone
	case "Spirit Stone":
		var spiritStone = new Object();
		spiritStone.addItemBonuses = function() {
			champ.HP5 += 14;
			champ.MP5 += 7;
		};
		return spiritStone;
	
	// Stinger
	case "Stinger":
		var stinger = new Object();
		stinger.addItemBonuses = function() {
			champ.ASbonus += 0.40;
		};
		return stinger;
	
	// Sunfire Cape
	
	// Sword of the Divine
	
	// Sword of the Occult
	
	// Targon's Brace
	
	// Tear of the Goddess
	
	// Thornmail
	
	// Tiamat
	
	// Vampiric Scepter
	
	// Void Staff
	
	// Warden's Mail
	
	// Warmog's Armor
	
	// Wit's End
	
	// Zeal
		
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
} **/

function resetItems() {
	$('#item1').val('None');
	$('#item2').val('None');
	$('#item3').val('None');
	$('#item4').val('None');
	$('#item5').val('None');
	$('#item6').val('None');
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