<?php
require_once(PATH_MODELS.'DAO.php');
require_once(PATH_ENTITY.'Utilisateur.php');
class UtilisateurDAO extends DAO{

    public function getUtilisateurWithEmail($mail){
        $req = $this->queryAll('SELECT * FROM utilisateur WHERE email = ?', [$mail]);
        if($req == false || !is_null($this->getErreur()))
            return null;
        else{
            foreach ($req as $user) {
                return new Utilisateur($user['id'], $user['nom'], $user['prenom'], $user['email'], $user['password'], $user['dateNaissance'], $user['sexe'], $user['codePostal'], $user['valide'], $user['admin'], $user['ban']);
            }
        }
        return null;
    }

    public function createUtilisateur($utilisateur){
        $req = $this->queryInsert('INSERT INTO utilisateur(nom, prenom, email, password, dateNaissance, sexe, codePostal, valide, admin, ban) VALUES(?,?,?,?,?,?,?,?,?,?)', [$utilisateur->getNom(), $utilisateur->getPrenom(), $utilisateur->getEmail(), $utilisateur->getPassword(),$utilisateur->getDateNaissance(), $utilisateur->getSexe(), $utilisateur->getCodePostal(), $utilisateur->getValide(), $utilisateur->getAdmin(), $utilisateur->getBan()]);
        return ($req && is_null($this->getErreur()));
    }

    public function getNextUtilisateurId(){
        $req = $this->queryRow('SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = "'.BD_DBNAME.'" AND TABLE_NAME = "utilisateur"');
        if($req == false || !is_null($this->getErreur()))
            return 0;
        return $req['AUTO_INCREMENT'];
    }

    public function getUtilisateurWithId($id){
        $req = $this->queryAll('SELECT * FROM utilisateur WHERE id = ?', [$id]);
        if($req == false || !is_null($this->getErreur()))
            return null;
        else{
            foreach ($req as $user) {
                return new Utilisateur($user['id'], $user['nom'], $user['prenom'], $user['email'], $user['password'], $user['dateNaissance'], $user['sexe'], $user['codePostal'], $user['valide'], $user['admin'], $user['ban']);
            }
        }
        return null;
    }

}