
<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<html>
    <head>
        <link rel ="stylesheet" href=" <?= base_url($uri = "css/bootstrap.css") ?> " >
        <link rel ="stylesheet" href=" <?= base_url($uri = "css/login.css") ?> " >
        <link rel ="stylesheet" href=" <?= base_url($uri = "css/bootstrap.css") ?> " >
        <link rel="icon" href=" <?= base_url($uri = "img/icone-estabelecimento.ico") ?> "type="image/x-icon" />
        <title>Cadastraki - Autenticação de Token</title>

    </head>

    <body>

        <?php if ($_SESSION["logado"]) : ?>
            <div class ="container">  
                <div class="card card-container">
                    <div class="row">                                         
                        <div>
                            <h1><small>Autenticação de token</small></h1>    
                        </div>                
                        <p><a href="EnviarToken" title="Clique aqui para enviar o token">Clique aqui</a> para enviar o token ao seu email.</p>             
                        <form action="ValidarToken" method="post" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group">                    
                                <label>Digite aqui o token enviado ao seu email:</label>
                                <input  type="text" class = "form-control" name="tokendigitado" value="<?= set_value('tokendigitado') ?>" required/>
                            </div>
                            <div>
                                <input type="submit"  value="Validar" rid="validar" name="validar" class= "btn btn-lg btn-primary btn-block btn-signin"/>
                            </div>               
                        </form>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <?php redirect() ?>
        <?php endif; ?>
    </body>    
</html>
<?php ?>