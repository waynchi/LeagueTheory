<?php
include 'itemStats.php';

function debug_to_console( $data ) {

    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

    echo $output;
};

// Get data from HTML request
$champLevel = $_REQUEST["champLevel"];
$items = $_REQUEST["items"];

// ahri id = 103
$ch = curl_init("https://prod.api.pvp.net/api/lol/static-data/na/v1/champion/103?champData=all&api_key=9f9c9f7d-0def-4082-b66d-7134dc73b58c");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$champRefJSON = curl_exec($ch);
$champRef = json_decode($champRefJSON, true);

$name = $champRef['name'];
$title = $champRef['title'];
$statsRef = $champRef['stats'];
$imageRef = $champRef['image'];

// $url = 'https://prod.api.pvp.net/api/lol/static-data/na/v1/champion/ahri?api_key=9f9c9f7d-0def-4082-b66d-7134dc73b58c';
// $champRef = json_decode(file_get_contents($url));
// $name = champRef.name;
// $title = champRef.title;
// $statsRef = champRef.stats;
// $imageRef = champRef.images;

// Contains current statistics for champion
$champ = array(
    'ArmorRed' => 0,
    'ArmorRedp' => 0, // percentage
    'ArmorPen' => 0,
    'ArmorPenp' => 0, // percentage
    'AD' => 0,
    'AS' => 0, // 0.625/(1-ASoffset)
    'ASbonus' => 0,
    'CritChance' => 0,
    'CritDamange' => 0,
    'LifeSteal' => 0,
    'MS' => 0,
    'Armor' => 0,
    'HP' => 0,
    'HP5' => 0,
    'MR' => 0,
    'PEHP' => 0, // MaxHP * (1 + Armor/100)
    'MEHP' => 0, // MaxHP * (1 + MR/100)
    'AP' => 0,
    'CDR' => 0,
    'MagicRed' => 0,
    'MagicRedp' => 0, // percentage
    'MagicPen' => 0,
    'MagicPenp' => 0, // percentage
    'MP' => 0,
    'MP5' => 0,
    'SpellVamp' => 0
);

// Calculates base statistics from champion level
$champ['ArmorRed'] = 0;
$champ['ArmorRedp'] = 0;
$champ['ArmorPen'] = 0;
$champ['ArmorPenp'] = 0;
$champ['AD'] = $statsRef['attackdamage'] + $statsRef['attackdamageperlevel'] * $champLevel;
$champ['AS'] = 0.625 / (1 - $statsRef['attackspeedoffset']) * (1 + $statsRef['attackspeedperlevel'] * $champLevel / 100);
$champ['ASbonus'] = 0;
$champ['CritChance'] = 0;
$champ['CritDamage'] = 100;
$champ['LifeSteal'] = 0;
$champ['MS'] = $statsRef['movespeed'];
$champ['Armor'] = $statsRef['armor'] + $statsRef['armorperlevel'] * $champLevel;
$champ['HP'] = $statsRef['hp'] + $statsRef['hpperlevel'] * $champLevel;
$champ['HP5'] = $statsRef['hpregen'] + $statsRef['hpregenperlevel'] * $champLevel;
$champ['MR'] = $statsRef['spellblock'] + $statsRef['spellblockperlevel'] * $champLevel;
$champ['PEHP'] = $champ['HP'] * (1 + $champ['Armor']/100);
$champ['MEHP'] = $champ['HP'] * (1 + $champ['MR']/100);
$champ['AP'] = 0;
$champ['CDR'] = 0;
$champ['MagicRed'] = 0;
$champ['MagicRedp'] = 0;
$champ['MagicPen'] = 0;
$champ['MagicPenp'] = 0;
$champ['MP'] = $statsRef['mp'] + $statsRef['mpperlevel'] * ($champLevel-1);
$champ['MP5'] = $statsRef['mpregen'] + $statsRef['mpregenperlevel'] * ($champLevel-1);
$champ['SpellVamp'] = 0;

