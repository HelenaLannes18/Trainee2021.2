<?php

namespace App\Core\Database;

use Exception;
use PDO;

class QueryBuilder
{
    protected $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    } 

    public function selectAll($table)
    {
    
        $statement = $this->pdo->prepare("select * from {$table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    
    }

    // Funções Categorias

    public function adicionaCategorias ($table, $parametros)
    {
        $sql = "INSERT INTO '{$table}' ('categoria') VALUES ('{$parametros['categoria']}'";

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function delete($table, $id)
    {
        $sql = "DELETE FROM '{$table}' WHERE id = {$id}";

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

        } catch (Exception $e) {
            die($e->getMessage());
        } 
    }

    public function editCategorias($table, $parametros, $id)
    {
        $sql = "UPDATE `{$table}` SET 'categorias'='{$parametros['categoria']}'";

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    // Funções de Produtos
    public function insereProdutos($table, $parametros)
    {
        $sql = "INSERT INTO {$table} (nome,descricao,preco,categoria,foto) VALUES ('{$parametros['nome']}','{$parametros['descricao']}','{$parametros['preco']}','{$parametros['categoria']}','{$parametros['foto']}')";

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


}
