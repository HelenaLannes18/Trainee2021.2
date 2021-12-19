<?php

namespace App\Controllers;

use App\Core\App;
use Exception;
use PHPMailer\PHPMailer\PHPMailer;

/* 
    Categorias - Controller
*/

class CategoriasController 
{
    public function view()
    {

        if(isset($_POST['buscar'])) {
            $param = $_POST['nome-categoria'];

            $categorias = App::get('database')->pesquisarCategoria('categorias', $param);
        } else {
            $categorias = App::get('database')->selectAll('categorias');
        }

        return view('admin/adm-categorias',compact('categorias'));

    }


    public function adicionar()
    {
        $parametros = [
            'categoria' => $_POST['categoria']
        ];

        App::get('database')->adicionaCategorias('categorias', $parametros);

        header('Location: /categorias-adm');
    }

    public function apagar()
    {
        App::get('database')->delete('categorias', $_POST['id']);

        header('Location: /categorias-adm');
    }

    public function editCategoria()
    {
        $parametros = [
            'categoria' => $_POST['categoria'],
        ];

        App::get('database')->editCategorias('categorias', $parametros, $_POST['id']);

        header('Location: /categorias-adm');
    }

}

/* 
    Contato - Controller
*/

class contatoController {

    public function viewContato()
    {
        return view('site/viewcontato');
    }

    public function enviarEmail()
    {
                
        //Variáveis
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $assunto = $_POST['assunto'];
        $mensagem = $_POST['mensagem'];
        $data_envio = date('d/m/Y');
        $hora_envio = date('H:i:s');

        if (!$nome || !$email || !$assunto || !$mensagem) {
            echo'cheguei aqui';
            die ();
            return redirect('contato');
        }

        //Compo E-mail
        $arquivo = "
            <html>
            <p><b>Nome: </b>{$nome}</p>
            <p><b>E-mail: </b>{$email}</p>
            <p><b>Assunto: </b>{$assunto}</p>
            <p><b>Mensagem: </b>{$mensagem}</p>
            <p>Este e-mail foi enviado em <b>{$data_envio}</b> às <b>{$hora_envio}</b></p>
            </html>
        ";
        
        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Username = 'spaceh404@gmail.com';
        $mail->Password = 'spaceh123';
        $mail->Port = 587;

        $mail->setFrom($email, $nome);
        $mail->addAddress('spaceh404@gmail.com');

        $mail->isHTML(true);

        $mail->Subject = $assunto;
        $mail->Body    = $arquivo;
        $mail->AltBody = strip_tags($arquivo);

        if (!$mail->send()) {
            echo 'Não foi possível enviar a mensagem.<br>';
            echo 'Erro: ' . $mail->ErrorInfo;
        } else {
            redirect('contato');
        }

        //Emails para quem será enviado o formulário
        // $destino = "spaceh404@gmail.com";
        // $assunto = "Contato pelo Site";

        // //Este sempre deverá existir para garantir a exibição correta dos caracteres
        // $headers  = "MIME-Version: 1.0\n";
        // $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        // $headers .= "From: $nome <spaceh404@gmail.com>";

        // //Enviar
        // mail($destino, $assunto, $arquivo, $headers);
        
        redirect('contato');

    }
}

/* 
    Produtos-ADM - Controller
*/

class ProdutosAdmController
{
    public function view()
    {
        $produtos = App::get('database')->selectAll('produtos');
        $categorias = App::get('database')->selectAll('categorias');

        return view('admin/adm-produtos',compact('produtos','categorias'));
    }

    public function create()
    {
        $parametros = [
            'nome' => $_POST['add-product-name'],
            'descricao' => $_POST['add-product-description'],
            'preco' => $_POST['add-product-price'],
            'categoria' => $_POST['add-product-category'],
            'imagem' => $_POST['add-product-image'],
        ];

        App::get('database')->insertProducts('produtos', $parametros);

        header('location: /produtos-adm');

    }

    public function delete()
    {
       App::get('database')->deleteProducts('produtos', $_POST['id']);
       
       header('location: /produtos-adm');       
    }

    public function update()
    {
        $parametros = [
            'nome' => $_POST['edit-product-name'],
            'descricao' => $_POST['edit-product-description'],
            'preco' => $_POST['edit-product-price'],
            'categoria' => $_POST['edit-product-category'],
            'imagem' => $_POST['edit-product-image'],
        ];

        App::get('database')->updateProducts('produtos', $parametros, $_POST['id']);

        header('location: /produtos-adm');
    }

}

