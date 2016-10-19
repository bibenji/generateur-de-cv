var linkgenererpdf = document.getElementById('linkgenererpdf');
if (linkgenererpdf != null)
{
	linkgenererpdf.addEventListener("click", function() {
		document.getElementById('leform').submit();
		});
}

var aside = document.getElementsByTagName('aside');
var all_select = aside[0].getElementsByTagName('select');

for (var i = 0, i_max = all_select.length; i < i_max; i++) // pour initialiser les champs hidden...
{
	if(all_select[i].id != 'modeleCV') // tous les select autre que modeleCV
	{
		all_select[i].addEventListener("change", function()
		{
			var fin_attribut = this.id.search("_");
			var attribut_cible = this.id.substr(0, fin_attribut);
			var id_cible = this.id.substr(fin_attribut + 1, this.id.length);
			//var cible = document.getElementById(id_cible);
			var cible = document.querySelectorAll(id_cible);
			var hidden_champ = document.getElementById('hidden_' + this.id);
			hidden_champ.value = this.value;			
			for (var j = 0, j_max = cible.length; j < j_max; j++)
			{				
				cible[j].style[attribut_cible] = this.value;
			}
			});
	}
	else // select modeleCV
	{
		all_select[i].addEventListener("change", function () {
		//console.log(document.getElementById('lecv') + ' et ' + this.value);
		document.getElementById('lecv').className = this.value;
		document.getElementById('hidden_modeleCV').value = this.value;
		});
	}	
}