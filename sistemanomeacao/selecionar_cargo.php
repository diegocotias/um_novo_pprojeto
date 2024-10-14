<?php
include 'db.php';

// Buscar todos os cargos
$sql = "SELECT * FROM cargos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Selecionar Cargo</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Selecionar Cargo para Listagem de Convocados</h2>
        <form action="listar_convocados.php" method="GET">
            <div class="form-group">
                <label for="cargo_id">Escolha o Cargo:</label>
                <select id="cargo_id" name="cargo_id" class="form-control" required>
                    <option value="">Selecione...</option>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['nome'], ENT_QUOTES, 'UTF-8'); ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ver Convocados</button>
            <a href="index.html" class="btn btn-secondary">Voltar para a Página Inicial</a>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
