$(document).ready(function() {
	report(1);
});

function report(champLevel) {
	var champHealth = 395 + 85 * (champLevel-1);
	$('#GenHealth').text('Health: ' + champHealth);
	var champMana = 0; // Champ uses health
	$('#GenMana').text('Mana: N/A');
	var champAD = 55 + 3.2 * (champLevel-1);
	champAD = champAD.toFixed(0);
	$('#OffAD').text('Attack Damage: ' + champAD);
	var champAS = 0.651 * (1 + 0.03 * (champLevel-1));
	champAS = champAS.toFixed(3);
	$('#OffAS').text('Attack Speed: ' + champAS);
	var champArmor = 14 + 3.8 * (champLevel-1);
	champArmor = champArmor.toFixed(0);
	$('#DefArmor').text('Armor: ' + champArmor);
	var champMR = 30 + 1.25 * (champLevel-1);
	champMR = champMR.toFixed(0);
	$('#DefMR').text('Magic Resist: ' + champMR);
}