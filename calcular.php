<?php
function suma($a, $b) {
    return $a + $b;
}

function resta($a, $b) {
    return $a - $b;
}

function multiplicacion($a, $b) {
    return $a * $b;
}

function division($a, $b) {
    if ($b == 0) {
        return "Error: División por cero.";
    }
    return $a / $b;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = filter_var($_POST['num1'], FILTER_VALIDATE_FLOAT);
    $num2 = filter_var($_POST['num2'], FILTER_VALIDATE_FLOAT);
    $operacion = $_POST['operacion'];
    $resultado = "";

    if ($num1 === false || $num2 === false) {
        $resultado = "Error: Por favor, ingrese números válidos.";
    } else {
        switch ($operacion) {
            case "suma":
                $resultado = suma($num1, $num2);
                break;
            case "resta":
                $resultado = resta($num1, $num2);
                break;
            case "multiplicacion":
                $resultado = multiplicacion($num1, $num2);
                break;
            case "division":
                $resultado = division($num1, $num2);
                break;
            default:
                $resultado = "Error: Operación no válida.";
        }
    }

    echo "<h1>Resultado: $resultado</h1>";
    echo "<a href='index.html'>Volver</a>";
}
?>
