<?php

namespace App\Controllers;

use App\Core\App;
use Exception;
use PHPMailer\PHPMailer\PHPMailer;

class CategoriasController 
{
    public function view()
    {
        $categorias = App::get('database')->selectAll('categorias');

        return view('/admin/adm-categorias',compact('categorias'));
    }

    public function adicionar()
    {
        $parametros = [
            'categoria' => $_POST['categoria']
        ];

        App::get('database')->adicionaCategorias('categorias', $parametros);

        header('Location: /categorias');
    }

    public function apagar()
    {
        App::get('database')->delete('categorias', $_POST['id']);

        header('Location: /categorias');
    }

    public function update()
    {
        $parametros = [
            'nome' => $_POST['nome'],
        ];

        App::get('database')->editCategorias('categorias', $parametros, $_POST['id']);

        header('Location: /categorias');
    }
}

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






class ExampleController
{
    public function index()
    {
        
    }

    public function show()
    {

    }

    public function create()
    {
 
    }

    public function store()
    {

    }

    public function edit()
    {
  
    }

    public function update()
    {
        
    }

    public function delete()
    {
 
    }
}