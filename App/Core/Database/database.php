<?php 

namespace App\Database;
use PDO, PDOException;

class Database{
    private $conx;

    public function __construct($conf){
        try{
            $this->conx = new PDO('mysql:host='.$conf['db']['host'].';dbname='.$conf['db']['database'], $conf['db']['user'], $conf['db']['password']);
        }catch(PDOException $e){
            $message = 'erreur' . $e->getMessage() . '</hr>';
        }
    }

    public function requete($sql, $fetchMethod='fetchAll')
    {
        try{
            $result = $this->conx->query($sql, PDO::FETCH_ASSOC)->{$fetchMethod}();
        }catch(PDOException){
            $message = 'erreur' . $e->getMessage() . '</hr>';
        }
        return $result;
    }

    public function requeteSelect($table, $fetchMethod = 'fetchAll')
    {
        try {
            $resultat = $this->conx->query('SELECT * FROM `' . $table . '`', PDO::FETCH_ASSOC)->{$fetchMethod}();
        } catch (PDOException $e) {
            $message = "Erreur ! " . $e->getMessage() . "<hr>";
            die($message);
        }
        return $resultat;
    }
    public function requeteSelectRandom($table, $fetchMethod = 'fetchAll')
    {
        try {
            $resultat = $this->conx->query('SELECT * FROM `' . $table . '` ORDER BY RAND() LIMIT 6', PDO::FETCH_ASSOC)->{$fetchMethod}();
        } catch (PDOException $e) {
            $message = "Erreur ! " . $e->getMessage() . "<hr>";
            die($message);
        }
        return $resultat;
    }
    
    public function requeteSelectPost($table, $key, $value, $fetchMethod = 'fetchAll'){

        try {
            $resultat = $this->conx->query('SELECT * FROM `' . $table . '` WHERE `'. $key  . '` = '. $value  . ' ' , PDO::FETCH_ASSOC)->{$fetchMethod}();
        } catch (PDOException $e) {
            $message = "Erreur ! " . $e->getMessage() . "<hr>";
            die($message);
        }
        return $resultat;

    }

    public function inserer($table, $data)
    {
        $dataTab = get_object_vars($data);

        $fields = array_keys($dataTab);

        $values = array_values($dataTab);

        $values_count = count($values);
        $values_str = '';
        for($i=0;$i<$values_count;$i++){
            $values_str .= ':p' . $i;
            if($i<$values_count-1){
                $values_str .= ',' ;
            }
        }

        $reqInsert = 'INSERT INTO' . $table . '(' . implode(',',$fields).')';
        $reqInsert .= ' VALUES('.$values_str.')';
        $prepared = $this->conx->prepare($reqInsert);

        for($i=0;$i<$values_count;$i++){
            switch(gettype($values[$i])){
                case 'NULL' :
                    $type = PDO::PARAM_NULL;
                    break;
                case 'integer':
                    $type = PDO::PARAM_INT;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
            $prepared->bindParam(':p'.$i, $values[$i],$type);
        }
        return $prepared->execute();
    }


    public function __destruct(){
        $this->conx = null;
    }

    public function dernierIndex(){
        return $this->conx->lastInsertId();
    }
}