// Creates a copy of champion basic stats (before bonuses)
$champInitial = $champ;

$statMods = array(
	'FlatArmorMod' => 0,
	'FlatAttackSpeedMod' => 0,
	'FlatBlockMod' => 0,
	'FlatCritChanceMod' => 0,
	'FlatCritDamageMod' => 0,
	'FlatEXPBonus' => 0,
	'FlatEnergyPoolMod' => 0,
	'FlatEnergyRegenMod' => 0,
	'FlatHPPoolMod' => 0,
	'FlatHPRegenMod' => 0,
	'FlatMPPoolMod' => 0,
	'FlatMPRegenMod' => 0,
	'FlatMagicDamageMod' => 0,
	'FlatMovementSpeedMod' => 0,
	'FlatPhysicalDamageMod' => 0,
	'FlatSpellBlockMod' => 0,
	'PercentArmorMod' => 0,
	'PercentAttackSpeedMod' => 0,
	'PercentBlockMod' => 0,
	'PercentCritChanceMod' => 0,
	'PercentCritDamageMod' => 0,
	'PercentDodgeMod' => 0,
	'PercentEXPBonus' => 0,
	'PercentHPPoolMod' => 0,
	'PercentHPRegenMod' => 0,
	'PercentLifeStealMod' => 0,
	'PercentMPPoolMod' => 0,
	'PercentMPRegenMod' => 0,
	'PercentMagicDamageMod' => 0,
	'PercentMovementSpeedMod' => 0,
	'PercentPhysicalDamageMod' => 0,
	'PercentSpellBlockMod' => 0,
	'PercentSpellVampMod' => 0,
	'rFlatArmorModPerLevel' => 0,
	'rFlatArmorPenetrationMod' => 0,
	'rFlatCritChanceModPerLevel' => 0,
	'rFlatCritDamageModPerLevel' => 0,
	'rFlatDodgeMod' => 0,
	'rFlatDodgeModPerLevel' => 0,
	'rFlatEnergyModPerLevel' => 0,
	'rFlatEnergyRegenModPerLevel' => 0,
	'rFlatGoldPer10Mod' => 0,
	'rFlatHPModPerLevel' => 0,
	'rFlatHPRegenModPerLevel' => 0,
	'rFlatMPModPerLevel' => 0,
	'rFlatMPRegenModPerLevel' => 0,
	'rFlatMagicDamageModPerLevel' => 0,
	'rFlatMagicPenetrationMod' => 0,
	'rFlatMagicPenetrationModPerLevel' => 0,
	'rFlatMovementSpeedModPerLevel' => 0,
	'rFlatPhysicalDamageModPerLevel' => 0,
	'rFlatSpellBlockModPerLevel' => 0,
	'rFlatTimeDeadMod' => 0,
	'rFlatTimeDeadModPerLevel' => 0,
	'rPercentArmorPenetrationMod' => 0,
	'rPercentArmorPenetrationModPerLevel' => 0,
	'rPercentAttackSpeedModPerLevel' => 0,
	'rPercentCooldownMod' => 0,
	'rPercentCooldownModPerLevel' => 0,
	'rPercentMagicPenetrationMod' => 0,
	'rPercentMagicPenetrationModPerLevel' => 0,
	'rPercentMovementSpeedModPerLevel' => 0,
	'rPercentTimeDeadMod' => 0,
	'rPercentTimeDeadModPerLevel' => 0,
);

// Accessing itemStats example
// $itemStats['data']['1001']['stats']['FlatMovementSpeedMod']

for ($i = 0; $i < 6; $i++)
{
	foreach ($itemStats['data'] as $value)
		if ($items[$i] == $value['name'])
		{
			$itemStatsArrayKeys = array_keys($value['stats']);
			foreach ($itemStatsArrayKeys as $arrayKey)
				$statMods[$arrayKey] += $value['stats'][$arrayKey];
			break;
		}
}


