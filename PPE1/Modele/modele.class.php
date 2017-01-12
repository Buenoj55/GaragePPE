<?php
  class Modele
  {
    protected $pdo;
    protected $table;

    public function __construct ($serveur, $bdd, $user, $mdp)
    {
      $this->pdo = null;
      try
      {
        $this->pdo = new PDO("mysql:host=".$serveur.";dbname=".$bdd, $user, $mdp);
      }
      catch(Exception $exp)
      {
        echo "Erreur de connexion à la BDD";
      }
    }

    public function renseigner($table)
    {
      $this->table = $table;
    }

    public function selectAll()
    {
      if($this->pdo != null)
      {
        $requete = "SELECT * FROM ".$this->table.";";
        $select = $this->pdo->prepare ($requete);
        $select->execute(); // execution de la requete
        $resultats = $select->fetchAll();
        return $resultats;
      }
      else
      {
        return null;
      }
    }

    public function selectWhere($champs, $where)
    {
      $chaineChamps = implode (",", $champs);
      $clause = array();
      $donnees = array();

      foreach ($where as $cle => $valeur)
      {
        $clause[] = $cle." = :".$cle;
        $donnees[":".$cle] = $valeur;
      }
      $chaineClause = implode(" AND ", $clause);

      $requete = "SELECT ".$chaineChamps." FROM ".$this->table." WHERE ".$chaineClause.";";

      $select = $this->pdo->prepare($requete);
      $select->execute($donnees);
      $unResultat = $select->fetch();

      return $unResultat;
    }

    public function selectCount($where)
    {
      $clause = array();
      $donnees = array();

      foreach ($where as $cle => $valeur)
      {
        $clause[] = $cle." = :".$cle;
        $donnees[":".$cle] = $valeur;
      }
      $chaineClause = implode(" AND ", $clause);

      $requete = "SELECT COUNT(*) as nb FROM ".$this->table." WHERE ".$chaineClause.";";

      var_dump($requete);

      $select = $this->pdo->prepare($requete);
      $select->execute($donnees);
      $unResultat2 = $select->fetch();

      var_dump($donnees);

      return $unResultat2;
    }

    public function insert($tab)
    {
      $champs = array();
      $donnees = array();
      $valeurs = array();

      foreach ($tab as $cle => $value)
      {
        $champs[] = $cle;
        $valeurs[] = ":".$cle;
        $donnees[":".$cle] = $value;
      }

      $listeChamps = implode(", ", $champs);
      $chaineChamps = implode(", ", $valeurs);

      $requete = "INSERT INTO ".$this->table." (".$listeChamps.") VALUES (".$chaineChamps.");";

      var_dump($requete);

      $insert = $this->pdo->prepare($requete);
      $insert->execute($donnees);

      var_dump($donnees);
    }

    public function udate($tab, $where)
    {
      $champs = array();
      $donnees = array();
      $clause = array();

      foreach ($tab as $cle => $valeur)
      {
        $champs[] = $cle." = :".$cle;
        $donnees[":".$cle] = $valeur;
      }
      $chaineChamps = implode(", ", $champs);

      foreach ($where as $cle => $valeur)
      {
        $clause[] = $cle." = :".$cle;
        $donnees[":".$cle] = $valeur;
      }
      $chaineClause = implode(" AND ", $clause);

      $requete = "UPDATE ".$this->table." SET ".$chaineChamps." WHERE ".$chaineClause.";";
      $update = $this->pdo->prepare($requete);
      $update->execute();
    }

    public function delete($where)
    {
      $clause = array();
      $donnees = array();

      foreach ($where as $cle => $valeur)
      {
        $clause[] = $cle." = :".$cle;
        $donnees[":".$cle] = $valeur;
      }
      $chaineClause = implode(" AND ", $clause);

      $requete = "DELETE FROM ".$this->table." WHERE ".$chaineClause.";";
      $delete = $this->pdo->prepare($requete);
      $delete->execute($donnees);
    }
  }
?>
