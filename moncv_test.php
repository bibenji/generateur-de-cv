<?php
session_start();

/* RECUPERATION DES DONNEES POSTEES */
// tout stocker dans la variable $_SESSION['DATA']
$_SESSION = array(); // pour éviter les problèmes
$spe = array('exp','for','inf');
foreach ($_POST as $key => $val)
{
	$key1 = substr($key, 0, 3);
	$key2 = substr($key, 4, 3);
	if (!in_array($key1, $spe))	$_SESSION['data'][$key1][$key2] = $val;
	else $_SESSION['data'][$key1][substr($key, strlen($key)-1, strlen($key))][substr(substr($key, 0, -2), 4)] = $val;
}

// détermination de l'objet du CV
// voir les cas où pas de titre au CV...
if (isset($_SESSION['data']['obj']['obj']))
{
	if ($_SESSION['data']['obj']['obj'] == 'Emploi')
	{
		$_SESSION['data']['obj']['obj'] = 'Actuellement à la recherche d\'un emploi, je vous fais part de ma candidature pour un poste au sein de votre structure.';
	}
	else
	{
		$_SESSION['data']['obj']['obj'] = 'Dans le cadre d\'une démarche de ré-orientation professionnelle, je souhaiterais effectuer un stage au sein de votre structure.';
	}
}

if (isset($_SESSION['data']['ide'])) $ide = $_SESSION['data']['ide'];
if (isset($_SESSION['data']['tit']['tit'])) $tit = $_SESSION['data']['tit']['tit'];
else $_SESSION['data']['tit']['tit'] = '';
if (isset($_SESSION['data']['obj']['obj'])) $obj = $_SESSION['data']['obj']['obj'];
else $_SESSION['data']['obj']['obj'] = '';
if (isset($_SESSION['data']['exp'])) $all_exp = $_SESSION['data']['exp'];
else $_SESSION['data']['exp'] = array();
if (isset($_SESSION['data']['for'])) $all_for = $_SESSION['data']['for'];
else $_SESSION['data']['for'] = array();
if (isset($_SESSION['data']['inf'])) $all_inf = $_SESSION['data']['inf'];
else $_SESSION['data']['inf'] = array();
?>

<pre>
<?php
var_dump($_SESSION);
?>
</pre>