// Updates stats according to $statMods
$champ['ArmorRed'] = 0; // not working
$champ['ArmorRedp'] = 0; // not working
$champ['ArmorPen'] = 0; // not working
$champ['ArmorPenp'] = 0; // not working
$champ['AD'] = (($statsRef['attackdamage'] + $statsRef['attackdamageperlevel'] * $champLevel) + $statMods['FlatPhysicalDamageMod']) * (1+$statMods['PercentPhysicalDamageMod']);
$champ['AS'] = 0.625 / (1 - $statsRef['attackspeedoffset'] + $statMods['FlatAttackSpeedMod']) * (1 + $statsRef['attackspeedperlevel'] * $champLevel / 100 + $statMods['PercentAttackSpeedMod']);
$champ['CritChance'] = $statMods['FlatCritChanceMod'] * (1+$statMods['PercentCritChanceMod']) * 100;
$champ['CritDamage'] = (100 + $statMods['FlatCritDamageMod']) * (1+$statMods['PercentCritDamageMod']);
$champ['LifeSteal'] = $statMods['PercentLifeStealMod'] * 100;
$champ['MS'] = ($statsRef['movespeed'] + $statMods['FlatMovementSpeedMod']) * (1+$statMods['PercentMovementSpeedMod']);
$champ['Armor'] = ($statsRef['armor'] + $statsRef['armorperlevel'] * $champLevel + $statMods['FlatArmorMod']) * (1+$statMods['PercentArmorMod']);
$champ['HP'] = ($statsRef['hp'] + $statsRef['hpperlevel'] * $champLevel + $statMods['FlatHPPoolMod']) * (1+$statMods['PercentHPPoolMod']);
$champ['HP5'] = ($statsRef['hpregen'] + $statsRef['hpregenperlevel'] * $champLevel + $statMods['FlatHPRegenMod']) * (1+$statMods['PercentHPRegenMod']);
$champ['MR'] = ($statsRef['spellblock'] + $statsRef['spellblockperlevel'] * $champLevel + $statMods['FlatSpellBlockMod']) * (1+$statMods['PercentSpellBlockMod']);
$champ['PEHP'] = $champ['HP'] * (1 + $champ['Armor']/100);
$champ['MEHP'] = $champ['HP'] * (1 + $champ['MR']/100);
$champ['AP'] = $statMods['FlatMagicDamageMod'] * (1+$statMods['PercentMagicDamageMod']);
$champ['CDR'] = $statMods['rPercentCooldownMod']; // not working
$champ['MagicRed'] = 0; // not working
$champ['MagicRedp'] = 0; // not working
$champ['MagicPen'] = 0; // not working
$champ['MagicPenp'] = 0; // not working
$champ['MP'] = ($statsRef['mp'] + $statsRef['mpperlevel'] * ($champLevel-1) + $statMods['FlatMPPoolMod']) * (1+$statMods['PercentMPPoolMod']);
$champ['MP5'] = ($statsRef['mpregen'] + $statsRef['mpregenperlevel'] * ($champLevel-1) + $statMods['FlatMPRegenMod']) * (1+$statMods['PercentMPRegenMod']);
$champ['SpellVamp'] = $statMods['PercentSpellVampMod'];


// var_dump($statMods); // testing

