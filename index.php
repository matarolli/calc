<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Calculadora Simples PHP</title>
    <link rel="stylesheet" href="style.css">

<body class="matrix-bg">

    <div class="calculadora">
        <?php
        // Inicializa a variável resultado vazia para exibição posterior
        $resultado = '';

        // Verifica se o formulário foi submetido via método POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Captura os valores dos campos e garante que sejam tratados como números decimais
            $num1 = floatval($_POST['num1']);
            $num2 = floatval($_POST['num2']);
            $operacao = $_POST['operacao'];

            // Realiza o cálculo com base na operação selecionada
            switch ($operacao) {
                case 'somar':
                    $resultado = $num1 + $num2;
                    break;
                case 'subtrair':
                    $resultado = $num1 - $num2;
                    break;
                case 'multiplicar':
                    $resultado = $num1 * $num2;
                    break;
                case 'dividir':
                    $resultado = ($num2 != 0) ? ($num1 / $num2) : "Divisão por zero não permitida!";
                    break;
                default:
                    $resultado = "Operação inválida";
            }
        }
        ?> <span>
            <h1 class="matrix-text" data-text="CALCULADORA">CALCULADORA</h1>
        </span>



        <!-- Formulário da calculadora -->
        <form method="POST">
            <input type="number" step="any" name="num1" placeholder="Primeiro número" required>
            <input type="number" step="any" name="num2" placeholder="Segundo número" required>

            <select name="operacao">
                <option value="somar">Somar (+)</option>
                <option value="subtrair">Subtrair (-)</option>
                <option value="multiplicar">Multiplicar (×)</option>
                <option value="dividir">Dividir (/)</option>
            </select>

            <button type="submit">Calcular</button>

            <!-- Exibição condicional do resultado, após submissão do formulário -->
            <?php if ($resultado !== ''): ?>
            <div class="resultado">
                Resultado: <?= htmlspecialchars($resultado); ?>
            </div>
            <?php endif; ?>
        </form>
    </div>
    <!-- <div class="rain"></div> -->
</body>

</html>