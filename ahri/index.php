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
			<img id = champImage alt="Ahri" src="http://www.waynechi.com/pictures/Ahri.png" style="display: inline-block;box-shadow:0px 0px 3px black;">
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
								<option>Abyssal Scepter</option>
								<option>Aegis of the Legion</option>
								<option>Amplifying Tome</option>
								<option>Ancient Coin</option>
								<option>Archangel's Staff</option>
								<option>Archangel's Staff (Crystal Scar)</option>
								<option>Athene's Unholy Grail</option>
								<option>Atma's Impaler</option>
								<option>Augment: Death</option>
								<option>Augment: Gravity</option>
								<option>Augment: Power</option>
								<option>Avarice Blade</option>
								<option>B. F. Sword</option>
								<option>Banner of Command</option>
								<option>Banshee's Veil</option>
								<option>Berserker's Greaves</option>
								<option>Bilgewater Cutlass</option>
								<option>Blackfire Torch</option>
								<option>Blade of the Ruined King</option>
								<option>Blasting Wand</option>
								<option>Bonetooth Necklace</option>
								<option>Bonetooth Necklace</option>
								<option>Bonetooth Necklace</option>
								<option>Bonetooth Necklace</option>
								<option>Bonetooth Necklace</option>
								<option>Boots of Mobility</option>
								<option>Boots of Speed</option>
								<option>Boots of Swiftness</option>
								<option>Brawler's Gloves</option>
								<option>Catalyst the Protector</option>
								<option>Chain Vest</option>
								<option>Chalice of Harmony</option>
								<option>Cloak of Agility</option>
								<option>Cloth Armor</option>
								<option>Crystalline Flask</option>
								<option>Dagger</option>
								<option>Deathfire Grasp</option>
								<option>Doran's Blade</option>
								<option>Doran's Ring</option>
								<option>Doran's Shield</option>
								<option>Elixir of Brilliance</option>
								<option>Elixir of Fortitude</option>
								<option>Entropy</option>
								<option>Executioner's Calling</option>
								<option>Explorer's Ward</option>
								<option>Face of the Mountain</option>
								<option>Faerie Charm</option>
								<option>Farsight Orb (Trinket)</option>
								<option>Fiendish Codex</option>
								<option>Frost Queen's Claim</option>
								<option>Frostfang</option>
								<option>Frozen Heart</option>
								<option>Frozen Mallet</option>
								<option>Giant's Belt</option>
								<option>Glacial Shroud</option>
								<option>Greater Lens (Trinket)</option>
								<option>Greater Orb (Trinket)</option>
								<option>Greater Stealth Totem (Trinket)</option>
								<option>Greater Totem (Trinket)</option>
								<option>Greater Vision Totem (Trinket)</option>
								<option>Grez's Spectral Lantern</option>
								<option>Guardian Angel</option>
								<option>Guardian's Horn</option>
								<option>Guinsoo's Rageblade</option>
								<option>Haunting Guise</option>
								<option>Head of Kha'Zix</option>
								<option>Health Potion</option>
								<option>Hexdrinker</option>
								<option>Hextech Gunblade</option>
								<option>Hextech Revolver</option>
								<option>Hextech Sweeper</option>
								<option>Hunter's Machete</option>
								<option>Iceborn Gauntlet</option>
								<option>Ichor of Illumination</option>
								<option>Ichor of Rage</option>
								<option>Infinity Edge</option>
								<option>Ionian Boots of Lucidity</option>
								<option>Kindlegem</option>
								<option>Last Whisper</option>
								<option>Liandry's Torment</option>
								<option>Lich Bane</option>
								<option>Locket of the Iron Solari</option>
								<option>Long Sword</option>
								<option>Lord Van Damm's Pillager</option>
								<option>Madred's Razors</option>
								<option>Mana Potion</option>
								<option>Manamune</option>
								<option>Manamune (Crystal Scar)</option>
								<option>Maw of Malmortius</option>
								<option>Mejai's Soulstealer</option>
								<option>Mercurial Scimitar</option>
								<option>Mercury's Treads</option>
								<option>Mikael's Crucible</option>
								<option>Moonflair Spellblade</option>
								<option>Morellonomicon</option>
								<option>Muramana</option>
								<option>Muramana</option>
								<option>Nashor's Tooth</option>
								<option>Needlessly Large Rod</option>
								<option>Negatron Cloak</option>
								<option>Ninja Tabi</option>
								<option>Nomad's Medallion</option>
								<option>Null-Magic Mantle</option>
								<option>Odyn's Veil</option>
								<option>Ohmwrecker</option>
								<option>Oracle's Extract</option>
								<option>Oracle's Lens (Trinket)</option>
								<option>Orb of Winter</option>
								<option>Overlord's Bloodmail</option>
								<option>Phage</option>
								<option>Phantom Dancer</option>
								<option>Pickaxe</option>
								<option>Poro-Snax</option>
								<option>Prospector's Blade</option>
								<option>Prospector's Ring</option>
								<option>Quicksilver Sash</option>
								<option>Rabadon's Deathcap</option>
								<option>Randuin's Omen</option>
								<option>Ravenous Hydra (Melee Only)</option>
								<option>Recurve Bow</option>
								<option>Rejuvenation Bead</option>
								<option>Relic Shield</option>
								<option>Rod of Ages</option>
								<option>Rod of Ages (Crystal Scar)</option>
								<option>Ruby Crystal</option>
								<option>Ruby Sightstone</option>
								<option>Runaan's Hurricane (Ranged Only)</option>
								<option>Rylai's Crystal Scepter</option>
								<option>Sanguine Blade</option>
								<option>Sapphire Crystal</option>
								<option>Scrying Orb (Trinket)</option>
								<option>Seeker's Armguard</option>
								<option>Seraph's Embrace</option>
								<option>Seraph's Embrace</option>
								<option>Sheen</option>
								<option>Sightstone</option>
								<option>Sorcerer's Shoes</option>
								<option>Spectre's Cowl</option>
								<option>Spellthief's Edge</option>
								<option>Spirit Stone</option>
								<option>Spirit Visage</option>
								<option>Spirit of the Ancient Golem</option>
								<option>Spirit of the Elder Lizard</option>
								<option>Spirit of the Spectral Wraith</option>
								<option>Statikk Shiv</option>
								<option>Stealth Ward</option>
								<option>Stinger</option>
								<option>Sunfire Cape</option>
								<option>Sweeping Lens (Trinket)</option>
								<option>Sword of the Divine</option>
								<option>Sword of the Occult</option>
								<option>Talisman of Ascension</option>
								<option>Targon's Brace</option>
								<option>Tear of the Goddess</option>
								<option>Tear of the Goddess (Crystal Scar)</option>
								<option>The Black Cleaver</option>
								<option>The Bloodthirster</option>
								<option>The Brutalizer</option>
								<option>The Hex Core</option>
								<option>The Lightbringer</option>
								<option>Thornmail</option>
								<option>Tiamat (Melee Only)</option>
								<option>Total Biscuit of Rejuvenation</option>
								<option>Total Biscuit of Rejuvenation</option>
								<option>Trinity Force</option>
								<option>Twin Shadows</option>
								<option>Twin Shadows</option>
								<option>Vampiric Scepter</option>
								<option>Vision Ward</option>
								<option>Void Staff</option>
								<option>Warden's Mail</option>
								<option>Warding Totem (Trinket)</option>
								<option>Warmog's Armor</option>
								<option>Wicked Hatchet</option>
								<option>Will of the Ancients</option>
								<option>Wit's End</option>
								<option>Wooglet's Witchcap</option>
								<option>Wriggle's Lantern</option>
								<option>Youmuu's Ghostblade</option>
								<option>Zeal</option>
								<option>Zeke's Herald</option>
								<option>Zephyr</option>
								<option>Zhonya's Hourglass</option>
							</select></form></td>
							<td><form>Item 2 <select id="item2">
								<option>None</option>
								<option>Abyssal Scepter</option>
								<option>Aegis of the Legion</option>
								<option>Amplifying Tome</option>
								<option>Ancient Coin</option>
								<option>Archangel's Staff</option>
								<option>Archangel's Staff (Crystal Scar)</option>
								<option>Athene's Unholy Grail</option>
								<option>Atma's Impaler</option>
								<option>Augment: Death</option>
								<option>Augment: Gravity</option>
								<option>Augment: Power</option>
								<option>Avarice Blade</option>
								<option>B. F. Sword</option>
								<option>Banner of Command</option>
								<option>Banshee's Veil</option>
								<option>Berserker's Greaves</option>
								<option>Bilgewater Cutlass</option>
								<option>Blackfire Torch</option>
								<option>Blade of the Ruined King</option>
								<option>Blasting Wand</option>
								<option>Bonetooth Necklace</option>
								<option>Bonetooth Necklace</option>
								<option>Bonetooth Necklace</option>
								<option>Bonetooth Necklace</option>
								<option>Bonetooth Necklace</option>
								<option>Boots of Mobility</option>
								<option>Boots of Speed</option>
								<option>Boots of Swiftness</option>
								<option>Brawler's Gloves</option>
								<option>Catalyst the Protector</option>
								<option>Chain Vest</option>
								<option>Chalice of Harmony</option>
								<option>Cloak of Agility</option>
								<option>Cloth Armor</option>
								<option>Crystalline Flask</option>
								<option>Dagger</option>
								<option>Deathfire Grasp</option>
								<option>Doran's Blade</option>
								<option>Doran's Ring</option>
								<option>Doran's Shield</option>
								<option>Elixir of Brilliance</option>
								<option>Elixir of Fortitude</option>
								<option>Entropy</option>
								<option>Executioner's Calling</option>
								<option>Explorer's Ward</option>
								<option>Face of the Mountain</option>
								<option>Faerie Charm</option>
								<option>Farsight Orb (Trinket)</option>
								<option>Fiendish Codex</option>
								<option>Frost Queen's Claim</option>
								<option>Frostfang</option>
								<option>Frozen Heart</option>
								<option>Frozen Mallet</option>
								<option>Giant's Belt</option>
								<option>Glacial Shroud</option>
								<option>Greater Lens (Trinket)</option>
								<option>Greater Orb (Trinket)</option>
								<option>Greater Stealth Totem (Trinket)</option>
								<option>Greater Totem (Trinket)</option>
								<option>Greater Vision Totem (Trinket)</option>
								<option>Grez's Spectral Lantern</option>
								<option>Guardian Angel</option>
								<option>Guardian's Horn</option>
								<option>Guinsoo's Rageblade</option>
								<option>Haunting Guise</option>
								<option>Head of Kha'Zix</option>
								<option>Health Potion</option>
								<option>Hexdrinker</option>
								<option>Hextech Gunblade</option>
								<option>Hextech Revolver</option>
								<option>Hextech Sweeper</option>
								<option>Hunter's Machete</option>
								<option>Iceborn Gauntlet</option>
								<option>Ichor of Illumination</option>
								<option>Ichor of Rage</option>
								<option>Infinity Edge</option>
								<option>Ionian Boots of Lucidity</option>
								<option>Kindlegem</option>
								<option>Last Whisper</option>
								<option>Liandry's Torment</option>
								<option>Lich Bane</option>
								<option>Locket of the Iron Solari</option>
								<option>Long Sword</option>
								<option>Lord Van Damm's Pillager</option>
								<option>Madred's Razors</option>
								<option>Mana Potion</option>
								<option>Manamune</option>
								<option>Manamune (Crystal Scar)</option>
								<option>Maw of Malmortius</option>
								<option>Mejai's Soulstealer</option>
								<option>Mercurial Scimitar</option>
								<option>Mercury's Treads</option>
								<option>Mikael's Crucible</option>
								<option>Moonflair Spellblade</option>
								<option>Morellonomicon</option>
								<option>Muramana</option>
								<option>Muramana</option>
								<option>Nashor's Tooth</option>
								<option>Needlessly Large Rod</option>
								<option>Negatron Cloak</option>
								<option>Ninja Tabi</option>
								<option>Nomad's Medallion</option>
								<option>Null-Magic Mantle</option>
								<option>Odyn's Veil</option>
								<option>Ohmwrecker</option>
								<option>Oracle's Extract</option>
								<option>Oracle's Lens (Trinket)</option>
								<option>Orb of Winter</option>
								<option>Overlord's Bloodmail</option>
								<option>Phage</option>
								<option>Phantom Dancer</option>
								<option>Pickaxe</option>
								<option>Poro-Snax</option>
								<option>Prospector's Blade</option>
								<option>Prospector's Ring</option>
								<option>Quicksilver Sash</option>
								<option>Rabadon's Deathcap</option>
								<option>Randuin's Omen</option>
								<option>Ravenous Hydra (Melee Only)</option>
								<option>Recurve Bow</option>
								<option>Rejuvenation Bead</option>
								<option>Relic Shield</option>
								<option>Rod of Ages</option>
								<option>Rod of Ages (Crystal Scar)</option>
								<option>Ruby Crystal</option>
								<option>Ruby Sightstone</option>
								<option>Runaan's Hurricane (Ranged Only)</option>
								<option>Rylai's Crystal Scepter</option>
								<option>Sanguine Blade</option>
								<option>Sapphire Crystal</option>
								<option>Scrying Orb (Trinket)</option>
								<option>Seeker's Armguard</option>
								<option>Seraph's Embrace</option>
								<option>Seraph's Embrace</option>
								<option>Sheen</option>
								<option>Sightstone</option>
								<option>Sorcerer's Shoes</option>
								<option>Spectre's Cowl</option>
								<option>Spellthief's Edge</option>
								<option>Spirit Stone</option>
								<option>Spirit Visage</option>
								<option>Spirit of the Ancient Golem</option>
								<option>Spirit of the Elder Lizard</option>
								<option>Spirit of the Spectral Wraith</option>
								<option>Statikk Shiv</option>
								<option>Stealth Ward</option>
								<option>Stinger</option>
								<option>Sunfire Cape</option>
								<option>Sweeping Lens (Trinket)</option>
								<option>Sword of the Divine</option>
								<option>Sword of the Occult</option>
								<option>Talisman of Ascension</option>
								<option>Targon's Brace</option>
								<option>Tear of the Goddess</option>
								<option>Tear of the Goddess (Crystal Scar)</option>
								<option>The Black Cleaver</option>
								<option>The Bloodthirster</option>
								<option>The Brutalizer</option>
								<option>The Hex Core</option>
								<option>The Lightbringer</option>
								<option>Thornmail</option>
								<option>Tiamat (Melee Only)</option>
								<option>Total Biscuit of Rejuvenation</option>
								<option>Total Biscuit of Rejuvenation</option>
								<option>Trinity Force</option>
								<option>Twin Shadows</option>
								<option>Twin Shadows</option>
								<option>Vampiric Scepter</option>
								<option>Vision Ward</option>
								<option>Void Staff</option>
								<option>Warden's Mail</option>
								<option>Warding Totem (Trinket)</option>
								<option>Warmog's Armor</option>
								<option>Wicked Hatchet</option>
								<option>Will of the Ancients</option>
								<option>Wit's End</option>
								<option>Wooglet's Witchcap</option>
								<option>Wriggle's Lantern</option>
								<option>Youmuu's Ghostblade</option>
								<option>Zeal</option>
								<option>Zeke's Herald</option>
								<option>Zephyr</option>
								<option>Zhonya's Hourglass</option>
							</select></form></td>
							<td><form>Item 3 <select id="item3">
								<option>None</option>
								<option>Abyssal Scepter</option>
								<option>Aegis of the Legion</option>
								<option>Amplifying Tome</option>
								<option>Ancient Coin</option>
								<option>Archangel's Staff</option>
								<option>Archangel's Staff (Crystal Scar)</option>
								<option>Athene's Unholy Grail</option>
								<option>Atma's Impaler</option>
								<option>Augment: Death</option>
								<option>Augment: Gravity</option>
								<option>Augment: Power</option>
								<option>Avarice Blade</option>
								<option>B. F. Sword</option>
								<option>Banner of Command</option>
								<option>Banshee's Veil</option>
								<option>Berserker's Greaves</option>
								<option>Bilgewater Cutlass</option>
								<option>Blackfire Torch</option>
								<option>Blade of the Ruined King</option>
								<option>Blasting Wand</option>
								<option>Bonetooth Necklace</option>
								<option>Bonetooth Necklace</option>
								<option>Bonetooth Necklace</option>
								<option>Bonetooth Necklace</option>
								<option>Bonetooth Necklace</option>
								<option>Boots of Mobility</option>
								<option>Boots of Speed</option>
								<option>Boots of Swiftness</option>
								<option>Brawler's Gloves</option>
								<option>Catalyst the Protector</option>
								<option>Chain Vest</option>
								<option>Chalice of Harmony</option>
								<option>Cloak of Agility</option>
								<option>Cloth Armor</option>
								<option>Crystalline Flask</option>
								<option>Dagger</option>
								<option>Deathfire Grasp</option>
								<option>Doran's Blade</option>
								<option>Doran's Ring</option>
								<option>Doran's Shield</option>
								<option>Elixir of Brilliance</option>
								<option>Elixir of Fortitude</option>
								<option>Entropy</option>
								<option>Executioner's Calling</option>
								<option>Explorer's Ward</option>
								<option>Face of the Mountain</option>
								<option>Faerie Charm</option>
								<option>Farsight Orb (Trinket)</option>
								<option>Fiendish Codex</option>
								<option>Frost Queen's Claim</option>
								<option>Frostfang</option>
								<option>Frozen Heart</option>
								<option>Frozen Mallet</option>
								<option>Giant's Belt</option>
								<option>Glacial Shroud</option>
								<option>Greater Lens (Trinket)</option>
								<option>Greater Orb (Trinket)</option>
								<option>Greater Stealth Totem (Trinket)</option>
								<option>Greater Totem (Trinket)</option>
								<option>Greater Vision Totem (Trinket)</option>
								<option>Grez's Spectral Lantern</option>
								<option>Guardian Angel</option>
								<option>Guardian's Horn</option>
								<option>Guinsoo's Rageblade</option>
								<option>Haunting Guise</option>
								<option>Head of Kha'Zix</option>
								<option>Health Potion</option>
								<option>Hexdrinker</option>
								<option>Hextech Gunblade</option>
								<option>Hextech Revolver</option>
								<option>Hextech Sweeper</option>
								<option>Hunter's Machete</option>
								<option>Iceborn Gauntlet</option>
								<option>Ichor of Illumination</option>
								<option>Ichor of Rage</option>
								<option>Infinity Edge</option>
								<option>Ionian Boots of Lucidity</option>
								<option>Kindlegem</option>
								<option>Last Whisper</option>
								<option>Liandry's Torment</option>
								<option>Lich Bane</option>
								<option>Locket of the Iron Solari</option>
								<option>Long Sword</option>
								<option>Lord Van Damm's Pillager</option>
								<option>Madred's Razors</option>
								<option>Mana Potion</option>
								<option>Manamune</option>
								<option>Manamune (Crystal Scar)</option>
								<option>Maw of Malmortius</option>
								<option>Mejai's Soulstealer</option>
								<option>Mercurial Scimitar</option>
								<option>Mercury's Treads</option>
								<option>Mikael's Crucible</option>
								<option>Moonflair Spellblade</option>
								<option>Morellonomicon</option>
								<option>Muramana</option>
								<option>Muramana</option>
								<option>Nashor's Tooth</option>
								<option>Needlessly Large Rod</option>
								<option>Negatron Cloak</option>
								<option>Ninja Tabi</option>
								<option>Nomad's Medallion</option>
								<option>Null-Magic Mantle</option>
								<option>Odyn's Veil</option>
								<option>Ohmwrecker</option>
								<option>Oracle's Extract</option>
								<option>Oracle's Lens (Trinket)</option>
								<option>Orb of Winter</option>
								<option>Overlord's Bloodmail</option>
								<option>Phage</option>
								<option>Phantom Dancer</option>
								<option>Pickaxe</option>
								<option>Poro-Snax</option>
								<option>Prospector's Blade</option>
								<option>Prospector's Ring</option>
								<option>Quicksilver Sash</option>
								<option>Rabadon's Deathcap</option>
								<option>Randuin's Omen</option>
								<option>Ravenous Hydra (Melee Only)</option>
								<option>Recurve Bow</option>
								<option>Rejuvenation Bead</option>
								<option>Relic Shield</option>
								<option>Rod of Ages</option>
								<option>Rod of Ages (Crystal Scar)</option>
								<option>Ruby Crystal</option>
								<option>Ruby Sightstone</option>
								<option>Runaan's Hurricane (Ranged Only)</option>
								<option>Rylai's Crystal Scepter</option>
								<option>Sanguine Blade</option>
								<option>Sapphire Crystal</option>
								<option>Scrying Orb (Trinket)</option>
								<option>Seeker's Armguard</option>
								<option>Seraph's Embrace</option>
								<option>Seraph's Embrace</option>
								<option>Sheen</option>
								<option>Sightstone</option>
								<option>Sorcerer's Shoes</option>
								<option>Spectre's Cowl</option>
								<option>Spellthief's Edge</option>
								<option>Spirit Stone</option>
								<option>Spirit Visage</option>
								<option>Spirit of the Ancient Golem</option>
								<option>Spirit of the Elder Lizard</option>
								<option>Spirit of the Spectral Wraith</option>
								<option>Statikk Shiv</option>
								<option>Stealth Ward</option>
								<option>Stinger</option>
								<option>Sunfire Cape</option>
								<option>Sweeping Lens (Trinket)</option>
								<option>Sword of the Divine</option>
								<option>Sword of the Occult</option>
								<option>Talisman of Ascension</option>
								<option>Targon's Brace</option>
								<option>Tear of the Goddess</option>
								<option>Tear of the Goddess (Crystal Scar)</option>
								<option>The Black Cleaver</option>
								<option>The Bloodthirster</option>
								<option>The Brutalizer</option>
								<option>The Hex Core</option>
								<option>The Lightbringer</option>
								<option>Thornmail</option>
								<option>Tiamat (Melee Only)</option>
								<option>Total Biscuit of Rejuvenation</option>
								<option>Total Biscuit of Rejuvenation</option>
								<option>Trinity Force</option>
								<option>Twin Shadows</option>
								<option>Twin Shadows</option>
								<option>Vampiric Scepter</option>
								<option>Vision Ward</option>
								<option>Void Staff</option>
								<option>Warden's Mail</option>
								<option>Warding Totem (Trinket)</option>
								<option>Warmog's Armor</option>
								<option>Wicked Hatchet</option>
								<option>Will of the Ancients</option>
								<option>Wit's End</option>
								<option>Wooglet's Witchcap</option>
								<option>Wriggle's Lantern</option>
								<option>Youmuu's Ghostblade</option>
								<option>Zeal</option>
								<option>Zeke's Herald</option>
								<option>Zephyr</option>
								<option>Zhonya's Hourglass</option>
							</select></form></td></tr>
							<tr><td><form>Item 4 <select id="item4">
								<option>None</option>
								<option>Abyssal Scepter</option>
								<option>Aegis of the Legion</option>
								<option>Amplifying Tome</option>
								<option>Ancient Coin</option>
								<option>Archangel's Staff</option>
								<option>Archangel's Staff (Crystal Scar)</option>
								<option>Athene's Unholy Grail</option>
								<option>Atma's Impaler</option>
								<option>Augment: Death</option>
								<option>Augment: Gravity</option>
								<option>Augment: Power</option>
								<option>Avarice Blade</option>
								<option>B. F. Sword</option>
								<option>Banner of Command</option>
								<option>Banshee's Veil</option>
								<option>Berserker's Greaves</option>
								<option>Bilgewater Cutlass</option>
								<option>Blackfire Torch</option>
								<option>Blade of the Ruined King</option>
								<option>Blasting Wand</option>
								<option>Bonetooth Necklace</option>
								<option>Bonetooth Necklace</option>
								<option>Bonetooth Necklace</option>
								<option>Bonetooth Necklace</option>
								<option>Bonetooth Necklace</option>
								<option>Boots of Mobility</option>
								<option>Boots of Speed</option>
								<option>Boots of Swiftness</option>
								<option>Brawler's Gloves</option>
								<option>Catalyst the Protector</option>
								<option>Chain Vest</option>
								<option>Chalice of Harmony</option>
								<option>Cloak of Agility</option>
								<option>Cloth Armor</option>
								<option>Crystalline Flask</option>
								<option>Dagger</option>
								<option>Deathfire Grasp</option>
								<option>Doran's Blade</option>
								<option>Doran's Ring</option>
								<option>Doran's Shield</option>
								<option>Elixir of Brilliance</option>
								<option>Elixir of Fortitude</option>
								<option>Entropy</option>
								<option>Executioner's Calling</option>
								<option>Explorer's Ward</option>
								<option>Face of the Mountain</option>
								<option>Faerie Charm</option>
								<option>Farsight Orb (Trinket)</option>
								<option>Fiendish Codex</option>
								<option>Frost Queen's Claim</option>
								<option>Frostfang</option>
								<option>Frozen Heart</option>
								<option>Frozen Mallet</option>
								<option>Giant's Belt</option>
								<option>Glacial Shroud</option>
								<option>Greater Lens (Trinket)</option>
								<option>Greater Orb (Trinket)</option>
								<option>Greater Stealth Totem (Trinket)</option>
								<option>Greater Totem (Trinket)</option>
								<option>Greater Vision Totem (Trinket)</option>
								<option>Grez's Spectral Lantern</option>
								<option>Guardian Angel</option>
								<option>Guardian's Horn</option>
								<option>Guinsoo's Rageblade</option>
								<option>Haunting Guise</option>
								<option>Head of Kha'Zix</option>
								<option>Health Potion</option>
								<option>Hexdrinker</option>
								<option>Hextech Gunblade</option>
								<option>Hextech Revolver</option>
								<option>Hextech Sweeper</option>
								<option>Hunter's Machete</option>
								<option>Iceborn Gauntlet</option>
								<option>Ichor of Illumination</option>
								<option>Ichor of Rage</option>
								<option>Infinity Edge</option>
								<option>Ionian Boots of Lucidity</option>
								<option>Kindlegem</option>
								<option>Last Whisper</option>
								<option>Liandry's Torment</option>
								<option>Lich Bane</option>
								<option>Locket of the Iron Solari</option>
								<option>Long Sword</option>
								<option>Lord Van Damm's Pillager</option>
								<option>Madred's Razors</option>
								<option>Mana Potion</option>
								<option>Manamune</option>
								<option>Manamune (Crystal Scar)</option>
								<option>Maw of Malmortius</option>
								<option>Mejai's Soulstealer</option>
								<option>Mercurial Scimitar</option>
								<option>Mercury's Treads</option>
								<option>Mikael's Crucible</option>
								<option>Moonflair Spellblade</option>
								<option>Morellonomicon</option>
								<option>Muramana</option>
								<option>Muramana</option>
								<option>Nashor's Tooth</option>
								<option>Needlessly Large Rod</option>
								<option>Negatron Cloak</option>
								<option>Ninja Tabi</option>
								<option>Nomad's Medallion</option>
								<option>Null-Magic Mantle</option>
								<option>Odyn's Veil</option>
								<option>Ohmwrecker</option>
								<option>Oracle's Extract</option>
								<option>Oracle's Lens (Trinket)</option>
								<option>Orb of Winter</option>
								<option>Overlord's Bloodmail</option>
								<option>Phage</option>
								<option>Phantom Dancer</option>
								<option>Pickaxe</option>
								<option>Poro-Snax</option>
								<option>Prospector's Blade</option>
								<option>Prospector's Ring</option>
								<option>Quicksilver Sash</option>
								<option>Rabadon's Deathcap</option>
								<option>Randuin's Omen</option>
								<option>Ravenous Hydra (Melee Only)</option>
								<option>Recurve Bow</option>
								<option>Rejuvenation Bead</option>
								<option>Relic Shield</option>
								<option>Rod of Ages</option>
								<option>Rod of Ages (Crystal Scar)</option>
								<option>Ruby Crystal</option>
								<option>Ruby Sightstone</option>
								<option>Runaan's Hurricane (Ranged Only)</option>
								<option>Rylai's Crystal Scepter</option>
								<option>Sanguine Blade</option>
								<option>Sapphire Crystal</option>
								<option>Scrying Orb (Trinket)</option>
								<option>Seeker's Armguard</option>
								<option>Seraph's Embrace</option>
								<option>Seraph's Embrace</option>
								<option>Sheen</option>
								<option>Sightstone</option>
								<option>Sorcerer's Shoes</option>
								<option>Spectre's Cowl</option>
								<option>Spellthief's Edge</option>
								<option>Spirit Stone</option>
								<option>Spirit Visage</option>
								<option>Spirit of the Ancient Golem</option>
								<option>Spirit of the Elder Lizard</option>
								<option>Spirit of the Spectral Wraith</option>
								<option>Statikk Shiv</option>
								<option>Stealth Ward</option>
								<option>Stinger</option>
								<option>Sunfire Cape</option>
								<option>Sweeping Lens (Trinket)</option>
								<option>Sword of the Divine</option>
								<option>Sword of the Occult</option>
								<option>Talisman of Ascension</option>
								<option>Targon's Brace</option>
								<option>Tear of the Goddess</option>
								<option>Tear of the Goddess (Crystal Scar)</option>
								<option>The Black Cleaver</option>
								<option>The Bloodthirster</option>
								<option>The Brutalizer</option>
								<option>The Hex Core</option>
								<option>The Lightbringer</option>
								<option>Thornmail</option>
								<option>Tiamat (Melee Only)</option>
								<option>Total Biscuit of Rejuvenation</option>
								<option>Total Biscuit of Rejuvenation</option>
								<option>Trinity Force</option>
								<option>Twin Shadows</option>
								<option>Twin Shadows</option>
								<option>Vampiric Scepter</option>
								<option>Vision Ward</option>
								<option>Void Staff</option>
								<option>Warden's Mail</option>
								<option>Warding Totem (Trinket)</option>
								<option>Warmog's Armor</option>
								<option>Wicked Hatchet</option>
								<option>Will of the Ancients</option>
								<option>Wit's End</option>
								<option>Wooglet's Witchcap</option>
								<option>Wriggle's Lantern</option>
								<option>Youmuu's Ghostblade</option>
								<option>Zeal</option>
								<option>Zeke's Herald</option>
								<option>Zephyr</option>
								<option>Zhonya's Hourglass</option>
							</select></form></td>
							<td><form>Item 5 <select id="item5">
								<option>None</option>
								<option>Abyssal Scepter</option>
								<option>Aegis of the Legion</option>
								<option>Amplifying Tome</option>
								<option>Ancient Coin</option>
								<option>Archangel's Staff</option>
								<option>Archangel's Staff (Crystal Scar)</option>
								<option>Athene's Unholy Grail</option>
								<option>Atma's Impaler</option>
								<option>Augment: Death</option>
								<option>Augment: Gravity</option>
								<option>Augment: Power</option>
								<option>Avarice Blade</option>
								<option>B. F. Sword</option>
								<option>Banner of Command</option>
								<option>Banshee's Veil</option>
								<option>Berserker's Greaves</option>
								<option>Bilgewater Cutlass</option>
								<option>Blackfire Torch</option>
								<option>Blade of the Ruined King</option>
								<option>Blasting Wand</option>
								<option>Bonetooth Necklace</option>
								<option>Bonetooth Necklace</option>
								<option>Bonetooth Necklace</option>
								<option>Bonetooth Necklace</option>
								<option>Bonetooth Necklace</option>
								<option>Boots of Mobility</option>
								<option>Boots of Speed</option>
								<option>Boots of Swiftness</option>
								<option>Brawler's Gloves</option>
								<option>Catalyst the Protector</option>
								<option>Chain Vest</option>
								<option>Chalice of Harmony</option>
								<option>Cloak of Agility</option>
								<option>Cloth Armor</option>
								<option>Crystalline Flask</option>
								<option>Dagger</option>
								<option>Deathfire Grasp</option>
								<option>Doran's Blade</option>
								<option>Doran's Ring</option>
								<option>Doran's Shield</option>
								<option>Elixir of Brilliance</option>
								<option>Elixir of Fortitude</option>
								<option>Entropy</option>
								<option>Executioner's Calling</option>
								<option>Explorer's Ward</option>
								<option>Face of the Mountain</option>
								<option>Faerie Charm</option>
								<option>Farsight Orb (Trinket)</option>
								<option>Fiendish Codex</option>
								<option>Frost Queen's Claim</option>
								<option>Frostfang</option>
								<option>Frozen Heart</option>
								<option>Frozen Mallet</option>
								<option>Giant's Belt</option>
								<option>Glacial Shroud</option>
								<option>Greater Lens (Trinket)</option>
								<option>Greater Orb (Trinket)</option>
								<option>Greater Stealth Totem (Trinket)</option>
								<option>Greater Totem (Trinket)</option>
								<option>Greater Vision Totem (Trinket)</option>
								<option>Grez's Spectral Lantern</option>
								<option>Guardian Angel</option>
								<option>Guardian's Horn</option>
								<option>Guinsoo's Rageblade</option>
								<option>Haunting Guise</option>
								<option>Head of Kha'Zix</option>
								<option>Health Potion</option>
								<option>Hexdrinker</option>
								<option>Hextech Gunblade</option>
								<option>Hextech Revolver</option>
								<option>Hextech Sweeper</option>
								<option>Hunter's Machete</option>
								<option>Iceborn Gauntlet</option>
								<option>Ichor of Illumination</option>
								<option>Ichor of Rage</option>
								<option>Infinity Edge</option>
								<option>Ionian Boots of Lucidity</option>
								<option>Kindlegem</option>
								<option>Last Whisper</option>
								<option>Liandry's Torment</option>
								<option>Lich Bane</option>
								<option>Locket of the Iron Solari</option>
								<option>Long Sword</option>
								<option>Lord Van Damm's Pillager</option>
								<option>Madred's Razors</option>
								<option>Mana Potion</option>
								<option>Manamune</option>
								<option>Manamune (Crystal Scar)</option>
								<option>Maw of Malmortius</option>
								<option>Mejai's Soulstealer</option>
								<option>Mercurial Scimitar</option>
								<option>Mercury's Treads</option>
								<option>Mikael's Crucible</option>
								<option>Moonflair Spellblade</option>
								<option>Morellonomicon</option>
								<option>Muramana</option>
								<option>Muramana</option>
								<option>Nashor's Tooth</option>
								<option>Needlessly Large Rod</option>
								<option>Negatron Cloak</option>
								<option>Ninja Tabi</option>
								<option>Nomad's Medallion</option>
								<option>Null-Magic Mantle</option>
								<option>Odyn's Veil</option>
								<option>Ohmwrecker</option>
								<option>Oracle's Extract</option>
								<option>Oracle's Lens (Trinket)</option>
								<option>Orb of Winter</option>
								<option>Overlord's Bloodmail</option>
								<option>Phage</option>
								<option>Phantom Dancer</option>
								<option>Pickaxe</option>
								<option>Poro-Snax</option>
								<option>Prospector's Blade</option>
								<option>Prospector's Ring</option>
								<option>Quicksilver Sash</option>
								<option>Rabadon's Deathcap</option>
								<option>Randuin's Omen</option>
								<option>Ravenous Hydra (Melee Only)</option>
								<option>Recurve Bow</option>
								<option>Rejuvenation Bead</option>
								<option>Relic Shield</option>
								<option>Rod of Ages</option>
								<option>Rod of Ages (Crystal Scar)</option>
								<option>Ruby Crystal</option>
								<option>Ruby Sightstone</option>
								<option>Runaan's Hurricane (Ranged Only)</option>
								<option>Rylai's Crystal Scepter</option>
								<option>Sanguine Blade</option>
								<option>Sapphire Crystal</option>
								<option>Scrying Orb (Trinket)</option>
								<option>Seeker's Armguard</option>
								<option>Seraph's Embrace</option>
								<option>Seraph's Embrace</option>
								<option>Sheen</option>
								<option>Sightstone</option>
								<option>Sorcerer's Shoes</option>
								<option>Spectre's Cowl</option>
								<option>Spellthief's Edge</option>
								<option>Spirit Stone</option>
								<option>Spirit Visage</option>
								<option>Spirit of the Ancient Golem</option>
								<option>Spirit of the Elder Lizard</option>
								<option>Spirit of the Spectral Wraith</option>
								<option>Statikk Shiv</option>
								<option>Stealth Ward</option>
								<option>Stinger</option>
								<option>Sunfire Cape</option>
								<option>Sweeping Lens (Trinket)</option>
								<option>Sword of the Divine</option>
								<option>Sword of the Occult</option>
								<option>Talisman of Ascension</option>
								<option>Targon's Brace</option>
								<option>Tear of the Goddess</option>
								<option>Tear of the Goddess (Crystal Scar)</option>
								<option>The Black Cleaver</option>
								<option>The Bloodthirster</option>
								<option>The Brutalizer</option>
								<option>The Hex Core</option>
								<option>The Lightbringer</option>
								<option>Thornmail</option>
								<option>Tiamat (Melee Only)</option>
								<option>Total Biscuit of Rejuvenation</option>
								<option>Total Biscuit of Rejuvenation</option>
								<option>Trinity Force</option>
								<option>Twin Shadows</option>
								<option>Twin Shadows</option>
								<option>Vampiric Scepter</option>
								<option>Vision Ward</option>
								<option>Void Staff</option>
								<option>Warden's Mail</option>
								<option>Warding Totem (Trinket)</option>
								<option>Warmog's Armor</option>
								<option>Wicked Hatchet</option>
								<option>Will of the Ancients</option>
								<option>Wit's End</option>
								<option>Wooglet's Witchcap</option>
								<option>Wriggle's Lantern</option>
								<option>Youmuu's Ghostblade</option>
								<option>Zeal</option>
								<option>Zeke's Herald</option>
								<option>Zephyr</option>
								<option>Zhonya's Hourglass</option>
							</select></form></td>
							<td><form>Item 6 <select id="item6">
								<option>None</option>
								<option>Abyssal Scepter</option>
								<option>Aegis of the Legion</option>
								<option>Amplifying Tome</option>
								<option>Ancient Coin</option>
								<option>Archangel's Staff</option>
								<option>Archangel's Staff (Crystal Scar)</option>
								<option>Athene's Unholy Grail</option>
								<option>Atma's Impaler</option>
								<option>Augment: Death</option>
								<option>Augment: Gravity</option>
								<option>Augment: Power</option>
								<option>Avarice Blade</option>
								<option>B. F. Sword</option>
								<option>Banner of Command</option>
								<option>Banshee's Veil</option>
								<option>Berserker's Greaves</option>
								<option>Bilgewater Cutlass</option>
								<option>Blackfire Torch</option>
								<option>Blade of the Ruined King</option>
								<option>Blasting Wand</option>
								<option>Bonetooth Necklace</option>
								<option>Bonetooth Necklace</option>
								<option>Bonetooth Necklace</option>
								<option>Bonetooth Necklace</option>
								<option>Bonetooth Necklace</option>
								<option>Boots of Mobility</option>
								<option>Boots of Speed</option>
								<option>Boots of Swiftness</option>
								<option>Brawler's Gloves</option>
								<option>Catalyst the Protector</option>
								<option>Chain Vest</option>
								<option>Chalice of Harmony</option>
								<option>Cloak of Agility</option>
								<option>Cloth Armor</option>
								<option>Crystalline Flask</option>
								<option>Dagger</option>
								<option>Deathfire Grasp</option>
								<option>Doran's Blade</option>
								<option>Doran's Ring</option>
								<option>Doran's Shield</option>
								<option>Elixir of Brilliance</option>
								<option>Elixir of Fortitude</option>
								<option>Entropy</option>
								<option>Executioner's Calling</option>
								<option>Explorer's Ward</option>
								<option>Face of the Mountain</option>
								<option>Faerie Charm</option>
								<option>Farsight Orb (Trinket)</option>
								<option>Fiendish Codex</option>
								<option>Frost Queen's Claim</option>
								<option>Frostfang</option>
								<option>Frozen Heart</option>
								<option>Frozen Mallet</option>
								<option>Giant's Belt</option>
								<option>Glacial Shroud</option>
								<option>Greater Lens (Trinket)</option>
								<option>Greater Orb (Trinket)</option>
								<option>Greater Stealth Totem (Trinket)</option>
								<option>Greater Totem (Trinket)</option>
								<option>Greater Vision Totem (Trinket)</option>
								<option>Grez's Spectral Lantern</option>
								<option>Guardian Angel</option>
								<option>Guardian's Horn</option>
								<option>Guinsoo's Rageblade</option>
								<option>Haunting Guise</option>
								<option>Head of Kha'Zix</option>
								<option>Health Potion</option>
								<option>Hexdrinker</option>
								<option>Hextech Gunblade</option>
								<option>Hextech Revolver</option>
								<option>Hextech Sweeper</option>
								<option>Hunter's Machete</option>
								<option>Iceborn Gauntlet</option>
								<option>Ichor of Illumination</option>
								<option>Ichor of Rage</option>
								<option>Infinity Edge</option>
								<option>Ionian Boots of Lucidity</option>
								<option>Kindlegem</option>
								<option>Last Whisper</option>
								<option>Liandry's Torment</option>
								<option>Lich Bane</option>
								<option>Locket of the Iron Solari</option>
								<option>Long Sword</option>
								<option>Lord Van Damm's Pillager</option>
								<option>Madred's Razors</option>
								<option>Mana Potion</option>
								<option>Manamune</option>
								<option>Manamune (Crystal Scar)</option>
								<option>Maw of Malmortius</option>
								<option>Mejai's Soulstealer</option>
								<option>Mercurial Scimitar</option>
								<option>Mercury's Treads</option>
								<option>Mikael's Crucible</option>
								<option>Moonflair Spellblade</option>
								<option>Morellonomicon</option>
								<option>Muramana</option>
								<option>Muramana</option>
								<option>Nashor's Tooth</option>
								<option>Needlessly Large Rod</option>
								<option>Negatron Cloak</option>
								<option>Ninja Tabi</option>
								<option>Nomad's Medallion</option>
								<option>Null-Magic Mantle</option>
								<option>Odyn's Veil</option>
								<option>Ohmwrecker</option>
								<option>Oracle's Extract</option>
								<option>Oracle's Lens (Trinket)</option>
								<option>Orb of Winter</option>
								<option>Overlord's Bloodmail</option>
								<option>Phage</option>
								<option>Phantom Dancer</option>
								<option>Pickaxe</option>
								<option>Poro-Snax</option>
								<option>Prospector's Blade</option>
								<option>Prospector's Ring</option>
								<option>Quicksilver Sash</option>
								<option>Rabadon's Deathcap</option>
								<option>Randuin's Omen</option>
								<option>Ravenous Hydra (Melee Only)</option>
								<option>Recurve Bow</option>
								<option>Rejuvenation Bead</option>
								<option>Relic Shield</option>
								<option>Rod of Ages</option>
								<option>Rod of Ages (Crystal Scar)</option>
								<option>Ruby Crystal</option>
								<option>Ruby Sightstone</option>
								<option>Runaan's Hurricane (Ranged Only)</option>
								<option>Rylai's Crystal Scepter</option>
								<option>Sanguine Blade</option>
								<option>Sapphire Crystal</option>
								<option>Scrying Orb (Trinket)</option>
								<option>Seeker's Armguard</option>
								<option>Seraph's Embrace</option>
								<option>Seraph's Embrace</option>
								<option>Sheen</option>
								<option>Sightstone</option>
								<option>Sorcerer's Shoes</option>
								<option>Spectre's Cowl</option>
								<option>Spellthief's Edge</option>
								<option>Spirit Stone</option>
								<option>Spirit Visage</option>
								<option>Spirit of the Ancient Golem</option>
								<option>Spirit of the Elder Lizard</option>
								<option>Spirit of the Spectral Wraith</option>
								<option>Statikk Shiv</option>
								<option>Stealth Ward</option>
								<option>Stinger</option>
								<option>Sunfire Cape</option>
								<option>Sweeping Lens (Trinket)</option>
								<option>Sword of the Divine</option>
								<option>Sword of the Occult</option>
								<option>Talisman of Ascension</option>
								<option>Targon's Brace</option>
								<option>Tear of the Goddess</option>
								<option>Tear of the Goddess (Crystal Scar)</option>
								<option>The Black Cleaver</option>
								<option>The Bloodthirster</option>
								<option>The Brutalizer</option>
								<option>The Hex Core</option>
								<option>The Lightbringer</option>
								<option>Thornmail</option>
								<option>Tiamat (Melee Only)</option>
								<option>Total Biscuit of Rejuvenation</option>
								<option>Total Biscuit of Rejuvenation</option>
								<option>Trinity Force</option>
								<option>Twin Shadows</option>
								<option>Twin Shadows</option>
								<option>Vampiric Scepter</option>
								<option>Vision Ward</option>
								<option>Void Staff</option>
								<option>Warden's Mail</option>
								<option>Warding Totem (Trinket)</option>
								<option>Warmog's Armor</option>
								<option>Wicked Hatchet</option>
								<option>Will of the Ancients</option>
								<option>Wit's End</option>
								<option>Wooglet's Witchcap</option>
								<option>Wriggle's Lantern</option>
								<option>Youmuu's Ghostblade</option>
								<option>Zeal</option>
								<option>Zeke's Herald</option>
								<option>Zephyr</option>
								<option>Zhonya's Hourglass</option>
							</select></form></td>
						</tr>
					</table>
					<div id="itemResetButton" onclick="resetItems()">Reset</div>
				</div>
			</div> 
		</div>
	</div>
	<div ID="footer">
		By Wayne Chi and Richard Sun
		<!-- mostly Richard doe -->
	</div>
</body>

</html>