// Add item bonus stats
/*for ($i = 0; i < 6; $i++)
{
	switch($items[i])
	{
		case "Abyssal Scepter":
			$champ["AP"] += 70;
			$champ["MR"] += 45;
			// UNIQUE Aura: Reduces the Magic Resist of nearby enemies by 20.
			break;
		case "Aegis of the Legion":
			$champ["HP"] += 200;
			$champ["Armor"] += 20;
			// UNIQUE Aura - Legion: Grants nearby allies +20 Magic Resist and +10 Health Regen per 5 seconds.
			break;
		case "Amplifying Tome":
			$champ["AP"] += 20;
			break;
		case "Ancient Coin":
			$champ["HP5"] += 5;
			$champ["MP5"] += 3;
			// UNIQUE Passive - Favor: Being near a minion death without dealing the killing blow grants 2 Gold.
			break;
		case "Archangel's Staff"
			$champ["MP"] += 250;
			$champ["AP"] += 60;
			$champ["MP5"] += 10;
			// UNIQUE Passive - Insight: Grants Ability Power equal to 3% of maximum Mana.
			// UNIQUE Passive - Mana Charge: Grants +8 maximum Mana (max +750 Mana) for each spell cast and Mana expenditure (occurs up to 2 times every 8 seconds). Transforms into Seraph's Embrace at +750 Mana.
			break;
		case "Archangel's Staff (Crystal Scar)"
			$champ["MP"] += 250;
			$champ["AP"] += 60;
			$champ["MP5"] += 10;
			// UNIQUE Passive - Insight: Grants Ability Power equal to 3% of maximum Mana.
			// UNIQUE Passive - Mana Charge: Grants +10 maximum Mana (max +750 Mana) for each spell cast and Mana expenditure (occurs up to 2 times every 6 seconds). Transforms into Seraph's Embrace at +750 Mana.
			break;
	}
}*/

//getChampionInfo();

