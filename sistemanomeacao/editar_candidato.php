<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM candidatos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $candidato = $result->fetch_assoc();
    } else {
        echo 'Candidato não encontrado.';
        exit;
    }

    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cargo_id = $_POST['cargo'];
    $categoria = $_POST['categoria'];
    $classificacao = $_POST['classificacao'];
    $numero_inscricao = $_POST['numero_inscricao'];
    $numero_filhos = $_POST['numero_filhos'];
    $data_nascimento = $_POST['data_nascimento'];
    $objetivas = $_POST['objetivas'];
    $titulos = $_POST['titulos'];
    $total = $_POST['total'];

    $sql = "UPDATE candidatos SET 
            nome = ?, cargo_id = ?, categoria = ?, classificacao = ?, 
            numero_inscricao = ?, numero_filhos = ?, data_nascimento = ?, 
            objetivas = ?, titulos = ?, total = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisdissdddi", 
        $nome, $cargo_id, $categoria, 
        $classificacao, $numero_inscricao, $numero_filhos, 
        $data_nascimento, $objetivas, $titulos, $total, $id
    );

    if ($stmt->execute()) {
        echo "Candidato atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar candidato: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    header('Location: index.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Candidato</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Candidato</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nome">Nome do Candidato:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $candidato['nome']; ?>" required>
            </div>
            <div class="form-group">
                <label for="classificacao">Classificação:</label>
                <input type="number" class="form-control" id="classificacao" name="classificacao" value="<?php echo $candidato['classificacao']; ?>" required>
            </div>
            <div class="form-group">
                <label for="numero_inscricao">Número de Inscrição:</label>
                <input type="text" class="form-control" id="numero_inscricao" name="numero_inscricao" value="<?php echo $candidato['numero_inscricao']; ?>" required>
            </div>
            <div class="form-group">
                <label for="numero_filhos">Número de Filhos:</label>
                <input type="number" class="form-control" id="numero_filhos" name="numero_filhos" value="<?php echo $candidato['numero_filhos']; ?>" required>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?php echo $candidato['data_nascimento']; ?>" required>
            </div>
            <div class="form-group">
                <label for="objetivas">Objetivas:</label>
                <input type="number" step="0.01" class="form-control" id="objetivas" name="objetivas" value="<?php echo $candidato['objetivas']; ?>" required>
            </div>
            <div class="form-group">
                <label for="titulos">Títulos:</label>
                <input type="number" step="0.01" class="form-control" id="titulos" name="titulos" value="<?php echo $candidato['titulos']; ?>" required>
            </div>
            <div class="form-group">
                <label for="total">Total:</label>
                <input type="number" step="0.01" class="form-control" id="total" name="total" value="<?php echo $candidato['total']; ?>" required>
            </div>
            <div class="form-group">
                <label for="cargo">Cargo:</label>
                <select class="form-control" id="cargo" name="cargo" required>
                    <option value="1" <?php echo $candidato['cargo_id'] == 1 ? 'selected' : ''; ?>>Agente de Trânsito</option>
                    <option value="2" <?php echo $candidato['cargo_id'] == 2 ? 'selected' : ''; ?>>Enfermeiro</option>
                    <option value="3" <?php echo $candidato['cargo_id'] == 3 ? 'selected' : ''; ?>>Técnico em Enfermagem</option>
                    <option value="4" <?php echo $candidato['cargo_id'] == 4 ? 'selected' : ''; ?>>Auditor Fiscal</option>
                    <option value="5" <?php echo $candidato['cargo_id'] == 5 ? 'selected' : ''; ?>>Professor</option>
                </select>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <select class="form-control" id="categoria" name="categoria" required>
                    <option value="ampla_concorrencia" <?php echo $candidato['categoria'] == 'ampla_concorrencia' ? 'selected' : ''; ?>>Ampla Concorrência</option>
                    <option value="afrodescendente" <?php echo $candidato['categoria'] == 'afrodescendente' ? 'selected' : ''; ?>>Afrodescendente</option>
                    <option value="pcd" <?php echo $candidato['categoria'] == 'pcd' ? 'selected' : ''; ?>>PCD</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="index.html" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
