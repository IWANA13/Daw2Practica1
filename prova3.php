<?php 
    $mostraform=true;
    if (isset($_GET['opera'])){
        $op1=getOperaNum(1);
        $op2=getOperaNum(2);
        $opera=$_GET['opera'];

        if ($op1!=null && $op2!=null) {
            switch ($opera){
                case "mes":
                    $result=$op1+$op2;
                    break;
                case "menys":
                    $result=$op1-$op2;
                    break;
                case "div":
                    if ($op2==0){
                        $result="ERROR";
                    }else {
                        $result=$op1/$op2;
                    }
                    break;
                case "mult":
                    $result=$op1*$op2;
                    break;
                default:
                    $result="ERROR operación no válida";
            }
        } else {
            $result="ERROR";
        }

        $mostraform=false;
    }


    function getOperaNum($i){
        if (isset($_GET["op".$i]))
        {
            $valor = $_GET["op".$i];
            if (is_numeric($valor))  return $valor;
            else return "";            
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>PHP Calc</h1>
    <?php if ($mostraform) { ?>
        <form method="GET" action="calculadora.php">
            <input type="text" name="op1">
            <select name="opera">
                <option value="mes">+</option>
                <option value="menys">-</option>
                <option value="div">/</option>
                <option value="mult">*</option>
            </select>
            <input type="text" name="op2">
            <input type="submit" value="Calcula">
        </form>
    <?php } else { ?>
        <h2><?php echo $op1 . " " . $opera . " " . $op2 . " = " . $result; ?></h2>
    <?php } ?>
    
</body>
</html>