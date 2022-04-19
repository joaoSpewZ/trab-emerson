<html>
<head>
    <link href="bootstrap2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <!--Cabeçalho  -->
    <center>
        <main>
        <header>
            <div class="mascara">
                <h1><strong>Listagem - Anime</strong></h1>
                <img class="seta" src="img/seta.svg" alt="imagem de uma seta">
            </div>
        </header>
    </center>
    <br />
     <!--Sobre mim-->
    <section class="sobre separador-esquerda">
    <div class="container">
    <div class="row justify-content-center row-cols-1 row-cols-md-2 mb-3 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <!--foto-->
                    <section class="foto">
                    </svg>&nbsp;&nbsp;<b><h4>Cadastre os Anime</b></h4>
                </div>
                <div class="card-body text-start">
                    <form action="index.php" method="POST">
                        <label class="form-label"><h2>Nome</h2></label><br />
                        <input type="text" name="nome" class="form-control" placeholder="Digite o nome do anime" required /><br />
                        <label class="form-label"><h2>Episodios</h2></label><br />
                        <input type="number" name="episodios" class="form-control" placeholder="Digite total de episodios" required /><br />
                        <button type="submit" class="btn btn-outline-secondary" name="btgravar">Enviar</button>
                    </form>
                    <?php
                    if (isset($_POST['btgravar'])) {
                        $nome = $_POST['nome'];
                        $episodios = $_POST['episodios'];
                        $arquivo = 'dados.txt';
                        $texto = $nome . ";" . $episodios . ";";
                        $file = fopen($arquivo, 'a');
                        fwrite($file, $texto);
                        fclose($file);
                    } else {
                        echo "";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <br />
    <div class="row justify-content-center row-cols-1 row-cols-md-2 mb-3 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h3 class="my-0 fw-normal"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>&nbsp;&nbsp;<h3>Pesquisa</h3>
                </div>
                <div class="card-body text-start">
                    <form action="pesquisa.php" method="POST">
                        <label class="form-label"><h1>Nome</h1></label><br/>
                        <input type="text" name="pesquisa" class="form-control" placeholder="Digite um anime para pesquisar" required /><br />
                        <button type="submit" class="btn btn-outline-secondary" name="btgravar">Pesquisar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Portifólho-->
    <section class="portifolio">
    <div class="container">
    <br />
    <div class="row justify-content-center row-cols-1 row-cols-md-2 mb-3 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h3 class="my-0 fw-normal">&nbsp;&nbsp;Lista dos Animes</h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Episodios</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $arquivo = fopen("dados.txt", "r");
                            while (!feof($arquivo)) {
                                $linha = fgets($arquivo);
                            }
                            $dados = explode(";", $linha);
                            fclose($arquivo);
                            echo '<br/><br/>';
                            $conta = count($dados) - 2;
                            for ($i = 0; $i <= $conta; $i++) {
                                $posicao = $i;
                                echo '<tr>';
                                echo '<td>' . $dados[$i] . '</td>';
                                $i++;
                                echo '<td>' . $dados[$i] . '</td>';
                                echo '<td><a href="editar.php?pos=' . $posicao . '">Editar</a> | <a href="excluir.php?pos=' . $posicao . '">Excluir</a></td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>