<?php
// Inicializar mensagem
$mensagem = "";

// Verificando se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebendo dados do formulário
    $nome = $_POST['nome'] ?? '';
    $idade = (int)($_POST['idade'] ?? 0);
    $tipo_ingresso = $_POST['tipo_ingresso'] ?? '';

    // Verificação de idade
    if ($idade < 18) {
        $mensagem = "Acesso Negado!";
    } else {
        // Inicializando preço
        $preco = 0;

        // Cálculo do preço baseado no tipo de ingresso
        if ($tipo_ingresso === 'VIP') {
            $preco = 100;
        } elseif ($tipo_ingresso === 'Regular') {
            $preco = 50;
        } elseif ($tipo_ingresso === 'Básico') {
            $preco = 20;
        }

        // Mensagem de sucesso
        $mensagem = "Obrigado por comprar conosco, $nome! O preço do seu ingresso é R$ $preco.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venda de Ingressos</title>
    <link rel="stylesheet" href="style.css"> <!-- Conectando o CSS -->
</head>
<body>
    <header>
        <h1>Venda de Ingressos</h1>
    </header>

    <main>
        <section id="formulario">
            <?php if ($mensagem): ?>
                <h2>Resultado</h2>
                <p><?php echo $mensagem; ?></p>
            <?php else: ?>
                <h2>Preencha suas informações</h2>
                <form action="index.php" method="POST">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>

                    <label for="idade">Idade:</label>
                    <input type="number" id="idade" name="idade" required min="0">

                    <label for="tipo_ingresso">Tipo de Ingresso:</label>
                    <select id="tipo_ingresso" name="tipo_ingresso" required>
                        <option value="VIP">VIP - R$ 100</option>
                        <option value="Regular">Regular - R$ 50</option>
                        <option value="Básico">Básico - R$ 20</option>
                    </select>

                    <button type="submit">Enviar</button>
                </form>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Venda de Ingressos. Todos os direitos reservados.</p>
    </footer>
</body>
</html>