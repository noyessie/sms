	function charge()
	{
		var $var1=document.getElementById('erreur');
		var $var2=document.getElementById('succes');
		
		if(($var1.innerHTML!=null)&&($var1.innerHTML.length!=0))
		{
			document.location.href="#oNote";
		}
		if(($var2.innerHTML!=null)&&($var2.innerHTML.length!=0))
		{
		
			document.location.href="#oNote4";
		}
		$var1=null;
		$var2=null;
	}

function verifAutreInt(nombre){
	
	for (var j = 0; j < 5; j++) {
		
	
	var selectBoxNomContact=document.getElementById('inputNomContact'+j);
	var selectBoxOrganismeContact=document.getElementById('inputOrganismeContact'+j);
	var selectBoxTelephoneContact=document.getElementById('inputTelephoneContact'+j);
	var selectBoxBoitePostaleContact=document.getElementById('inputBoitePostaleContact'+j);
	var selectBoxEmailContact=document.getElementById('inputEmailContact'+j);
	//NomContact
	for (var i=0; i<selectBoxNomContact.options.length; i++) {
		if (selectBoxNomContact.options[i].selected) {
			if(selectBoxNomContact.options[i].value=="value0"){
				document.getElementById('autreNomContact'+j).style.display="block";
			}else
			{
				document.getElementById('autreNomContact'+j).style.display="none";
			}
		}
	}
	//organismeContact
	for (var i=0; i<selectBoxOrganismeContact.options.length; i++) {
		if (selectBoxOrganismeContact.options[i].selected) {
			if(selectBoxOrganismeContact.options[i].value=="value0"){
				document.getElementById('autreOrganismeContact'+j).style.display="block";
			}
			else
			{
				document.getElementById('autreOrganismeContact'+j).style.display="none";
			}
		}
	}
	//telephoneContact
	for (var i=0; i<selectBoxTelephoneContact.options.length; i++) {
		if (selectBoxTelephoneContact.options[i].selected) {
			if(selectBoxTelephoneContact.options[i].value=="value0"){
				document.getElementById('autreTelephoneContact'+j).style.display="block";
			}
			else
			{
				document.getElementById('autreTelephoneContact'+j).style.display="none";	
			}
		}
	}
	
	//emailContact
	for (var i=0; i<selectBoxEmailContact.options.length; i++) {
		if (selectBoxEmailContact.options[i].selected) {
			if(selectBoxEmailContact.options[i].value=="value0"){
				document.getElementById('autreEmailContact'+j).style.display="block";
			}
			else
			{
				document.getElementById('autreEmailContact'+j).style.display="none";
			}
		}
	}
	//boitePostaleContact
	for (var i=0; i<selectBoxBoitePostaleContact.options.length; i++) {
		if (selectBoxBoitePostaleContact.options[i].selected) {
			if(selectBoxBoitePostaleContact.options[i].value=="value0"){
				document.getElementById('autreBoitePostaleContact'+j).style.display="block";
			}
			else
			{
				document.getElementById('autreBoitePostaleContact'+j).style.display="none";
			}
		}
	}
	}

}
function verifAutreContact(){
	var selectBoxGroupeContact = document.contact.groupeContact;
        var selectBoxUploadGroupeContact = document.form_uploadContact.groupeContact;
	var autreGroupeContact = false;
	var autreUploadGroupeContact = false;
	//contact
	for (var i=0; i<selectBoxGroupeContact.options.length; i++) {
		if (selectBoxGroupeContact.options[i].selected) {
			if(selectBoxGroupeContact.options[i].value=="value0"){
				autreGroupeContact = true;
			}
		}
	}
	if(autreGroupeContact==true){
		document.getElementById('autreGroupe').style.display="block";
	} else {
		document.getElementById('autreGroupe').style.display="none";
	}
        //uploadcontact
	for (var i=0; i<selectBoxUploadGroupeContact.options.length; i++) {
		if (selectBoxUploadGroupeContact.options[i].selected) {
			if(selectBoxUploadGroupeContact.options[i].value=="value0"){
				autreUploadGroupeContact = true;
			}
		}
	}
	if(autreUploadGroupeContact==true){
		document.getElementById('autreUploadGroupe').style.display="block";
	} else {
		document.getElementById('autreUploadGroupe').style.display="none";
	}
}
	