/* 
    Produtos - Controller
*/

class ProdutosController
{
    public function view()
    {
        // Paginação
        
        if(isset($_GET['pagina'])) {
            $paginaAtual = $_GET['pagina'];
        } else {
            $paginaAtual = 1;
        }

        $pagina = (!empty($paginaAtual)) ? $paginaAtual : 1;
        $limitePorPagina = 5;
        $inicio = ($limitePorPagina * $pagina) - $limitePorPagina;
        $produtosT = App::get('database')->selectAll('produtos');
        $totalProdutos = count($produtosT);
        $totalPaginas = $totalProdutos / $limitePorPagina;

        // Busca
        if(isset($_GET['busca']) && $_GET['busca'] != '') {
            $busca = $_GET['busca'];
            $condicoes = [
                strlen($busca) ? 'nome LIKE "%'.str_replace(' ','%',$busca).'%" ' : null
            ];

            $where = implode(' AND ', $condicoes);

            $produtos = App::get('database')->pesquisarProdutos('produtos', $where, $inicio, $limitePorPagina);
        } else {
            $produtos = App::get('database')->selectPagination('produtos', $inicio, $limitePorPagina);
        }

        $paginacao = new \stdClass();
        $paginacao->pagina = $pagina;
        $paginacao->totalPaginas = $totalPaginas;
        $paginacao->totalProdutos = $totalProdutos;
        $paginacao->qntdPorPagina = $limitePorPagina;
        $paginacao->inicio = $inicio;


        return view('site/view-produtos',compact('produtos', 'paginacao'));

    }

}

/* 
    Dashboard - Controller
*/

class DashboardController
{
    public function view() {
        return view('admin/dashboard');
    }
}

/* 
    Login - Controller
*/


session_start();
class LoginController {

    public function view() {

        return view('admin/login');

    }
    public function login()
    {
        $email = $_GET['email'] ?? '';
        $senha = $_GET['senha'] ?? '';

        if( $email == 'admin' && $senha == 'admin') {
            $_SESSION['usuario'] = 'admin';

            header('Location: /usuarios');
        }

        $usuarios = App::get('database')->selectAll('usuarios');

        foreach ($usuarios as $usuario) :

        if( $usuario->email == $email && $usuario->senha == $senha) 
        { 
            $_SESSION['usuario'] = $usuario->nome;
      
            header('Location: /usuarios');
        }
        endforeach;

        $_SESSION['error'] = true;
        header('Location: /login');
    }

    public function deslogar() 
    {
        session_unset();
        session_destroy();
        header('Location: /login');
    }

}

/* 
    Usuários - Controller
*/
class ViewProdutos
{
    
    public function view()
    { 
        
        $produtos = App::get('database')->selectcomId('produtos',$_GET['id']);
        return view('produto',compact('produtos'));
    
    }
}

class ViewHomeController
{  

            
        public function view() {

            $produtosPorPagina = "4";
            $inicio = 0;
            $limite = 'LIMIT ' . $inicio . ',' . $produtosPorPagina;
            $produtos2 = App::get('database')->selectAll2('produtos');
            $produtos = App::get('database')->selectAll('produtos');
            $produtos = App::get('database')->selectAllPaginacao($limite,$produtos2);
    
            return view('site/viewhome',compact('produtos'));
    
        }
    
        }


class QuemSomosController
{   
    
    public function view() {
    
            return view('site/quem-somos');
        
    }
}

class UsuariosController 
{   

    public function view()
    {
        $usuarios = App::get('database')->selecionarUsuarios('usuarios');

        return view('admin/viewusuarios',compact('usuarios'));
    }

    public function adicionar()
    {
        $parametros = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
            'foto' => $_POST['foto']
        ];

        App::get('database')->adicionaUsuarios('usuarios', $parametros);

        header('Location: /usuarios');
    }

    public function apagar()
    {
        App::get('database')->delete('usuarios', $_POST['id']);

        header('Location: /usuarios');
    }

    public function update()
    {
        $parametros = [
            'nome' => $_POST['nome'],
            'email'=> $_POST['email'],
            'senha'=> $_POST['senha'],
            'foto'=> $_POST['foto']        
        ];

        App::get('database')->editUsuarios('usuarios', $parametros, $_POST['id']);

        header('Location: /usuarios');
    }

}

/* 
    Página - Controller
*/


class Pagination 
{   

    

    
}
