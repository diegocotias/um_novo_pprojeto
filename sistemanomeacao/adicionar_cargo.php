<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $total_vagas = $_POST['total_vagas'];

    // Verificar se o cargo já existe
    $sql_check = "SELECT id FROM cargos WHERE nome = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $nome);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        // Cargo já existe
        echo "<script>alert('Erro: O cargo já existe!'); window.location.href = 'index.html';</script>";
    } else {
        // Inserir novo cargo
        $sql = "INSERT INTO cargos (nome, total_vagas) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $nome, $total_vagas);

        if ($stmt->execute()) {
            echo "<script>alert('Cargo adicionado com sucesso!'); window.location.href = 'index.html';</script>";
        } else {
            echo "<script>alert('Erro ao adicionar cargo: " . $stmt->error . "'); window.location.href = 'index.html';</script>";
        }

        $stmt->close();
    }

    $stmt_check->close();
    $conn->close();
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Adicionar Cargo</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Adicionar Cargo</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nome">Nome do Cargo:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="total_vagas">Total de Vagas:</label>
                <input type="number" class="form-control" id="total_vagas" name="total_vagas" required>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Cargo</button>
            <a href="index.html" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
