
-- Table User

#-- creation de la table user
CREATE TABLE IF NOT EXISTS user(
  iduser int AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL,
  prenom VARCHAR(50) ,
  adressemail VARCHAR(200) NOT NULL,
  motdepasse VARCHAR(200) NOT NULL,
  CONSTRAINT pk_user PRIMARY KEY(iduser)
);


#-- creation de la table user
CREATE TABLE IF NOT EXISTS contact(
  idcontact INT AUTO_INCREMENT,
  nom VARCHAR(45) NOT NULL,
  prenom VARCHAR(45),
  adressemail VARCHAR(200) UNIQUE,
  CONSTRAINT pk_contact PRIMARY KEY(idcontact)
);


CREATE TABLE IF NOT EXISTS sms(
  idsms INT AUTO_INCREMENT,
  corps VARCHAR(1000) NOT NULL,
  dateEnregistrement TIMESTAMP,
  CONSTRAINT pk_sms PRIMARY KEY(idsms)

);

CREATE TABLE IF NOT EXISTS groupe (
  idgroupe INT AUTO_INCREMENT,
  nomGroupe VARCHAR(45) NOT NULL UNIQUE,
  CONSTRAINT pk_groupe PRIMARY KEY(idgroupe)
);

CREATE TABLE IF NOT EXISTS numero (
  idnumero INT AUTO_INCREMENT,
  numero VARCHAR(100) NOT NULL UNIQUE,
  contact_idcontact INT ,
  CONSTRAINT pk_numero PRIMARY KEY(idnumero),
  CONSTRAINT fk_numero_contactIdcontact_contact FOREIGN KEY (contact_idcontact) REFERENCES contact(idcontact) ON DELETE CASCADE ON UPDATE CASCADE

);


CREATE TABLE IF NOT EXISTS contact_has_groupe (
  id_contact_has_groupe INT AUTO_INCREMENT,
  contact_idcontact INT NOT NULL,
  groupe_idgroupe INT NOT NULL,
  CONSTRAINT pk_contact_has_groupe PRIMARY KEY(id_contact_has_groupe),
  CONSTRAINT fk_contactHasGroupe_contactIdcontact_contact FOREIGN KEY (contact_idcontact) REFERENCES contact(idcontact) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_contactHasGroupe_groupeIdgroupe_groupe FOREIGN KEY (groupe_idgroupe) REFERENCES groupe(idgroupe) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS sms_has_contact(
  id_sms_has_contact INT AUTO_INCREMENT,
  sms_idsms INT NOT NULL,
  contact_idcontact INT NOT NULL,
  etat VARCHAR(10),
  dateEnvoie TIMESTAMP,
  CONSTRAINT pk_sms_has_contact PRIMARY KEY(id_sms_has_contact),
  CONSTRAINT fk_smsHasContact_smsIdsms_sms FOREIGN KEY (sms_idsms) REFERENCES sms(idsms) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_smsHasContact_contactIdcontact_contact FOREIGN KEY (contact_idcontact) REFERENCES contact(idcontact) ON DELETE CASCADE ON UPDATE CASCADE

);
