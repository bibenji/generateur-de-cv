	// TABLEAU DES EXPRESSIONS REGULIERES
	var tabregs = {
		nom: '[A-Z]{2,}',
		pre: '[A-Z][a-z]{2,}',
		dat: '^\\d{2}\\/\\d{2}\\/\\d{4}$',
		adr: '[1-9][0-9]*\\s[a-z]*\\s[A-za-z]*',
		com: '.*',
		cod: '^\\d{5}$',
		vil: '[A-Z]{2,}',
		tel: '0\\d \\d{2} \\d{2} \\d{2} \\d{2}',
		mai: '.+@.+\\..+',
		nai: '^\\d{2}\\/\\d{2}\\/\\d{4}$',
		tit: '[A-Z].+',
		
		//ddb: this.dat,
		//ddf: this.dat,
		ddb : '^\\d{2}\\/\\d{2}\\/\\d{4}$',
		ddf: '^\\d{2}\\/\\d{2}\\/\\d{4}$',
		int: '[A-Z].+', // ATTENTION !
		str: '[A-Z].+', 
		
		con: '[A-Z].+'
		};
		
	// fonction vérifiant la saisie en direct
	function verifSaisie(elem, val) {
		var unereg = tabregs[elem.id.substr(4,3)];
		if (unereg) {
			console.log(elem.className.substr(0,6));
			if(elem.className.substr(0,6) == 'cl-int') elem.className = 'cl-int ';
			else elem.className = '';
						
			var testreg = new RegExp(unereg);
			var resultat = testreg.test(val);
			if (!resultat) elem.className += 'error';
			
			
			
		}
	}
		
	
	
	// INITIALISE LES SPANS ET LE MODE DE SAISIE
	function forEvent(elem, valatstart) {
		if (elem.nextSibling) elem.nextSibling.value = elem.innerText;
		elem.setAttribute('contenteditable', 'true');		
		elem.addEventListener('keypress', function(event) {
			// console.log(event.charCode);
			if ((this.innerText == valatstart) && (event.charCode != 0)) { this.innerText = '';}
		});
		elem.addEventListener('keyup', function() {
			this.nextSibling.value = this.innerText;
			verifSaisie(this, this.innerText);			
		});
		elem.addEventListener('blur', function() {
			if (this.nextSibling.value == '') this.innerText = valatstart;
		});
	}
	// INITIALISATION DES CHAMPS INITIAUX (ide, tit, obj)
	var lecv = document.getElementById('lecv');
	var lesspans = lecv.getElementsByTagName('span');
	var atstart = [];
	for (var i = 0, imax = lesspans.length; i < imax; i++) {
		atstart[i] = lesspans[i].innerText;		
		forEvent(lesspans[i], atstart[i]);
	}
	
	// FONCTION D'AJOUT DE FONCTION DE SUPPRESSION
	function addSuppr(elem) {
		elem.addEventListener('click', function() {
			suppr(this);
		});
	}
	
	// FONCTION DE SUPPRESSION
	function suppr(elem) {
		var found = false;
		while (found == false) {
			elem = elem.parentNode;
			// console.log(elem.nodeName);
			if (elem.nodeName == 'TABLE') {
				found = true;
				elem.parentNode.removeChild(elem);
			}
		}
	}
	
	
	// INITIALISE LES BOUTONS D'AJOUT
	function addOneInf(cat, nb) {
		var newTable = document.createElement('table');
		var newTr = document.createElement('tr');
		var newTd = document.createElement('td');
		var newMark = document.createElement('mark');
		newMark.innerText = 'X';
		addSuppr(newMark);
		newTd.appendChild(newMark);
		newTd.className = 'col1';
		newTr.appendChild(newTd);
		newTd = document.createElement('td');
		var newSpan = document.createElement('span');
		newSpan.id = cat+'-int-'+nb;
		newSpan.innerText = 'Rubrique';
		forEvent(newSpan, newSpan.innerText);
		newTd.appendChild(newSpan);
		var newInput = document.createElement('input');
		newInput.type = "hidden";
		newInput.name = cat+'-int-'+nb;
		newInput.id = 'inp-'+cat+'-int-'+nb;
		newTd.appendChild(newInput);
		newTd.appendChild(document.createTextNode(' : '));
		
		newSpan = document.createElement('span');
		newSpan.id = cat+'-con-'+nb;
		newSpan.innerText = 'Contenu...';
		forEvent(newSpan, newSpan.innerText);
		newTd.appendChild(newSpan);
		newInput = document.createElement('input');
		newInput.type = "hidden";
		newInput.name = cat+'-con-'+nb;
		newInput.id = 'inp-'+cat+'-con'+nb;
		newTd.appendChild(newInput);		
		
		newTr.appendChild(newTd);
		newTable.appendChild(newTr);
		document.getElementById(cat).appendChild(newTable);
		
		// <span id="inf-1-con">Pas très très bon encore LOL !</span><input type="text" id="inp-inf-1-con"></p>
	}
	function addOne(cat, nb) {
		var base = [
			['ddb', '01/01/2016'],
			['ddf', '31/12/2016'],
			['int', 'Intitulé'],
			['str', 'Structure'],
			['vil', 'VILLE'],
			['cod', '00000']];
		lesnewspans = [], lesnewinputs = [];
		for (i = 0, imax = base.length; i < imax; i++) {
			lesnewspans[i] = document.createElement('span');
			lesnewspans[i].id = cat+'-'+base[i][0]+'-'+nb;
			lesnewspans[i].className = 'cl-'+base[i][0];
			lesnewspans[i].innerHTML = base[i][1];
			lesnewinputs[i] = document.createElement('input');
			lesnewinputs[i].type = 'hidden';
			lesnewinputs[i].name = cat+'-'+base[i][0]+'-'+nb;
			lesnewinputs[i].id = 'inp-'+cat+'-'+base[i][0]+'-'+nb;
			forEvent(lesnewspans[i], lesnewspans[i].innerText);
		}
		var newTable = document.createElement('table');
		
		var newTr = document.createElement('tr');
		
		var newTd = document.createElement('td');
		newTd.className = 'col1';
		var newMark = document.createElement('mark');
		newMark.innerText = 'X';
		addSuppr(newMark);
		newTd.appendChild(newMark);
		newTr.appendChild(newTd);
		
		newTd = document.createElement('td');
		newTd.className = 'col2';
		newTd.appendChild(lesnewspans[0]);
		newTd.appendChild(lesnewinputs[0]);
		newTd.appendChild(document.createTextNode(' - '));
		newTd.appendChild(lesnewspans[1]);
		newTd.appendChild(lesnewinputs[1]);
		newTr.appendChild(newTd);
		
		newTd = document.createElement('td');
		newTd.className = 'col3';
		newTd.appendChild(lesnewspans[2]);
		newTd.appendChild(lesnewinputs[2]);
		newTr.appendChild(newTd);
		
		newTable.appendChild(newTr);
		
		newTr = document.createElement('tr');
		newTd = document.createElement('td');
		newTd.className = 'col1';
		newTr.appendChild(newTd);
		newTd = document.createElement('td');
		newTd.className = 'col2';
		newTr.appendChild(newTd);
		newTd = document.createElement('td');
		newTd.className = 'col3';
		newTd.appendChild(lesnewspans[3]);
		newTd.appendChild(lesnewinputs[3]);
		newTd.appendChild(document.createTextNode(', '));
		newTd.appendChild(lesnewspans[4]);
		newTd.appendChild(lesnewinputs[4]);
		newTd.appendChild(document.createTextNode(' ('));
		newTd.appendChild(lesnewspans[5]);
		newTd.appendChild(lesnewinputs[5]);
		newTd.appendChild(document.createTextNode(')'));
		newTr.appendChild(newTd);
		
		newTable.appendChild(newTr);
		document.getElementById(cat).appendChild(newTable);
	}
	
	var nb_xp = document.getElementById('compte_xp').value;
	var nb_for = 0;
	var nb_inf = 0;
	var add_exp = document.getElementById('exp-but-more');
	add_exp.addEventListener('click', function() {
			addOne('exp', nb_xp);
			nb_xp++;
		});
	var add_for = document.getElementById('for-but-more');
	add_for.addEventListener('click', function() {
			addOne('for', nb_for);
			nb_for++;
		});
	var add_inf = document.getElementById('inf-but-more');
	add_inf.addEventListener('click', function() {
			addOneInf('inf', nb_inf);
			nb_inf++;
		});
	
	

	// INITIALISE LES RONDS DE COULEUR	
	var lesronds = document.querySelectorAll("#lesronds span");
	// console.log(lesronds.length);
	for (var i = 0, imax = lesronds.length; i < imax; i++) {
		// console.log(lesronds[i]);
		lesronds[i].addEventListener('click', function() {
			var bg_ref = this.className.substr(3, this.className.length);
			document.body.style.backgroundImage = "url('images/"+bg_ref+".png')";
		});
	}
	
	// INITIALISE LE BOUTON DE DOWNLOAD
	var down = document.getElementById('download');
	down.addEventListener('click', function() {
			document.getElementById('main-form').submit();
	});
	// INITIALISE LE BOUTON GENLECV
	var genlecv = document.getElementById('genlecv');
	genlecv.addEventListener('click', function() {
			document.getElementById('main-form').submit();
	});

	// INITIALISE LES SELECTS DE DISPOSITION MISE EN PAGE
	var zone_cv = document.getElementById('gauche');
	var zone_dispo = document.getElementById('disposition-content');
	var lesselects = zone_dispo.getElementsByTagName('select');	
	for (var i = 0, imax = lesselects.length; i < imax; i++) {
		lesselects[i].selectedIndex = "0";
		lesselects[i].addEventListener('change', function() {
			var init_cible = this.id.split("-");
			var cibles = document.querySelectorAll(init_cible[2]);
			var prop = init_cible[3];
			for (var i = 0, imax = cibles.length; i < imax; i++) {
					
				// cibles[i].className = this.value;
				console.log(prop);
				eval('cibles['+i+'].'+prop+' = "'+this.value+'"');
			}
			
			
			
			
			
			// console.log('ça change' + cible);
			
		});
	}
	
	// GESTION DES ONGLETS
	function leswitch(elem) {
		// console.log("test");
		var em_name = elem.id.substr(5, elem.id.length)+'_content'; // calcule le nom de l'em
		var style = window.getComputedStyle(eval(em_name)).getPropertyValue("z-index");
		// console.log(style);
		eval(em_name).style.zIndex = style+2;
	}
		
	var reglages = document.getElementById('haut-lesreglages');
	var lesreglages_content = document.getElementById('lesreglages');
	var disposition = document.getElementById('haut-disposition');
	var disposition_content = document.getElementById('ladisposition');
		
	disposition.addEventListener('click', function() {
		disposition_content.style.zIndex = 2;
		lesreglages_content.style.zIndex = 1;
	});
	reglages.addEventListener('click', function() {
		lesreglages_content.style.zIndex = 2;
		disposition_content.style.zIndex = 1;
	});
	
	// TEST DE REFRESH
	var lereset = document.getElementById('reset');
	lereset.addEventListener('click', function() {
		console.log(sid);
		
        var xhr = new XMLHttpRequest();
        xhr.open('GET', './ajax/reset.php');
        
        // If specified, responseType must be empty string or "document"
        // xhr.responseType = 'document';
        // overrideMimeType() can be used to force the response to be parsed as XML
        // xhr.overrideMimeType('text/xml');
        
        xhr.onreadystatechange = function() {            
            console.log('xhr.readyState : ' + xhr.readyState);
            console.log('xhr.status : ' + xhr.status);
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Le code une fois la requête terminée et réussie…
                console.log(xhr.responseText);
                // console.log(xhr.response);
                // displayResults(xhr.responseXML);
				location.reload();
                
            }
        };
        
		xhr.setRequestHeader( 'Set-Cookie' , 'PHPSESSID=' + sid );
        xhr.send(null);
        
		// return xhr;        
		
		// location.reload();
    	
	});
	
	// INITIALISATION DES CHECKBOXES
	var checkboxes = document.getElementsByClassName('to_check');
	for (var i = 0, imax = checkboxes.length; i < imax; i++) {
		checkboxes[i].addEventListener('change', function() {
			// console.log(this.id.substring(6));
			var cible = document.getElementById(this.id.substring(6));
			// console.log(cible);
			if (cible.style.display == "none") cible.style.display = "block";
			else cible.style.display = "none";
						
		});
	}