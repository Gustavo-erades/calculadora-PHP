<?php
    #pega os números digitados pelo usuário
    $num1=isset($_POST['num1'])? $_POST['num1']:"";
    $num2=isset($_POST['num2'])? $_POST['num2']:"";

    #pega a operação que o usuário deseja
    $operacao= isset($_POST['operacao'])?$_POST['operacao']:"";

    #verifida se o usuário pediu para calcular
    if(isset($_POST['submit'])){

         #verifica a operação desejada e faz o cálculo
        if($operacao!=""  && $num1!="" && $num2!=""){
            if($operacao=="soma"){
                $resultado=$num1+$num2;
            }elseif($operacao=="subtracao"){
                $resultado=$num1-$num2;
            }elseif($operacao=="multi"){
                $resultado=number_format($num1*$num2,0,",",".");
            }elseif($operacao=="divisao"){
                $resultado=number_format(($num1/$num2),1,",",".");
            }elseif($operacao=="media"){
                $resultado=number_format((($num1+$num2)/2),2,",",".");
            }
        }else{
            $resultado="Números para operação não definidos";
        }
        if($operacao==""  && $num1!="" && $num2!=""){
            $resultado="Operação Aritimética não definida";
        }
    } else{
        $resultado="";
    }

    #zera os inputs quando clicar no recarregar
    if(isset($_POST["recarregar"])){
        $num1="";
        $num2="";
        $resultado="";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="shortcut icon" href="calculadora.png" type="image/x-icon">
</head>
<body>
    <div id="container">
        <form action="index.php" method="post">
            <h1>Insira um número inteiro:</h1>
            <div id="inserir_numero">
                 <!-- número 1 -->
                <label for="num1">Número 1</label>
                <input type="number" name="num1" id="num1" min="0" value="<?php echo $num1?>">
                <br><br>
                <!-- número 2 -->
                <label for="num2">Número 2</label>
                <input type="number" name="num2" id="num2" min="0" value="<?php echo $num2?>">
            </div>   
            <br>
            <h1>Marque a Operação desejada:</h1>
            <div id="div_operacoes">
                <!-- soma -->
                <span>
                    <label for="soma">Adição</label>
                    <input type="radio" name="operacao" id="soma" value="soma">
                </span>
                <!-- subtração -->
                <span>
                    <label for="subtracao">Subtração</label>
                    <input type="radio" name="operacao" id="subtracao" value="subtracao">
                </span>
                <!-- multiplicação -->
                <span>
                    <label for="multi">Multiplicação</label>
                    <input type="radio" name="operacao" id="multi" value="multi">
                </span>
                <!-- divisão -->
                <span>
                    <label for="divisao">Divisão</label>
                    <input type="radio" name="operacao" id="divisao" value="divisao">
                </span>
                <!-- media -->
                <span>
                    <label for="media">Média</label>
                    <input type="radio" name="operacao" id="media" value="media">
                </span>
                <!-- botão -->
                <button type="submit" name="submit" id="botao">Calcular</button>
            </div>
        </form>
        <!-- resultado -->
        <div>
            <h1>resultado:</h1>
            <h3> <?php echo $resultado ?> </h3>
            <form action="index.php" method="post">
                <button onclick="javascript:document.location.reload()" id="recarregar" type="submit" name="recarregar">&#x1F504 recarregar</button>
            </form>
        </div>
    </div>
</body>
</html>
