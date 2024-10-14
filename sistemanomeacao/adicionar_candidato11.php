<?php
include 'db.php';

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

    $sql = "INSERT INTO candidatos (
                nome, cargo_id, categoria, classificacao, 
                numero_inscricao, numero_filhos, data_nascimento, objetivas, 
                titulos, total
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisdissddd", 
        $nome, $cargo_id, $categoria, 
        $classificacao, $numero_inscricao, $numero_filhos, 
        $data_nascimento, $objetivas, $titulos, $total
    );

    if ($stmt->execute()) {
        $message = "Candidato adicionado com sucesso!";
    } else {
        $message = "Erro ao adicionar candidato: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Adicionar Candidato</title>
</head>
<body>
    <div class="container mt-5">
        <h2><?php echo $message; ?></h2>
        <div class="mt-3">
            <a href="index.html" class="btn btn-secondary">Voltar</a>
            <a href="index.html" class="btn btn-primary">Adicionar Novo Candidato</a>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
