<?php
/*------------SESSION START---------------*/

session_start();

if(!isset ($_SESSION['start'])){$_SESSION['start'] = '1';}
$_SESSION['action'] = rand(0,2);
$_SESSION['dmg1'] = rand(1,3);
$_SESSION['dmg2'] = rand(1,3);
$_SESSION['rest_ammount'] = rand(4,5);

/*------------RESET---------------*/

if (isset($_POST["reset"])){
    $_SESSION['start'] = '1';
    $_SESSION['MSG1'] = NULL;
    $_SESSION['MSG2'] = NULL;
    $_SESSION['MSG3'] = NULL;
}

/*------------DEKLARACE PROMĚNNÝCH---------------*/

if($_SESSION['start'] == 1){
    $_SESSION['hp1'] = '10';
    $_SESSION['hp2'] = '10';
    $_SESSION['sta1'] = '10';
    $_SESSION['sta2'] = '10';
    $_SESSION['arm1'] = '4';
    $_SESSION['arm2'] = '4';
    $_SESSION['MSG1'] = NULL;
    $_SESSION['MSG2'] = NULL;
    $_SESSION['MSG3'] = NULL;
 }

 /*------------FUNKCE TLAČÍTEK---------------*/
  
 /*------------TLAČÍTKO ÚTOK---------------*/
  
if (isset($_POST["attack"])){
          if($_SESSION['sta1'] >= 2){ $_SESSION['sta1'] = $_SESSION['sta1'] - 2;
          if ($_SESSION['dmg1'] > $_SESSION['arm2']){$_SESSION['hp2'] = $_SESSION['hp2'] - ($_SESSION['dmg1']-$_SESSION['arm2']);}
          if($_SESSION['arm2'] > 0){ $_SESSION['arm2'] = $_SESSION['arm2'] - $_SESSION['dmg1']; }
          else {$_SESSION['hp2'] = $_SESSION['hp2'] - $_SESSION['dmg1'];}
          }
          else{$_SESSION['sta1'] = $_SESSION['sta1'] + 4;}
          
          switch ($_SESSION['action']) {
              case 0: //ATTACK
                  if($_SESSION['sta2'] >= 2){ $_SESSION['sta2'] = $_SESSION['sta2'] - 2;
                  if ($_SESSION['dmg2'] > $_SESSION['arm1']){$_SESSION['hp1'] = $_SESSION['hp1'] - ($_SESSION['dmg2']-$_SESSION['arm1']);}
                  if($_SESSION['arm1'] > 0){ $_SESSION['arm1'] = $_SESSION['arm1'] - $_SESSION['dmg2']; }
                  else {$_SESSION['hp1'] = $_SESSION['hp1'] - $_SESSION['dmg2'];}
                  }
                  else{$_SESSION['sta2'] = $_SESSION['sta2'] + 4;}
                  break;
              case 1: //BLOCK
                  if($_SESSION['sta2'] >= 1){ $_SESSION['sta2'] = $_SESSION['sta2'] - 1;
                  if(isset($_POST["attack"])){$_SESSION['arm2'] = $_SESSION['arm2'] + ($_SESSION['dmg1'] / 2);}
                  else{ $_SESSION['arm2'] = $_SESSION['arm2'] + 1; }
                  if ($_SESSION['arm2'] > 5){$_SESSION['arm2'] = 5;}
                  }
                  else{$_SESSION['sta2'] = $_SESSION['sta2'] + 4;}
                  break;
              case 2: //REST
                  $_SESSION['sta2'] = $_SESSION['sta2'] + 4;
                  if ($_SESSION['sta2'] > 10){$_SESSION['sta2'] = 10;}
                  break;
}
          if ($_SESSION['action'] == 0){$_SESSION['action'] = 'Útok';} elseif($_SESSION['action'] == 1){$_SESSION['action'] = 'Obranu';} else {$_SESSION['action'] = 'Odpočinek';}
          $_SESSION['start'] = 0;
          $_SESSION['MSG1'] = '<br />Zmáčknul jsi tlačítko ' . $_POST['attack'] . ', zaútočil jsi za ' . $_SESSION['dmg1'] . ' bodů poškození.<br />' . '<br />PC použil ' . $_SESSION['action'] . '.<br />';
          $_SESSION['MSG2'] = NULL;
          $_SESSION['MSG3'] = NULL;
}

 /*------------TLAČÍTKO OBRANA---------------*/                                                                                                               

