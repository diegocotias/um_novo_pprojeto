<?php
include 'db.php';

// Função para listar candidatos convocados considerando cotas
function listarConvocados($cargoId) {
    global $conn;

    // Obter o total de vagas para o cargo
    $sql = "SELECT total_vagas FROM cargos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $cargoId);
    $stmt->execute();
    $result = $stmt->get_result();
    $cargo = $result->fetch_assoc();
    $totalVagas = $cargo['total_vagas'];
    $stmt->close();

    // Calcular vagas reservadas para negros e PCD
    $vagasNegros = (int)($totalVagas * 0.30);
    $vagasPCD = (int)($totalVagas * 0.05);
    $vagasAmplaConcorrencia = $totalVagas - $vagasNegros - $vagasPCD;

    // Listar candidatos ordenados por classificação
    $sql = "SELECT * FROM candidatos WHERE cargo_id = ? ORDER BY classificacao ASC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $cargoId);
    $stmt->execute();
    $result = $stmt->get_result();

    $candidatosNegros = [];
    $candidatosPCD = [];
    $candidatosAmplaConcorrencia = [];

    while ($row = $result->fetch_assoc()) {
        // Substitua 'raca' e 'pcd' pelos nomes reais das colunas
        if (isset($row['raca']) && $row['raca'] == 'Negro' && count($candidatosNegros) < $vagasNegros) {
            $candidatosNegros[] = $row;
        } elseif (isset($row['pcd']) && $row['pcd'] == 1 && count($candidatosPCD) < $vagasPCD) {
            $candidatosPCD[] = $row;
        } elseif (count($candidatosAmplaConcorrencia) < $vagasAmplaConcorrencia) {
            $candidatosAmplaConcorrencia[] = $row;
        }
    }

    // Combinar listas e exibir
    $candidatos = array_merge($candidatosNegros, $candidatosPCD, $candidatosAmplaConcorrencia);

    foreach ($candidatos as $row) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['classificacao'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['nome'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['numero_inscricao'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['numero_filhos'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['data_nascimento'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['objetivas'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['titulos'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['total'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "</tr>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Lista de Convocados</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Lista de Convocados para o Cargo</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Classificação</th>
                    <th>Nome</th>
                    <th>Número de Inscrição</th>
                    <th>Número de Filhos</th>
                    <th>Data de Nascimento</th>
                    <th>Objetivas</th>
                    <th>Títulos</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['cargo_id'])) {
                    listarConvocados($_GET['cargo_id']);
                } else {
                    echo "<tr><td colspan='8'>Nenhum cargo selecionado.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="selecionar_cargo.php" class="btn btn-secondary">Voltar</a>
        <a href="index.html" class="btn btn-secondary">Voltar para a Página Inicial</a>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
