<?php

namespace App\Core\Database;

use Exception;
use PDO;

class QueryBuilder
{
    protected $pdo;


    public function selecionarUsuarios($table)
    {
        $sql = "select * from {$table}";
        
        try{
            
            $statement = $this->pdo->prepare($sql);

            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_CLASS);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    
    }

    public function adicionaUsuarios ($table, $parametros)
    {
        $sql = "INSERT INTO {$table} ('nome','email','senha','foto') VALUES ('{$parametros['nome']},'{$parametros['email']},'{$parametros['senha']},'{$parametros['foto']}')";

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

        } catch (Exception $e) {
            die($e->getMessage());
        }   
    }


    public function delete($table, $id)
    {
        $sql = "DELETE FROM {$table} WHERE id = {$id}";

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

        } catch (Exception $e) {
            die($e->getMessage());
        } 
    }

    public function editUsuarios($table, $parametros, $id)
    {
        $sql = "UPDATE {$table} SET 'nome'='{$parametros['nome']}','email'='{$parametros['email']}','senha'='{$parametros['senha']}','foto'='{$parametros['foto']}',WHERE id={$id}";

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

        } catch (Exception $e) {
            die($e->getMessage());
        }

    }
}
