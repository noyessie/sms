#-- creation de la table user
CREATE TABLE IF NOT EXISTS user(
	id int auto_increment primary key,
	username VARCHAR(50),
	login VARCHAR(50) NOT NULL UNIQUE,
	password VARCHAR(50) NOT NULL,
	email VARCHAR(50)
);



#--creation de la table entreprise
CREATE TABLE IF NOT EXISTS entreprise(
	id INT auto_increment primary key,
	nom VARCHAR(50),
	numero VARCHAR(20),
	email VARCHAR(30)
);

CREATE TABLE IF NOT EXISTS departement(
	id INT auto_increment primary key,
	nom VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS stage(
	id INT auto_increment primary key,
	description VARCHAR(500),
	status INT,
	entrepriseId INT,
	departementId INT,
	CONSTRAINT fk_stage_entrepriseId_entreprise FOREIGN KEY (entrepriseId) REFERENCES entreprise(id) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_stage_departementId_departement FOREIGN KEY (departementId) REFERENCES departement(id) ON DELETE CASCADE ON UPDATE CASCADE
);

#--creation de la table etudiant
CREATE TABLE IF NOT EXISTS etudiant(
	matricule VARCHAR(10) PRIMARY KEY NOT NULL,
	nom VARCHAR(50) NOT NULL,
	prenom VARCHAR(50),
	niveau INT ,
	rangNiveauPrecedent INT NOT NULL,
	stage1Id INT,
	stage2Id INT,
	stage3Id INT,
	stageFinalId INT,
	departementId INT,
	userId INT UNIQUE,
	CONSTRAINT fk_etudiant_Stage1Id_stage FOREIGN KEY (stage1Id) REFERENCES stage(id) ON DELETE SET NULL ON UPDATE CASCADE,
	CONSTRAINT fk_etudiant_Stage2Id_stage FOREIGN KEY (stage2Id) REFERENCES stage(id) ON DELETE SET NULL ON UPDATE CASCADE,
	CONSTRAINT fk_etudiant_Stage3Id_stage FOREIGN KEY (stage3Id) REFERENCES stage(id) ON DELETE SET NULL ON UPDATE CASCADE,
	CONSTRAINT fk_etudiant_StageFinalId_stage FOREIGN KEY (stageFinalId) REFERENCES stage(id) ON DELETE SET NULL ON UPDATE CASCADE,
	CONSTRAINT fk_etudiant_userId_user FOREIGN KEY (userId) REFERENCES user(id) ON DELETE SET NULL ON UPDATE CASCADE,
	CONSTRAINT fk_etudiant_departementId_departement FOREIGN KEY (departementId) REFERENCES departement(id) ON DELETE SET NULL ON UPDATE CASCADE
);

