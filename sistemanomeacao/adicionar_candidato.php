<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Candidatos</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Cadastro de Candidatos</h2>
        <form action="adicionar_candidato.php" method="POST">
            <div class="form-group">
                <label for="nome">Nome do Candidato:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="classificacao">Classificação:</label>
                <input type="number" class="form-control" id="classificacao" name="classificacao" required>
            </div>
            <div class="form-group">
                <label for="numero_inscricao">Número de Inscrição:</label>
                <input type="text" class="form-control" id="numero_inscricao" name="numero_inscricao" required>
            </div>
            <div class="form-group">
                <label for="numero_filhos">Número de Filhos:</label>
                <input type="number" class="form-control" id="numero_filhos" name="numero_filhos" required>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
            </div>
            <div class="form-group">
                <label for="objetivas">Objetivas:</label>
                <input type="number" step="0.01" class="form-control" id="objetivas" name="objetivas" required>
            </div>
            <div class="form-group">
                <label for="titulos">Títulos:</label>
                <input type="number" step="0.01" class="form-control" id="titulos" name="titulos" required>
            </div>
            <div class="form-group">
                <label for="total">Total:</label>
                <input type="number" step="0.01" class="form-control" id="total" name="total" required>
            </div>
            <div class="form-group">
                <label for="cargo">Cargo:</label>
                <select class="form-control" id="cargo" name="cargo" required>
                    <option value="1">Agente de Trânsito</option>
                    <option value="2">Enfermeiro</option>
                    <option value="3">Técnico em Enfermagem</option>
                    <option value="4">Auditor Fiscal</option>
                    <option value="5">Professor</option>
                </select>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <select class="form-control" id="categoria" name="categoria" required>
                    <option value="ampla_concorrencia">Ampla Concorrência</option>
                    <option value="afrodescendente">Afrodescendente</option>
                    <option value="pcd">PCD</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Candidato</button>
        </form>

        <!-- Pesquisa de Candidatos -->
        <h3 class="mt-5">Pesquisar Candidato</h3>
        <form id="searchForm" method="GET">
            <div class="form-group">
                <label for="search">Pesquisar por Nome ou Número de Inscrição:</label>
                <input type="text" class="form-control" id="search" name="search" required>
            </div>
            <button type="button" class="btn btn-secondary" onclick="searchCandidate()">Pesquisar</button>
        </form>

        <h4 class="mt-4">Resultados da Pesquisa</h4>
        <div id="searchResults" class="mt-3"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function searchCandidate() {
            var query = document.getElementById('search').value;
            $.ajax({
                url: 'buscar_candidato.php',
                type: 'GET',
                data: { query: query },
                success: function(data) {
                    document.getElementById('searchResults').innerHTML = data;
                }
            });
        }
    </script>
</body>
</html>
