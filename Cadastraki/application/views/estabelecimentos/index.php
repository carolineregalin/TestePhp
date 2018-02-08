
<html>
    <head>
        <link rel ="stylesheet" href=" <?= base_url($uri = "css/bootstrap.css") ?> " >
        <link rel ="stylesheet" href=" <?= base_url($uri = "css/estabelecimentos.css") ?> " >
        <link rel="icon" href=" <?= base_url($uri = "img/icone-estabelecimento.ico") ?> "type="image/x-icon" />     
        <title>Cadastraki - Estabelecimentos</title>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"
                integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>

        <script type="text/javascript" >

            $(document).ready(function () {

                function limpa_formulário_cep() {
                    // Limpa valores do formulário de cep.
                    $("#endereco").val("");
                    $("#bairro").val("");
                    $("#cidade").val("");
                    $("#uf").val("");

                }

                //Quando o campo cep perde o foco.
                $("#cep").blur(function () {

                    //Nova variável "cep" somente com dígitos.
                    var cep = $(this).val().replace(/\D/g, '');

                    //Verifica se campo cep possui valor informado.
                    if (cep != "") {

                        //Expressão regular para validar o CEP.
                        var validacep = /^[0-9]{8}$/;

                        //Valida o formato do CEP.
                        if (validacep.test(cep)) {

                            //Preenche os campos com "..." enquanto consulta webservice.
                            $("#endereco").val("...");
                            $("#bairro").val("...");
                            $("#cidade").val("...");
                            $("#uf").val("...");

                            //Consulta o webservice viacep.com.br/
                            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                                if (!("erro" in dados)) {
                                    //Atualiza os campos com os valores da consulta.
                                    $("#endereco").val(dados.logradouro);
                                    $("#bairro").val(dados.bairro);
                                    $("#cidade").val(dados.localidade);
                                    $("#uf").val(dados.uf);
                                } //end if.
                                else {
                                    //CEP pesquisado não foi encontrado.
                                    limpa_formulário_cep();
                                    alert("CEP não encontrado.");
                                }
                            });
                        } //end if.
                        else {
                            //cep é inválido.
                            limpa_formulário_cep();
                            alert("Formato de CEP inválido.");
                        }
                    } //end if.
                    else {
                        //cep sem valor, limpa formulário.
                        limpa_formulário_cep();
                    }
                });
            });

        </script>
    </head>
    <body style="background-image: linear-gradient(rgb(104, 145, 162),white);">
        <div class ="container">
            <div class="card card-container">
            <?php if ($this->session->flashdata("success")): ?>
                <p class="alert alert-success"><?= $this->session->flashdata("success") ?></p>         
            <?php endif ?>

            <?php if ($this->session->flashdata("danger")): ?>
                <p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>         
            <?php endif ?>
            <?php if (($_SESSION["logado"]) && ($_SESSION["tokenvalidado"])) : ?>
                <h1><small>Cadastro de estabelecimentos</small></h1>
                <form  action="estabelecimentos/novo" method="post"  class="form-signin" enctype="multipart/form-data" id ="formularioEstabelecimentos" name ="formularioEstabelecimentos" autocomplete="off">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" style="max-width:300px" placeholder="Pizzaria Teti" required minlength="5" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="nome">CEP</label>
                        <input type="text" name="cep" id="cep" style="max-width:300px" placeholder="89560000" required minlength="8" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="uf">UF</label>
                        <input type="text" name="uf" id="uf" style="max-width:300px" placeholder="SC" required minlength="2" maxlength="2" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" id="cidade" style="max-width:300px" placeholder="Videira" required minlength="5" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" id="bairro" style="max-width:300px" placeholder="Universitário" required minlength="5" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="endereço">Endereço</label>
                        <input type="text" name="endereco" id="endereco" style="max-width:300px" placeholder="Rua das Flores,131" required minlength="5" class="form-control"/>
                    </div>
                    <br>
                    <div>
                        <input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar" class= "btn btn-primary"/>
                    </div>
                </form>
                </div>
            <h1><small>Estabelecimentos</small></h1>
                <table class="table">
                    <tr>
                        <th>ID estabelecimento</th>
                        <th>Nome</th>
                        <th>CEP</th>
                        <th>UF</th>
                        <th>Cidade</th>
                        <th>Bairro</th>
                        <th>Endereço</th>              
                    </tr>
                    <?php if ($estabelecimento == FALSE): ?>

                        <tr><td colspan="2">Nenhum estabelecimento encontrado</td></tr>

                    <?php else: ?>
                        <?php foreach ($estabelecimento as $estabelecimento1): ?>
                            <tr>                   
                                <td><?= $estabelecimento1['idEstabelecimento'] ?></td>
                                <td><?= $estabelecimento1['nome'] ?></td>
                                <td><?= $estabelecimento1['cep'] ?></td> 
                                <td><?= $estabelecimento1['UF'] ?></td>  
                                <td><?= $estabelecimento1['cidade'] ?></td>   
                                <td><?= $estabelecimento1['bairro'] ?></td> 
                                <td><?= $estabelecimento1['endereco'] ?></td>                
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                </table> 
                <br>
                <?= anchor($action = "index.php/user_login/logout", $title = "Sair", array("class" => "btn btn-primary")) ?>
                <br>
            <?php else: ?>   
                <?php redirect() ?>
            <?php endif ?>
        </div>
    </body>    
</html>
