<?php
$conn = new mysqli("127.0.0.1", "root", "", "bd");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modelo = $_POST["modelo"];
    $cor = $_POST["cor"];
    $valor = $_POST["valor"];
    $fabricante = $_POST["fabricante"];
    $anoFabricacao = $_POST["anoFabricacao"];

    $sql = "INSERT INTO tbCarro (modelo, cor, valor, fabricante, anoFabricacao)
            VALUES ('$modelo', '$cor', '$valor', '$fabricante', '$anoFabricacao')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        $erro = "Erro ao cadastrar: " . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM tbCarro");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Carros</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            min-height: 100vh;
            padding: 40px 20px;
            color: #1f2937;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .titulo {
            color: #ffffff;
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center;
        }

        .subtitulo {
            color: #cbd5e1;
            text-align: center;
            margin-bottom: 30px;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1.4fr;
            gap: 24px;
        }

        .card {
            background: #ffffff;
            border-radius: 18px;
            padding: 24px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.18);
        }

        .card h2 {
            margin-bottom: 20px;
            color: #0f172a;
            font-size: 22px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: bold;
            color: #334155;
        }

        input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
            transition: 0.2s;
        }

        input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
        }

        .btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 12px;
            background: #2563eb;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        .erro {
            background: #fee2e2;
            color: #b91c1c;
            border: 1px solid #fecaca;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 16px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 12px;
        }

        thead {
            background: #0f172a;
            color: white;
        }

        th, td {
            padding: 14px 12px;
            text-align: left;
            font-size: 14px;
        }

        tbody tr {
            border-bottom: 1px solid #e2e8f0;
        }

        tbody tr:nth-child(even) {
            background: #f8fafc;
        }

        tbody tr:hover {
            background: #e0f2fe;
        }

        .vazio {
            padding: 18px;
            border-radius: 12px;
            background: #f8fafc;
            color: #475569;
            border: 1px dashed #cbd5e1;
        }

        @media (max-width: 900px) {
            .grid {
                grid-template-columns: 1fr;
            }

            .titulo {
                font-size: 26px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="titulo">Sistema de Cadastro de Carros</h1>
        <div class="grid">
            <div class="card">
                <h2>Cadastrar carro</h2>

                <?php if (!empty($erro)) : ?>
                    <div class="erro"><?php echo $erro; ?></div>
                <?php endif; ?>

                <form method="POST">
                    <div class="form-group">
                        <label for="modelo">Modelo</label>
                        <input type="text" id="modelo" name="modelo" required>
                    </div>

                    <div class="form-group">
                        <label for="cor">Cor</label>
                        <input type="text" id="cor" name="cor" required>
                    </div>

                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input type="number" step="0.01" id="valor" name="valor" required>
                    </div>

                    <div class="form-group">
                        <label for="fabricante">Fabricante</label>
                        <input type="text" id="fabricante" name="fabricante" required>
                    </div>

                    <div class="form-group">
                        <label for="anoFabricacao">Ano de fabricação</label>
                        <input type="number" id="anoFabricacao" name="anoFabricacao" required>
                    </div>

                    <button type="submit" class="btn">Salvar carro</button>
                </form>
            </div>

            <div class="card">
                <h2>Lista de carros</h2>

                <?php if ($result && $result->num_rows > 0) : ?>
                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Modelo</th>
                                    <th>Cor</th>
                                    <th>Valor</th>
                                    <th>Fabricante</th>
                                    <th>Ano</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?php echo $row["idCarro"]; ?></td>
                                        <td><?php echo $row["modelo"]; ?></td>
                                        <td><?php echo $row["cor"]; ?></td>
                                        <td>R$ <?php echo number_format($row["valor"], 2, ",", "."); ?></td>
                                        <td><?php echo $row["fabricante"]; ?></td>
                                        <td><?php echo $row["anoFabricacao"]; ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else : ?>
                    <div class="vazio">Nenhum carro cadastrado ainda.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>