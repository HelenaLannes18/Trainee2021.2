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
        $sql = "INSERT INTO {$table} (categoria) VALUES ('{$parametros['categoria']}')";

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

    public function editCategorias($table, $parametros, $id)
    {
        $sql = "UPDATE {$table} SET categoria='{$parametros['categoria']}' WHERE id = {$id}";

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    public function pesquisarCategoria($table, $parametros)
    {
        $sql = "SELECT * FROM {$table} WHERE categoria LIKE '%{$parametros}%'";

        $statement = $this->pdo->prepare($sql);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);

    }


    // Funções de Produtos
    public function insertProducts($table, $parametros)
    {
        $sql = "INSERT INTO {$table} (nome,descricao,preco,categoria,imagem) VALUES ('{$parametros['nome']}','{$parametros['descricao']}','{$parametros['preco']}','{$parametros['categoria']}','{$parametros['imagem']}')";

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteProducts($table, $id)
    {
        $sql = "DELETE FROM `{$table}` WHERE id = {$id}";

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function updateProducts($table, $parametros, $id)
    {
        $sql = "UPDATE {$table} SET nome='{$parametros['nome']}',descricao='{$parametros['descricao']}',preco='{$parametros['preco']}',categoria='{$parametros['categoria']}',imagem='{$parametros['imagem']}' WHERE id = {$id}";

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