if (isset($_POST["block"])){
          if($_SESSION['sta1'] >= 1){ $_SESSION['sta1'] = $_SESSION['sta1'] - 1;
          if($_SESSION['action'] == 1){$_SESSION['arm1'] = $_SESSION['arm1'] + ($_SESSION['dmg2']/2);}
          else{ $_SESSION['arm1'] = $_SESSION['arm1'] + 1; }
          if ($_SESSION['arm1'] > 5){$_SESSION['arm1'] = 5;}
          }
          else{$_SESSION['sta1'] = $_SESSION['sta1'] + 4;}
          
           switch ($_SESSION['action']) {
              case 0: //ATTACK
                  if($_SESSION['sta2'] >= 2){ $_SESSION['sta2'] = $_SESSION['sta2'] - 2;
                  if ($_SESSION['dmg2'] > $_SESSION['arm1']){$_SESSION['hp1'] = $_SESSION['hp1'] - ($_SESSION['dmg2']-$_SESSION['arm1']);}
                  if($_SESSION['arm1'] > 0){ $_SESSION['arm1'] = $_SESSION['arm1'] - $_SESSION['dmg2']; }
                  else {$_SESSION['hp1'] = $_SESSION['hp1'] - $_SESSION['dmg2'];}
                  }
                  else{$_SESSION['sta2'] = $_SESSION['sta2'] + 4;}
                  break;
              case 1: //BLOCK
                  if($_SESSION['sta2'] >= 1){ $_SESSION['sta2'] = $_SESSION['sta2'] - 1;
                  if(isset($_POST["attack"])){$_SESSION['arm2'] = $_SESSION['arm2'] + ($_SESSION['dmg1'] / 2);}
                  else{ $_SESSION['arm2'] = $_SESSION['arm2'] + 1; }
                  if ($_SESSION['arm2'] > 5){$_SESSION['arm2'] = 5;}
                  }
                  else{$_SESSION['sta2'] = $_SESSION['sta2'] + 4;}
                  break;
              case 2: //REST
                  $_SESSION['sta2'] = $_SESSION['sta2'] + 4;
                  if ($_SESSION['sta2'] > 10){$_SESSION['sta2'] = 10;}
                  break;
} 
          if ($_SESSION['action'] == 0){$_SESSION['action'] = 'Útok';} elseif($_SESSION['action'] == 1){$_SESSION['action'] = 'Obranu';} else {$_SESSION['action'] = 'Odpočinek';}
          $_SESSION['start'] = 0;
          $_SESSION['MSG1'] = NULL;
          $_SESSION['MSG2'] = '<br />Zmáčknul jsi tlačítko ' . $_POST['block'] . '<br />PC použil ' . $_SESSION['action'] . '.<br />'; 
          $_SESSION['MSG3'] = NULL;
}

 /*------------TLAČÍTKO ÚTOK---------------*/