echo 
    '<tr>
        <th colspan="3">Offensive</th>
        <th	colspan="3">Defensive</th>
		<th	colspan="3">Magical</th>
	</tr>
	<tr>
		<td> 
			<p>Armor Reduction (flat)</p>
			<p>Armor Reduction (%)</p>
			<p>Armor Penetration (flat)</p>
			<p>Armor Penetration (%)</p>
			<p>Attack Damage</p>
			<p>Attack Speed</p>
			<p>Critical Strike Chance</p>
			<p>Critical Strike Damage</p>
			<p>Life Steal</p>
			<p>Movement Speed</p>
		</td>
		<td>
			<p ID="ArmorRed">' . $champ['ArmorRed'] . '</p>
			<p ID="ArmorRedp">' . $champ['ArmorRedp'] . '%</p>
			<p ID="ArmorPen">' . $champ['ArmorPen'] . '</p>
			<p ID="ArmorPenp">' . $champ['ArmorPenp'] . '%</p>
			<p ID="AD">' . $champ['AD'] . '</p>
			<p ID="AS">' . round($champ['AS'], 3) . '</p>
			<p ID="CritChance">' . $champ['CritChance'] . '%</p>
			<p ID="CritDamage">+' . $champ['CritDamage'] . '%</p>
			<p ID="LifeSteal">' . $champ['LifeSteal'] . '%</p>
			<p ID="MoveSpeed">' . $champ['MS'] . '</p>
		</td>
		<td class="bonusStats">
			<p ID="ArmorRedBonus">(+' . ($champ['ArmorRed'] - $champInitial['ArmorRed']) . ')</p>
			<p ID="ArmorRedpBonus">(+' . ($champ['ArmorRedp'] - $champInitial['ArmorRedp']) . '%)</p>
			<p ID="ArmorPenBonus">(+' . ($champ['ArmorPen'] - $champInitial['ArmorPen']) . ')</p>
			<p ID="ArmorPenpBonus">(+' . ($champ['ArmorPenp'] - $champInitial['ArmorPenp']) . '%)</p>
			<p ID="ADBonus">(+' . ($champ['AD'] - $champInitial['AD']) . ')</p>
			<p ID="ASBonus">(+' . round($champ['AS'] - $champInitial['AS'], 3) . ')</p>
			<p ID="CritChanceBonus">(+' . ($champ['CritChance'] - $champInitial['CritChance']) . '%)</p>
			<p ID="CritDamageBonus">(+' . ($champ['CritDamage'] - $champInitial['CritDamage']) . '%)</p>
			<p ID="LifeStealBonus">(+' . ($champ['LifeSteal'] - $champInitial['LifeSteal']) . '%)</p>
			<p ID="MoveSpeedBonus">(+' . ($champ['MS'] - $champInitial['MS']) . ')</p>
		</td>
		<td>
			<p>Armor</p>
			<p>Health</p>
			<p>Health Regen / 5</p>
			<p>Magic Resistance</p>
			<p>Physical EHP</p>
			<p>Magical EHP</p>
		</td>
		<td>
			<p ID="Armor">' . $champ['Armor'] . '</p>
			<p ID="HP">' . $champ['HP'] . '</p>
			<p ID="HP5">' . $champ['HP5'] . '</p>
			<p ID="MR">' . $champ['MR'] . '</p>
			<p ID="PEHP">' . $champ['PEHP'] . '</p>
			<p ID="MEHP">' . $champ['MEHP'] . '</p>
		</td>
		<td class="bonusStats">
			<p ID="ArmorBonus">(+' . ($champ['Armor'] - $champInitial['Armor']) . ')</p>
			<p ID="HPBonus">(+' . ($champ['HP'] - $champInitial['HP']) . ')</p>
			<p ID="HP5Bonus">(+' . ($champ['HP5'] - $champInitial['HP5']) . ')</p>
			<p ID="MRBonus">(+' . ($champ['MR'] - $champInitial['MR']) . ')</p>
			<p ID="PEHP">(+' . ($champ['PEHP'] - $champInitial['PEHP']) . ')</p>
			<p ID="MEHP">(+' . ($champ['MEHP'] - $champInitial['MEHP']) . ')</p>
		</td>
		<td>
			<p>Ability Power</p>
			<p>Cooldown Reduction</p>
			<p>Magic Reduction (flat)</p>
			<p>Magic Reduction (%)</p>
			<p>Magic Penetration (flat)</p>
			<p>Magic Penetration (%)</p>
			<p>Mana</p>
			<p>Mana Regeneration / 5</p>
			<p>Spell Vamp</p>
		</td>
		<td>
			<p ID="AP">' . $champ['AP'] . '</p>
			<p ID="CDR">' . $champ['CDR'] . '</p>
			<p ID="MagicRed">' . $champ['MagicRed'] . '</p>
			<p ID="MagicRedp">' . $champ['MagicRedp'] . '%</p>
			<p ID="MagicPen">' . $champ['MagicPen'] . '</p>
			<p ID="MagicPenp">' . $champ['MagicPenp'] . '%</p>
			<p ID="MP">' . $champ['MP'] . '</p>
			<p ID="MP5">' . $champ['MP5'] . '</p>
			<p ID="SpellVamp">' . $champ['SpellVamp'] . '</p>
		</td>
		<td class="bonusStats">
			<p ID="APBonus">(+' . ($champ['AP'] - $champInitial['AP']) . ')</p>
			<p ID="CDRBonus">(+' . ($champ['CDR'] - $champInitial['CDR']) . ')</p>
			<p ID="MagicRedBonus">(+' . ($champ['MagicRed'] - $champInitial['MagicRed']) . ')</p>
			<p ID="MagicRedpBonus">(+' . ($champ['MagicRedp'] - $champInitial['MagicRedp']) . '%)</p>
			<p ID="MagicPenBonus">(+' . ($champ['MagicPen'] - $champInitial['MagicPen']) . ')</p>
			<p ID="MagicPenpBonus">(+' . ($champ['MagicPenp'] - $champInitial['MagicPenp']) . '%)</p>
			<p ID="MPBonus">(+' . ($champ['MP'] - $champInitial['MP']) . ')</p>
			<p ID="MP5Bonus">(+' . ($champ['MP5'] - $champInitial['MP5']) . ')</p>
			<p ID="SpellVampBonus">(+' . ($champ['SpellVamp'] - $champInitial['SpellVamp']) . ')</p>
		</td>
	</tr>';

curl_close($ch); // close session

?>