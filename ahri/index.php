<!DOCTYPE html>

<html>

<head>
	<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
	<title>League of Legends Theory Crafting</title>
</head>

<body>
	<div ID="container">
		<a href="http://www.waynechi.com"><div ID="header">LeagueTheory</div></a>
		<!-- Champion Information -->
		<div ID="champinfo">
			<img alt="Ahri" src="http://www.waynechi.com/pictures/Ahri.png" style="display: inline-block;box-shadow:0px 0px 3px black;">
			<div style="display:inline-block;width:300px;top:-30px;position:relative;margin-left:35px;">
				<p style="font-size:40px;margin:0;"><b>Ahri</b></p>
				<p style="font-size:30px;margin:0;">the Nine-Tailed Fox</p>
			</div>
			<!-- Champion Level Drop-down List -->
			<div style="display:inline-block;top:-30px;position:relative;font-size:20px">Champion Level: 
				<form action=""style="display:inline-block">
					<select name="cl" ID="champLevel">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
					</select>
				</form>
			</div>
			<!-- Update Stats Button -->
			<div id="updateButton" style="display:inline-block;top:-30px;left:100px;position:relative;font-size:30px;background-color:orange;padding:5px;border-radius:5px;" onclick="updateStatsCaller()">
				Update Stats
			</div>
		</div>
		<table id="mainStats">
			<tr>
				<th	colspan="3">Offensive</th>
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
					<p ID="ArmorRed">0</p>
					<p ID="ArmorRedp">0%</p>
					<p ID="ArmorPen">0</p>
					<p ID="ArmorPenp">0%</p>
					<p ID="AD">0</p>
					<p ID="AS">0</p>
					<p ID="CritChance">0</p>
					<p ID="CritDamage">0</p>
					<p ID="LifeSteal">0</p>
					<p ID="MoveSpeed">0</p>
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
					<p ID="Armor">0</p>
					<p ID="HP">0</p>
					<p ID="HP5">0</p>
					<p ID="MR">0</p>
					<p ID="PEHP">0</p>
					<p ID="MEHP">0</p>
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
					<p ID="AP">0</p>
					<p ID="CDR">0</p>
					<p ID="MagicRed">0</p>
					<p ID="MagicRedp">0%</p>
					<p ID="MagicPen">0</p>
					<p ID="MagicPenp">0%</p>
					<p ID="MP">0</p>
					<p ID="MP5">0</p>
					<p ID="SpellVamp">0</p>
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
			</tr>
		</table>
		<!-- http://www.webhostingtalk.com/showthread.php?t=1045871 -->
		<!-- Tabs -->
		<div class="tabs">
			<ul>
				<li id="li_tab1" onclick="tab('tab1')"><a>Masteries</a></li>
				<li id="li_tab2" onclick="tab('tab2')"><a>Runes</a></li>
				<li id="li_tab3" onclick="tab('tab3')"><a>Skills</a></li>
				<li id="li_tab4" onclick="tab('tab4')"><a>Items</a></li>
			</ul>
			<div id="Content_Area" class="active">
				<div id="tab1">
					<p>This is the text for tab 1.</p>
				</div>
				<div id="tab2" style="display: none;">
					<p>This is the text for tab 2.</p>
				</div>
				<div id="tab3" style="display: none;">
					<p>This is the text for tab 3.</p>
				</div>
				<div id="tab4" style="display: none;">
					<table>
						<tr>
							<td><form>Item 1 <select id="item1">
								<option>None</option>
								<option>Amplifying Tome</option>
								<option>Ancient Coin</option>
								<option>B.F. Sword</option>
								<option>Long Sword</option>
							</select></form></td>
							<td><form>Item 2 <select id="item2">
								<option>None</option>
								<option>Amplifying Tome</option>
								<option>Ancient Coin</option>
								<option>B.F. Sword</option>
								<option>Long Sword</option>
							</select></form></td>
							<td><form>Item 3 <select id="item3">
								<option>None</option>
								<option>Amplifying Tome</option>
								<option>Ancient Coin</option>
								<option>B.F. Sword</option>
								<option>Long Sword</option>
							</select></form></td>
							<td><form>Item 4 <select id="item4">
								<option>None</option>
								<option>Amplifying Tome</option>
								<option>Ancient Coin</option>
								<option>B.F. Sword</option>
								<option>Long Sword</option>
							</select></form></td>
							<td><form>Item 5 <select id="item5">
								<option>None</option>
								<option>Amplifying Tome</option>
								<option>Ancient Coin</option>
								<option>B.F. Sword</option>
								<option>Long Sword</option>
							</select></form></td>
							<td><form>Item 6 <select id="item6">
								<option>None</option>
								<option>Amplifying Tome</option>
								<option>Ancient Coin</option>
								<option>B.F. Sword</option>
								<option>Long Sword</option>
								</select></form></td>
						</tr>
					</table>
					<div id="itemResetButton" onclick="resetItems()">Reset</div>
				</div>
			</div> <!– End of Content_Area Div ->
		</div> <!– End of Tabs Div –>
	</div>
	<div ID="footer">
		By Wayne Chi and Richard Sun
		<!-- mostly Richard doe -->
	</div>
</body>

</html>

