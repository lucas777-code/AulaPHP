<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificação de Idade</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1> Verifique se você pode dirigir </h1>
<div class="container">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idade = (int)$_POST['idade'];

        if ($idade >= 18) {
            $mensagem = "Você pode dirigir.";
        } else {
            $mensagem = "Você não pode dirigir";
        }
    }
    ?>

    <form method="post" action="">
        <label for="idade">Digite sua idade:</label>
        <input type="number" name="idade" id="idade" required>
        <input type="submit" value="Verificar">
    </form>

    <?php
    if (isset($mensagem)) {
        echo "<h1 class='message'>$mensagem</h1>";
    }
    ?>
</div>

</body>
</html>