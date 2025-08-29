           
        
        <?php
            session_start();
            include "conexaoBD.php";

            // Verifica se usuário está logado
            if (!isset($_SESSION['emailUsuario'])) {
                header("Location: formLogin.php");
                exit();
            }

            $email = $_SESSION['emailUsuario'];

            // Busca dados do usuário
            $query = "SELECT nomeUsuario, emailUsuario, fotoUsuario FROM usuarios WHERE emailUsuario = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($usuario = $result->fetch_assoc()) {
                // Dados carregados com sucesso
            } else {
                echo "<div class='alert alert-danger text-center'>Usuário não encontrado.</div>";
                exit();
            }

            $stmt->close();
            $conn->close();
            ?>

            <?php include "header.php"; ?>
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">
                <div class="card-header text-dark text-center" style="background-color: #D8BFD8;">
                    <h3>Perfil do Usuário</h3>
                </div>
                <div class="card-body">

                    <div class="text-center mb-4">
                        <?php if (!empty($usuario['fotoUsuario'])): ?>
                            <img style='width:150px' class="img-fluid rounded-circle" src="<?php echo htmlspecialchars($usuario['fotoUsuario']); ?>" alt="Foto" />
                        <?php else: ?>
                            <img src="img/ActNow.png" alt="Foto Padrão" class="rounded-circle" width="150" height="150" />
                        <?php endif; ?>
                    </div>

                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>Nome:</th>
                                <td><?php echo htmlspecialchars($usuario['nomeUsuario']); ?></td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td><?php echo htmlspecialchars($usuario['emailUsuario']); ?></td>
                            </tr>
                            
                        </tbody>
                    </table>

                    <div class="text-center mt-4">
                        <a href="logout.php" class="btn btn-outline-danger ms-2">Sair</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
 </div>

 <?php include "footer.php"; ?>
</div>