<?php
include 'itemStats.php';

// Get data from HTML request
$champLevel = $_REQUEST["champLevel"]; 
$items = $_REQUEST["items"];

// Create array that contains champion basic statistics
// Will need to change for each champion/Retrieve from database
$champBaseStats = array(
    'HP' => 380,
    'HP_l' => 80,
    'HP5' => 5.5,
    'HP5_l' => 0.6,
    'MP' => 250,
    'MP_l' => 50,
    'MP5' => 7,
    'MP5_l' => 0.6,
    'AD' => 50,
    'AD_l' => 3,
    'AS' => 0.668,
    'AS_l' => 0.02, // percentage
    'Armor' => 11,
    'Armor_l' => 3.5,
    'MR' => 30,
    'MR_l' => 0,
    'MS' => 330
);

// Contains current statistics for champion
$champ = array(
    'ArmorRed' => 0,
    'ArmorRedp' => 0, // percentage
    'ArmorPen' => 0,
    'ArmorPenp' => 0, // percentage
    'AD' => 0,
    'AS' => 0,
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
$champ['AD'] = $champBaseStats['AD'] + $champBaseStats['AD_l'] * $champLevel;
$champ['AS'] = $champBaseStats['AS'] + $champBaseStats['AS_l'] * $champLevel;
$champ['ASbonus'] = 0;
$champ['CritChance'] = 0;
$champ['CritDamage'] = 100;
$champ['LifeSteal'] = 0;
$champ['MS'] = $champBaseStats['MS'];
$champ['Armor'] = $champBaseStats['Armor'] + $champBaseStats['Armor_l'] * $champLevel;
$champ['HP'] = $champBaseStats['HP'] + $champBaseStats['HP_l'] * $champLevel;
$champ['HP5'] = $champBaseStats['HP5'] + $champBaseStats['HP5_l'] * $champLevel;
$champ['MR'] = $champBaseStats['MR'] + $champBaseStats['MR_l'] * $champLevel;
$champ['PEHP'] = $champ['HP'] * (1 + $champ['Armor']/100);
$champ['MEHP'] = $champ['HP'] * (1 + $champ['MR']/100);
$champ['AP'] = 0;
$champ['CDR'] = 0;
$champ['MagicRed'] = 0;
$champ['MagicRedp'] = 0;
$champ['MagicPen'] = 0;
$champ['MagicPenp'] = 0;
$champ['MP'] = $champBaseStats['MP'] + $champBaseStats['MP_l'] * ($champLevel-1);
$champ['MP5'] = $champBaseStats['MP5'] + $champBaseStats['MP5_l'] * ($champLevel-1);
$champ['SpellVamp'] = 0;

// Creates a copy of champion basic stats
$champInitial = $champ;

// Add item bonus stats
/*for ($i = 0; i < 6; i++)
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
			<p ID="ArmorRed">' . $itemStats['data']['1001']['stats']['FlatMovementSpeedMod'] . '</p>
			<p ID="ArmorRedp">' . $champ['ArmorRedp'] . '%</p>
			<p ID="ArmorPen">' . $champ['ArmorPen'] . '</p>
			<p ID="ArmorPenp">' . $champ['ArmorPenp'] . '%</p>
			<p ID="AD">' . $champ['AD'] . '</p>
			<p ID="AS">' . $champ['AS'] . '</p>
			<p ID="CritChance">' . $champ['CritChance'] . '</p>
			<p ID="CritDamage">' . $champ['CritDamage'] . '</p>
			<p ID="LifeSteal">' . $champ['LifeSteal'] . '</p>
			<p ID="MoveSpeed">' . $champ['MS'] . '</p>
		</td>
		<td class="bonusStats">
			<p ID="ArmorRedBonus">(+0)</p>
			<p ID="ArmorRedpBonus">(+0%)</p>
			<p ID="ArmorPenBonus">(+0)</p>
			<p ID="ArmorPenpBonus">(+0%)</p>
			<p ID="ADBonus">(+0)</p>
			<p ID="ASBonus">(+0)</p>
			<p ID="CritChanceBonus">(+0)</p>
			<p ID="CritDamageBonus">(+0)</p>
			<p ID="LifeStealBonus">(+0)</p>
			<p ID="MoveSpeedBonus">(+0)</p>
		</td>
		<td>
			<p>Armor</p>
			<p>Health</p>
			<p>Health Regeneration / 5</p>
			<p>Magic Resistance</p>
			<p>Physical Effective HP</p>
			<p>Magical Effective HP</p>
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
			<p ID="ArmorBonus">(+0)</p>
			<p ID="HPBonus">(+0)</p>
			<p ID="HP5Bonus">(+0)</p>
			<p ID="MRBonus">(+0)</p>
			<p ID="PEHP">(+0)</p>
			<p ID="MEHP">(+0)</p>
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
			<p ID="APBonus">(+0)</p>
			<p ID="CDRBonus">(+0)</p>
			<p ID="MagicRedBonus">(+0)</p>
			<p ID="MagicRedpBonus">(+0%)</p>
			<p ID="MagicPenBonus">(+0)</p>
			<p ID="MagicPenpBonus">(+0%)</p>
			<p ID="MPBonus">(+0)</p>
			<p ID="MP5Bonus">(+0)</p>
			<p ID="SpellVampBonus">(+0)</p>
		</td>
	</tr>'
?>