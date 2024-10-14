<?php
include 'db.php';

// Função para ordenar candidatos com base na classificação
function ordenarCandidatos($candidatos) {
    usort($candidatos, function($a, $b) {
        return $a['classificacao'] <=> $b['classificacao'];
    });
    return $candidatos;
}

// Função para obter candidatos de uma categoria específica
function obterCandidatosPorCategoria($cargo_id, $categoria, $limit, $conn) {
    $sql = "SELECT * FROM candidatos WHERE cargo_id = ? AND categoria = ? ORDER BY classificacao ASC LIMIT ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('isi', $cargo_id, $categoria, $limit);
    $stmt->execute();
    $result = $stmt->get_result();
    $candidatos = $result->fetch_all(MYSQLI_ASSOC);
    return ordenarCandidatos($candidatos);
}

// Função para gerar lista de convocação
function gerarListaConvocacao($cargo_id, $total_vagas, $conn) {
    // Cálculo das vagas por categoria
    $vagas_afrodescendente = floor($total_vagas * 0.35);
    $vagas_pcd = ceil($total_vagas * 0.05);
    $vagas_ampla_concorrencia = $total_vagas - ($vagas_afrodescendente + $vagas_pcd);

    // Selecionar todos os candidatos por categoria para ampla concorrência e afrodescendente
    $candidatos_ampla_concorrencia = obterCandidatosPorCategoria($cargo_id, 'ampla_concorrencia', $total_vagas, $conn);
    $candidatos_afrodescendente = obterCandidatosPorCategoria($cargo_id, 'afrodescendente', $vagas_afrodescendente, $conn);
    $candidatos_pcd = obterCandidatosPorCategoria($cargo_id, 'pcd', $vagas_pcd, $conn);

    // Inicializar a lista de convocados
    $listaConvocacao = [];

    // Ordem de convocação: 1: Ampla, 2: Afro, 3: PCD
    $ordemConvocacao = [1, 1, 2, 1, 1, 2, 1, 1, 2, 1, 3, 2, 1, 1, 1, 2, 1, 1, 2, 1];

    // Índices para acompanhar a posição de convocação em cada lista
    $indices = ['ampla' => 0, 'afro' => 0, 'pcd' => 0];

    foreach ($ordemConvocacao as $tipo) {
        if ($tipo == 1) {
            // Convocar por ampla concorrência ou afrodescendente se disponível
            if ($indices['ampla'] < count($candidatos_ampla_concorrencia)) {
                $listaConvocacao[] = $candidatos_ampla_concorrencia[$indices['ampla']];
                $indices['ampla']++;
            } elseif ($indices['afro'] < count($candidatos_afrodescendente)) {
                $listaConvocacao[] = $candidatos_afrodescendente[$indices['afro']];
                $indices['afro']++;
            }
        } elseif ($tipo == 2 && $indices['afro'] < count($candidatos_afrodescendente)) {
            // Convocar por vaga reservada a afrodescendente
            $listaConvocacao[] = $candidatos_afrodescendente[$indices['afro']];
            $indices['afro']++;
        } elseif ($tipo == 3 && $indices['pcd'] < count($candidatos_pcd)) {
            // Convocar por vaga reservada a PCD
            $listaConvocacao[] = $candidatos_pcd[$indices['pcd']];
            $indices['pcd']++;
        }
    }

    return $listaConvocacao;
}

// Exibir lista de convocação para cada cargo
$sql_cargos = "SELECT * FROM cargos";
$result_cargos = $conn->query($sql_cargos);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Convocações</title>
    <style>
        .print-btn, .back-btn {
            margin-top: 20px;
            margin-right: 10px;
        }
        .top-image {
            width: 100%;
            max-height: 150px;
            object-fit: cover;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <!-- Imagem no topo -->
    <img src="topo.png" alt="Topo" class="top-image">

    <?php
    if ($result_cargos->num_rows > 0) {
        while ($cargo = $result_cargos->fetch_assoc()) {
            echo '<h3>Convocação para ' . $cargo['nome'] . '</h3>';
            $convocados = gerarListaConvocacao($cargo['id'], $cargo['total_vagas'], $conn);
            
            if (!empty($convocados)) {
                echo '<table class="table table-bordered">';
                echo '<tr><th>Nome</th><th>Classificação</th><th>Número de Inscrição</th><th>Categoria</th></tr>';
                foreach ($convocados as $candidato) {
                    echo '<tr>';
                    echo '<td>' . $candidato['nome'] . '</td>';
                    echo '<td>' . $candidato['classificacao'] . '</td>';
                    echo '<td>' . $candidato['numero_inscricao'] . '</td>';
                    echo '<td>' . $candidato['categoria'] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo '<p>Nenhum candidato convocado.</p>';
            }
        }
    }
    $conn->close();
    ?>

    <!-- Botões de Imprimir e Voltar -->
    <button class="btn btn-primary print-btn" onclick="window.print()">Imprimir</button>
    <a href="index.html" class="btn btn-secondary back-btn">Voltar</a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
