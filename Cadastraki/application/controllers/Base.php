<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

    function __construct() {

        parent::__construct();

        $this->load->model("Tokens_model");
    }

    /**

     * Function Index

     *

     * Carrega a view da página principal

     *

     * @return (string)

     */
    public function Index() {

        //lista 10 tokens gerados
        //$data['tokens'] = $this->Tokens_model->ListTokens(10);
        $this->load->view('tokens/index');
    }

    /**

     * Function EnviarToken

     *

     * Gera o novo token, envia para o email e carrega a view 

     *

     * @return (string)

     */
    public function EnviarToken() {

        //gera o token a partir de uma string randômica, fazendo uso da função hash(), nativa do PHP
        //verifica se o token gerado é único, caso não seja, gera um novo   
        $token = hash('ripemd160', self::GenerateRandomString());
        if ($this->Tokens_model->IsUniqueToken($token)) {
            $_SESSION["token"] = $token;
            //manda email
            $this->email->from("cadastraki@gmail.com", 'Cadastraki');
            $this->email->subject("Autenticação de token");
            $this->email->to($_SESSION["email"]);
            $this->email->message($token);
            $this->email->send();
            $this->load->view('tokens/index');
        } else {
            self::EnviarToken();
        }
    }

    /**

     * Function GenerateRandomString

     *

     * Gera uma string randômica que será utilizada como token

     *

     * @param (string) $length Quantidade de caracteres do token

     * @return (string)

     */
    private function GenerateRandomString($length = 20) {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        //retorna o tamanho da string $characters

        $charactersLength = strlen($characters);

        $randomString = '';

        for ($i = 0; $i < $length; $i++) {

            //seleciona uma posição da string $characters de forma randômica e concatena na variável $randomString

            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        //retorna a string gerada

        return $randomString;
    }
    
      /**

     * Function ValidarToken

     *

     * Valida token armazenado na sessão com token digitado

     */
    public function ValidarToken() {
        echo $_SESSION["token"];
        $tokendigitado = $this->input->post("tokendigitado");
        if ($tokendigitado == $_SESSION["token"]) {   
            $_SESSION["tokenvalidado"]=TRUE;
            redirect("index.php/Estabelecimentos");        
        } else {
            $_SESSION["tokenvalidado"]=FALSE;
            redirect("index.php/user_login/logout");
        }
    }

}
