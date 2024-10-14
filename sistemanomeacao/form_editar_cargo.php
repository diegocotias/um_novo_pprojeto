<?php
include 'db.php';

// Verificar se um ID de cargo foi passado via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Buscar o cargo correspondente no banco de dados
    $sql = "SELECT * FROM cargos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $cargo = $result->fetch_assoc();
    } else {
        echo 'Cargo não encontrado.';
        exit;
    }

    $stmt->close();
} else {
    echo 'ID de cargo não especificado.';
    exit;
}

// Atualizar os dados do cargo no banco de dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $total_vagas = $_POST['total_vagas'];

    // Verificar se o nome e total de vagas não estão vazios
    if (!empty($nome) && !empty($total_vagas)) {
        $sql = "UPDATE cargos SET nome = ?, total_vagas = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sii", $nome, $total_vagas, $id);

        if ($stmt->execute()) {
            echo "<script>alert('Cargo atualizado com sucesso!'); window.location.href = 'listar_cargos.php';</script>";
        } else {
            echo "<script>alert('Erro ao atualizar cargo: " . $stmt->error . "');</script>";
        }

        $stmt->close();
        $conn->close();
        exit;
    } else {
        echo "<script>alert('Preencha todos os campos.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Cargo</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Cargo</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nome">Nome do Cargo:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($cargo['nome'], ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            <div class="form-group">
                <label for="total_vagas">Total de Vagas:</label>
                <input type="number" class="form-control" id="total_vagas" name="total_vagas" value="<?php echo htmlspecialchars($cargo['total_vagas'], ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="listar_cargos.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
