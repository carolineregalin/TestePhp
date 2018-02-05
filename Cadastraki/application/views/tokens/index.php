
<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<html>
    <head>
        <link rel ="stylesheet" href=" <?= base_url($uri = "css/bootstrap.css") ?> " >
        <title>Cadastraki - Autenticação de Token</title>
        <link rel="icon" href="../../icone.png" type="image/gif" sizes="16x16"> 

    </head>

    <body>
        <div class="col-md-4">         
        </div>  
        <?php if ($_SESSION["logado"]) : ?>
            <div class="col-md-4">
                <div>
                    <h1>Autenticação de token</h1>    
                </div>                
                <p><a href="EnviarToken" title="Clique aqui para enviar o token">Clique aqui</a> para enviar o token ao seu email.</p>             
                <form action="ValidarToken" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">                    
                        <label>Digite aqui o token enviado ao seu email:</label>
                        <input  type="text" class = "form-control" name="tokendigitado" value="<?= set_value('tokendigitado') ?>" required/>
                    </div>
                    <div>
                        <input type="submit"  value="Validar" rid="validar" name="validar" class= "btn btn-primary"/>
                    </div>               
                </form>
            </div>
            <div class="col-md-4">         
            </div>
        <?php else : ?>
            <?php redirect() ?>
        <?php endif; ?>
    </body>    
</html>
<?php ?>