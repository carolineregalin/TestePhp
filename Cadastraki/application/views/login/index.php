
<html>
    <head>
        <link rel ="stylesheet" href=" <?= base_url($uri = "css/bootstrap.css") ?> " >
        <title>Cadastraki - Login</title>
    </head>
    <body>
    <div class="col-md-4">         
    </div>     
    <div class ="container">  
        <div class="row">
            <div class="col-md-4">
                <div class="form-wrap">
                    <h1>Login</h1>       
                    <form action = "index.php/user_login/autenticar" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-group">
                            <label>Nome:</label>
                            <input  type="text" class = "form-control" name="nome" value="<?= set_value('nome') ?>" required/>
                        </div>
                        <div class="form-group">
                            <label>Senha:</label>
                            <input type="password" class = "form-control" name="senha" value="<?= set_value('senha') ?>" required/>
                        </div>
                        <div>
                            <input type="submit" value="Entrar" id="cadastrar" name="entrar" class= "btn btn-primary"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
    </div>
</body>    
</html>
