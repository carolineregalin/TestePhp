
<html>
    <head>
        <link rel ="stylesheet" href=" <?= base_url($uri = "css/login.css") ?> " >
        <link rel ="stylesheet" href=" <?= base_url($uri = "css/bootstrap.css") ?> " >
        <link rel="icon" href=" <?= base_url($uri = "img/icone-estabelecimento.ico") ?> "type="image/x-icon" />
        <title>Cadastraki - Login</title>
    </head>

    <body>

        <div class ="container">  
            <div class="card card-container">
                <?php if ($this->session->flashdata("success")): ?>
                    <p class="alert alert-success"><?= $this->session->flashdata("success") ?></p>         
                <?php endif ?>

                <?php if ($this->session->flashdata("danger")): ?>
                    <p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>         
                <?php endif ?>
                <div class="row">                 
                    <div class="form-signin">
                        <h1><small>Entrar</small></h1>       
                        <form action = "index.php/user_login/autenticar" method="post" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group">
                                <label>Nome:</label>
                                <input  type="text" class = "form-control" id ="nome" name="nome" required/>
                            </div>
                            <div class="form-group">
                                <label>Senha:</label>
                                <input type="password" class = "form-control" id ="senha" name="senha" required/>
                            </div>
                            <div>
                                <input type="submit"  value="Entrar" id="cadastrar" name="entrar" class="btn btn-lg btn-primary btn-block btn-signin"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </body>    
</html>