if (isset($_POST["rest"])){
          $_SESSION['sta1'] = $_SESSION['sta1'] + 4;
          if ($_SESSION['sta1'] > 10){$_SESSION['sta1'] = 10;}
          
           switch ($_SESSION['action']) {
              case 0: //ATTACK
                  if($_SESSION['sta2'] >= 2){ $_SESSION['sta2'] = $_SESSION['sta2'] - 2;
                  if ($_SESSION['dmg2'] > $_SESSION['arm1']){$_SESSION['hp1'] = $_SESSION['hp1'] - ($_SESSION['dmg2']-$_SESSION['arm1']);}
                  if($_SESSION['arm1'] > 0){ $_SESSION['arm1'] = $_SESSION['arm1'] - $_SESSION['dmg2']; }
                  else {$_SESSION['hp1'] = $_SESSION['hp1'] - $_SESSION['dmg2'];}
                  }
                  else{$_SESSION['sta2'] = $_SESSION['sta2'] + 4;}
                  break;
              case 1: //BLOCK
                  if($_SESSION['sta2'] >= 1){ $_SESSION['sta2'] = $_SESSION['sta2'] - 1;
                  if(isset($_POST["attack"])){$_SESSION['arm2'] = $_SESSION['arm2'] + ($_SESSION['dmg1'] / 2);}
                  else{ $_SESSION['arm2'] = $_SESSION['arm2'] + 1; }
                  if ($_SESSION['arm2'] > 5){$_SESSION['arm2'] = 5;}
                  }
                  else{$_SESSION['sta2'] = $_SESSION['sta2'] + 4;}
                  break;
              case 2: //REST
                  $_SESSION['sta2'] = $_SESSION['sta2'] + 4;
                  if ($_SESSION['sta2'] > 10){$_SESSION['sta2'] = 10;}
                  break;
}     
          if ($_SESSION['action'] == 0){$_SESSION['action'] = 'Útok';} elseif($_SESSION['action'] == 1){$_SESSION['action'] = 'Obranu';} else {$_SESSION['action'] = 'Odpočinek';}
          $_SESSION['start'] = 0;
          $_SESSION['MSG1'] = NULL;
          $_SESSION['MSG2'] = NULL;
          $_SESSION['MSG3'] = '<br />Zmáčknul jsi tlačítko ' . $_POST['rest'] . ', obnovil jsi ' . $_SESSION['rest_ammount'] . ' bodů výdrže.<br />' . '<br />PC použil ' . $_SESSION['action'] . '.<br />'; 
}

/*------------HTML---------------*/

?>
<!DOCTYPE html>
<!--
    Created by Jakub Cerveny
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hra: Náhoda vyhrává</title>
        <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
        <link rel="icon" href="favicon.png">
    </head>
    <body style="font-size: 50px;">
        <header>
            <div class="row">
                <h1 class="col-sm-4 text-left">
                    Informační systém
                </h1> 
                <nav class="col-sm-8 text-right menu">
                    <a href="test.php">TEST</a>
                    <a href="game.php">Hra</a>    
                    <a href="index.php">Domů</a>
                    <a href="http://skolakrizik.cz">Školní web</a>
                    <a href="https://krizik.bakalari.cz:8880/next/login.aspx">Bakalaři</a>
                </nav>
            </div>
        </header>
        <table>
            <tr>
                <th></th>
                <th>Hráč</th>
                <th>&nbsp</th>
                <th>Nepřítel</th>
            </tr>
            <tr>
                <td><b>ŽIVOTY:</b></td>
                <td><?php for ($i = 1; $i <= $_SESSION['hp1']; $i++) { echo "❤"; }  ?><br></td>
                <th>&nbsp&nbsp&nbsp</th>
                <td><?php for ($i = 1; $i <= $_SESSION['hp2']; $i++) { echo "❤"; }  ?><br></td>
            </tr>
            <tr>
                <td><b>VÝDRŽ:</b></td>
                <td><?php for ($i = 1; $i <= $_SESSION['sta1']; $i++) { echo "☯"; }  ?><br></td>
                <th>&nbsp&nbsp&nbsp</th>
                <td><?php for ($i = 1; $i <= $_SESSION['sta2']; $i++) { echo "☯"; }  ?><br></td>
            </tr>
            <tr>
                <td><b>BRNĚNÍ:</b></td>
                <td><?php for ($i = 1; $i <= $_SESSION['arm1']; $i++) { echo "♖"; }  ?><br></td>
                <th>&nbsp&nbsp&nbsp</th>
                <td><?php for ($i = 1; $i <= $_SESSION['arm2']; $i++) { echo "♖"; }  ?><br></td>
            </tr>
        </table>
        <br>
        <form method="POST">
            <input name="attack" class="btn-danger" type="submit" value="Útok" />
            <input name="block" class="btn-warning" type="submit" value="Obrana" />
            <input name="rest" class="btn-success" type="submit" value="Odpočinek" />
            <input name="reset" class="btn" type="submit" value="RESET" />
        </form>   
    </body>
</html>
  
<?php

/*------------VÝPIS ZPRÁV---------------*/

echo $_SESSION['MSG1']; 
echo $_SESSION['MSG2']; 
echo $_SESSION['MSG3']; 


/*------------VÝHRA/PROHRA---------------*/

if ($_SESSION['hp1'] <= 0){echo "<script>window.location = 'defeat.php'</script>";}
if ($_SESSION['hp2'] <= 0){echo "<script>window.location = 'victory.php'</script>";}
?>    