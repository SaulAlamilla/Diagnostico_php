<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="card text-center">
    <div class="card-body">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
         <h5 class="card-title">Agregar dinero</h5> <!--<input type="text" name="nombre" />-->
         <select id="nombre" name="nombre">
            <option value="1">$1</option>
            <option value="2">$2</option>
            <option value="5">$5</option>
            <option value="10">$10</option>
            <option value="20">$20</option>
            <option value="50">$50</option>
            <option value="100">$100</option>
            <option value="200">$200</option>
            <option value="500">$500</option>
            <option value="1000">$1000</option>
         </select>

         <input class="btn btn-primary" value="Agregar" type="submit" name="agregar"/></p>
         <input class="btn btn-primary" value="Calcular ahorros" type="submit" name="total"/>
         <input class="btn btn-primary" value="Cantidad de monedas" type="submit" name="info"/>
         <input class="btn btn-danger" value="Romper alcancia" type="submit" name="vaciar"/>
    </form>
    </div>
</div>

</body>
</html>

<!--Codigo PHP-->


<?php
session_start();
$_SESSION['flag'];

if($_SESSION['flag'] == true){
}
else{
    $_SESSION['numero'] = array();
    $_SESSION['numero'][0] = 0;
    $_SESSION['numero'][1] = 0;
    $_SESSION['numero'][2] = 0;
    $_SESSION['numero'][3] = 0;
    $_SESSION['numero'][4] = 0;
    $_SESSION['numero'][5] = 0;
    $_SESSION['numero'][6] = 0;
    $_SESSION['numero'][7] = 0;
    $_SESSION['numero'][8] = 0;
    $_SESSION['numero'][9] = 0;
    $_SESSION['flag'] = true;
}

$objAlcancia = new alcancia();


if(isset($_POST['agregar'])) {
    echo $objAlcancia->agregar();
}
else if(isset($_POST['total'])){
    echo $objAlcancia->total();
}
else if(isset($_POST['vaciar'])){
    echo $objAlcancia->vaciar();
}
else if(isset($_POST['info'])){
    echo $objAlcancia->info();
}

class alcancia{
    public $total=0;

    public function agregar(){
        $valor = htmlspecialchars($_POST['nombre']);
        if($valor == "1"){
            $_SESSION['numero'][0]+=1;
        }else if($valor == "2"){
            $_SESSION['numero'][1]+=1;
        }else if($valor == "5"){
            $_SESSION['numero'][2]+=1;
        }else if($valor == "10"){
            $_SESSION['numero'][3]+=1;
        }else if($valor == "20"){
            $_SESSION['numero'][4]+=1;
        }else if($valor == "50"){
            $_SESSION['numero'][5]+=1;
        }else if($valor == "100"){
            $_SESSION['numero'][6]+=1;
        }else if($valor == "200"){
            $_SESSION['numero'][7]+=1;
        }else if($valor == "500"){
             $_SESSION['numero'][8]+=1;
        }else if($valor == "1000"){
             $_SESSION['numero'][9]+=1;
        }
        echo '<script type="text/javascript">'; echo 'alert("Agregaste dinero")'; echo '</script>';
    }
    public function total(){
        for($i = 0; $i < 10; $i++){
            if($i==0){
                $this->total = $this->total + (1*$_SESSION['numero'][$i]);
            }else if($i==1){
                $this->total = $this->total + (2*$_SESSION['numero'][$i]);
            }else if($i==2){
                $this->total = $this->total + (5*$_SESSION['numero'][$i]);
            }else if($i==3){
                $this->total = $this->total + (10*$_SESSION['numero'][$i]);
            }else if($i==4){
                $this->total = $this->total + (20*$_SESSION['numero'][$i]);
            }else if($i==5){
                $this->total = $this->total + (50*$_SESSION['numero'][$i]);
            }else if($i==6){
                $this->total = $this->total + (100*$_SESSION['numero'][$i]);
            }else if($i==7){
                $this->total = $this->total + (200*$_SESSION['numero'][$i]);
            }else if($i==8){
                $this->total = $this->total + (500*$_SESSION['numero'][$i]);
            }else if($i==9){
                $this->total = $this->total + (1000*$_SESSION['numero'][$i]);
            }
        }
        echo "Dinero total ahorrado: ".$this->total."<br>";
    }
    public function vaciar(){
        echo "Rompiste tu alcancia!<br>";
        unset($_SESSION['numero']);
        $_SESSION['flag'] = false;
    }
    public function info(){
        echo "Monedas de $1: ".$_SESSION['numero'][0]."<br>
              Monedas de $2: ".$_SESSION['numero'][1]."<br>
              Monedas de $5: ".$_SESSION['numero'][2]."<br>
              Monedas de $10: ".$_SESSION['numero'][3]."<br>
              Billetes de $20: ".$_SESSION['numero'][4]."<br>
              Billetes de $50: ".$_SESSION['numero'][5]."<br>
              Billetes de $100: ".$_SESSION['numero'][6]."<br>
              Billetes de $200: ".$_SESSION['numero'][7]."<br>
              Billetes de $500: ".$_SESSION['numero'][8]."<br>
              Billetes de $1000: ".$_SESSION['numero'][9]."<br>";

    }
}
?>