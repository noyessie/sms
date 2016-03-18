<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Library;

/**
 * Description of Backup
 *
 * @author patrick
 */
class Backup {

    //put your code here
    /**
     * fonction permettant de sauvegarder la bd
     */
    public function backup($serveur_sql, $username, $nom_de_la_base, $mot_de_passe) {
        echo "Votre base est en cours de sauvegarde.......";
        system('mysqldump --host=' . $serveur_sql . ' --user=' . $username . ' --password=' . $mot_de_passe . ' ' . $nom_de_la_base . ' > ' . $nom_de_la_base . '.sql');
        echo "C'est fini. Vous pouvez récupérer la base par FTP";
    }

    /**
     * fonction permettant de se connecter au serveur distant pour transferer les
     * fichiers
     */
    public function save($ftp_server, $login, $password, $destination_file, $source_file) {
        /*$ftp_server = "ftp.entreprise.net16.net";

        $login = "a6698046";
        $password = "000webhost";*/
        $connect = ftp_connect($ftp_server);
        if (ftp_login($connect, $login, $password)) {
            echo "Connecté en tant que $login sur $ftp_server<br>";
        } else {
            echo "Connexion impossible en tant que " . $login . "<br>";
        }
        /*$destination_file = "/public_html/sql3.sql";
        $source_file = "C:\wamp\www\sms\sql3.sql";*/
        $upload = ftp_put($connect, "$destination_file", "$source_file", FTP_ASCII);
        if (!$upload) {
            echo "Le transfert Ftp a échoué!";
        } else {
            echo "Téléchargement de " . $source_file . " sur " . $ftp_server . " en " . $destination_file;
        }
    }

}
