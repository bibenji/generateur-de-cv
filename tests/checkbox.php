<html>
<head>
<title></title>
</head>
<style>
h1 {
	color: blue;
}



[type="checkbox"]:not(:checked), [type="checkbox"]:checked {
	position: absolute;
	left: -9999px;
}

[type="checkbox"]:not(:checked) + label, [type="checkbox"]:checked + label {
	position: relative;
	padding-left: 25px;
	cursor: pointer;
}

[type="checkbox"]:not(:checked) + label:before, [type="checkbox"]:checked + label:before {
	content: '';
	position: absolute;
	left:0; top: 0;
	width: 17px; height: 17px;
	border: 1px solid #aaa;
	background: #f8f8f8;
	/*border-radius: 3px;*/
	/*box-shadow: inset 0 1px 3px rgba(0,0,0,.3);*/
}

[type="checkbox"]:not(:checked) + label:after, [type="checkbox"]:checked + label:after {
	content: '✔';
	position: absolute;
	top: 0; left: 4px;
	font-size: 14px;
	color: #09ad7e;
	transition: all .2s;
}

[type="checkbox"]:not(:checked) + label:after {
	opacity: 0;
	transform: scale(0);
}

[type="checkbox"]:checked + label:after {
	opacity: 1;
	transform: scale(2);
}

q::before { 
  content: "«\00A0";
  color: blue;
}
q::after {
  content: '\00A0»';
  color: red;
}

</style>
<body>
<h1>Style de checkbox</h1>

<input type="checkbox" id="check1" /> <label for="check1">ch1</label> Coucou<br />
<input type="checkbox" id="check2" /> <label for="check2">ch2</label> Coucou<br />



<q>Quelques guillemets</q>, dit-il, <q>sont mieux que pas du tout</q>

</body>
</html>