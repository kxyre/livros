<div style="background-color: #f0dbf0ff;">
 <?php include "header.php" ?>


 <div class='container mt-5 mb-5' >

    <?php

        //Inclui o arquivo de conexão com o Banco de Dados
        include "conexaoBD.php";

        //Variável PHP que recebe a Query para selecionar todos os campos da tabela Produtos
        $listarProdutos = "SELECT * FROM Produtos";

        //Verificar se há algum parâmetro chamado filtroProduto sendo recebido por GET
        if(isset($_GET['filtroProduto'])){
            //Se houver valor setado no GET chamado 'filtroProduto', armazena na variável $
            $filtroProduto = $_GET['filtroProduto'];

            //Se o filtro for diferente de 'todos', concatena a filtragem
            if($filtroProduto != 'todos'){
                $listarProdutos = $listarProdutos . " WHERE statusProduto LIKE '$filtroProduto' ";
            }

            switch($filtroProduto){
                case "todos" : $mensagemFiltro = "no total";
                break;

                case "disponivel" : $mensagemFiltro = "disponíveis";
                break;

                case "esgotado" : $mensagemFiltro = "esgotados";
                break;
            }

        }
        else{
            $filtroProduto = "todos";
            $mensagemFiltro = "no total";
        }

        $res            = mysqli_query($conn, $listarProdutos); //Recebe true OR false com base na execução
        $totalProdutos  = mysqli_num_rows($res); //Retorna a quantidade de registros encontrados

        if($totalProdutos > 0){
            if($totalProdutos == 1){
                //Se o total de produtos for igual a um, exibe mensagem no singular
                echo "<div class='alert text-center' >Há <strong>$totalProdutos</strong> livro $mensagemFiltro cadastrado!</div>";
            }
            else{
                //Se o total de produtos não for igual a um, exibe mensagem no plural
                echo "<div class='alert bg-light text-center'>Há <strong>$totalProdutos</strong> livros $mensagemFiltro cadastrados!</div>";
            }
        }
        else{
            echo "<div class='alert text-center'>Não há Produtos cadastrados no sistema!</div>";
        }

    
    ?>

    <hr>

    <!-- Exibe a grid com os cards -->
    <div class="row">

        <?php
            //Loop para armazenar os registros da tabela em variáveis PHP
            while($registro = mysqli_fetch_assoc($res)){
                $idProduto        = $registro['idProduto'];
                $fotoProduto      = $registro['fotoProduto'];
                $nomeProduto      = $registro['nomeProduto'];
                $descricaoProduto = $registro['descricaoProduto'];
                $idUsuario        = $registro['idUsuario'];
                $statusProduto    = $registro['statusProduto'];

                echo "
                    <div class='col-sm-3'>

                        <div class='card' style='width:100%; height:100%'>

                            <div class='card-body' style='height:100%'>
                                <a href='visualizarProduto.php?idProduto=$idProduto' style='text-decoration:none' title='Visualizar mais detalhes de $nomeProduto'>
                                    <div class='position-relative'> ";
                                        if($statusProduto == 'esgotado'){
                                            echo "
                                                <div class='position-absolute top-50 start-50 translate-middle bg-danger text-white px-4 py-2 fs-6 fw-bold rounded shadow' style='z-index: 10; opacity: 0.85;'>
                                                    ESGOTADO
                                                </div>
                                            ";
                                        }
                                        echo "
                                            <img class='card-img-top' src='$fotoProduto' alt='Foto de $nomeProduto' ";
                                                if($statusProduto == 'esgotado'){
                                                    echo "style='filter:grayscale(100%)' ";
                                                }
                                            echo ">
                                    </div>
                                </a>
                            </div>

                            <div class='card-body text-center'>
                                <h4 class='card-title'>$nomeProduto</h4>
                                <p class='card-text'>Usuario: <strong>$idUsuario</strong>
                                <div class='d-grid' style='border-size:border-box'>
                                    <a class='btn btn-outline-success' href='visualizarProduto.php?idProduto=$idProduto' style='text-decoration:none' title='Visualizar mais detalhes de $nomeProduto'>
                                        <i class='bi bi-eye'></i> Visualizar Livro
                                    </a>
                                </div>
                            </div>

                        </div> 

                    </div>

                ";
            }
        ?>

    </div>

 </div>

 <?php include "footer.php" ?>
</div>