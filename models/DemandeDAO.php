<?php

require_once(PATH_MODELS.'DAO.php');
require_once(PATH_ENTITY.'Demande.php');

class DemandeDAO extends DAO{

    public function getDemandeNonTraite(){
        $res = $this -> queryAll('SELECT * FROM demande WHERE enCours = 0 order by datePost asc');
        $list_demande = array();
        if ($res){
            require_once(PATH_ENTITY.'Demande.php');
            foreach($res as $temp){
                $list_demande[$temp['id']] = new Demande($temp['id'], $temp['anonymat'], $temp['contenu'], $temp['titre'], $temp['exposition'], $temp['ageMin'], $temp['ageMax'], $temp['sexe'], $temp['datePost'], $temp['idAuteur'], $temp['enCours']);
            }
        }
        return $list_demande;
    }

    public function getDemande($id){
        $res = $this->queryRow('SELECT * FROM demande WHERE id = ?', array($id));
        if($res){
            require_once(PATH_ENTITY.'Demande.php');
            return new Demande($res['id'], $res['anonymat'], $res['contenu'], $res['titre'], $res['exposition'], $res['ageMin'], $res['ageMax'], $res['sexe'], $res['datePost'], $res['idAuteur'], $res['enCours']);
        }
        return null;
    }

    public function getNom($id){
        $res = $this->queryRow('SELECT nom FROM utilisateur where id = ?', array($id));
        if($res){
            return $res['nom'];
        }
        else return null;
    }

    public function getDemandeByAuthor($idAuthor){
        $res = $this -> queryAll('SELECT * FROM demande WHERE idAuteur = ? order by datePost asc', [$idAuthor]);
        $list_demande = array();
        if ($res){
            require_once(PATH_ENTITY.'Demande.php');
            foreach($res as $temp){
                $list_demande[] = new Demande($temp['id'], $temp['anonymat'], $temp['contenu'], $temp['titre'], $temp['exposition'], $temp['ageMin'], $temp['ageMax'], $temp['sexe'], $temp['datePost'], $temp['idAuteur'], $temp['enCours']);
            }
        }
        return $list_demande;
    }

    public function createDemande($demande){
        $req = $this->queryInsert('INSERT INTO demande(anonymat, contenu, titre, exposition, ageMin, ageMax, sexe, datePost, idAuteur, enCours) VALUES(?,?,?,?,?,?,?,?,?,?)', [$demande->getAnonymat(), $demande->getContenu(), $demande->getTitre(), $demande->getExposition(), $demande->getAgeMin(), $demande->getAgeMax(), $demande->getSexe(),  $demande->getDatePost(), $demande->getIdAuteur(), $demande->getEnCours()]);
        return ($req && is_null($this->getErreur()));
    }

    public function getNextDemandeId(){
        $req = $this->queryRow('SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = "'.BD_DBNAME.'" AND TABLE_NAME = "demande"');
        if($req == false || !is_null($this->getErreur()))
            return 0;
        return $req['AUTO_INCREMENT'];
    }
}