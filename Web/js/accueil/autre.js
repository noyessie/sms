function verifAutreContact(){
	var selectBoxGroupeContact = document.form_contact.groupeContact;
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
	