$(document).ready(function() {
	updateStats(1);
	tab('tab1');
});

function updateStats(champLevel) {
	var champHealth = 395 + 85 * (champLevel-1);
	$('#GenHealth').text(champHealth);
	var champHP5 = 5.75 + 0.5 * (champLevel-1);
	champHP5 = champHP5.toFixed(2);
	$('#GenHP5').text(champHP5);
	var champMana = 0; // Champ uses health
	$('#GenMana').text('N/A');
	var champMP5 = 0; // Champ uses health
	$('#GenMP5').text('N/A');
	var champAD = 55 + 3.2 * (champLevel-1);
	champAD = champAD.toFixed(0);
	$('#OffAD').text(champAD);
	var champAS = 0.651 * (1 + 0.03 * (champLevel-1));
	champAS = champAS.toFixed(3);
	$('#OffAS').text(champAS);
	var champArmor = 14 + 3.8 * (champLevel-1);
	champArmor = champArmor.toFixed(0);
	$('#DefArmor').text(champArmor);
	var champMR = 30 + 1.25 * (champLevel-1);
	champMR = champMR.toFixed(0);
	$('#DefMR').text(champMR);
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