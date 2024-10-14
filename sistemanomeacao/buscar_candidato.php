<?php
include 'db.php';

if (isset($_GET['query'])) {
    $query = $_GET['query'];

    $sql = "SELECT * FROM candidatos WHERE nome LIKE ? OR numero_inscricao LIKE ?";
    $stmt = $conn->prepare($sql);
    $likeQuery = '%' . $query . '%';
    $stmt->bind_param('ss', $likeQuery, $likeQuery);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<table class="table table-bordered">';
        echo '<tr><th>Nome</th><th>Inscrição</th><th>Cargo</th><th>Ações</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['nome'] . '</td>';
            echo '<td>' . $row['numero_inscricao'] . '</td>';
            echo '<td>' . $row['cargo_id'] . '</td>';
            echo '<td>
                    <a href="editar_candidato.php?id=' . $row['id'] . '" class="btn btn-sm btn-warning">Editar</a>
                  </td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'Nenhum candidato encontrado.';
    }

    $stmt->close();
    $conn->close();
}
?>
