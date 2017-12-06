<?php
/*------------SESSION START---------------*/

session_start();

if(!isset ($_SESSION['start'])){$_SESSION['start'] = '1';}
$action = rand(0,2);
$dmg1 = rand(1,3);
$dmg2 = rand(1,3);
$MSG1 = NULL;
$MSG2 = NULL;
$MSG3 = NULL;

/*------------RESET---------------*/

if (isset($_POST["reset"])){
    $_SESSION['start'] = '1';
}
/*------------DEKLARACE PROMĚNNÝCH---------------*/

if($_SESSION['start'] == 1) {
    $_SESSION['hp1'] = '10';
    $_SESSION['hp2'] = '10';
    $_SESSION['sta1'] = '10';
    $_SESSION['sta2'] = '10';
    $_SESSION['arm1'] = '5';
    $_SESSION['arm2'] = '5';
}
 /*------------FUNKCE TLAČÍTEK---------------*/
  
 /*------------TLAČÍTKO ÚTOK---------------*/
  
if (isset($_POST["attack"])){
          if($_SESSION['sta1'] >= 2){ $_SESSION['sta1'] = $_SESSION['sta1'] - 2;
          if ($dmg1 > $_SESSION['arm2']){$_SESSION['hp2'] = $_SESSION['hp2'] - ($dmg1-$_SESSION['arm2']);}
          if($_SESSION['arm2'] > 0){ $_SESSION['arm2'] = $_SESSION['arm2'] - $dmg1; }
          else {$_SESSION['hp2'] = $_SESSION['hp2'] - $dmg1;}
          }
          else{$_SESSION['sta1'] = $_SESSION['sta1'] + 4;}
          
          switch ($action) {
              case 0: //ATTACK
                  if($_SESSION['sta2'] >= 2){ $_SESSION['sta2'] = $_SESSION['sta2'] - 2;
                  if ($dmg2 > $_SESSION['arm1']){$_SESSION['hp1'] = $_SESSION['hp1'] - ($dmg2-$_SESSION['arm1']);}
                  if($_SESSION['arm1'] > 0){ $_SESSION['arm1'] = $_SESSION['arm1'] - $dmg2; }
                  else {$_SESSION['hp1'] = $_SESSION['hp1'] - $dmg2;}
                  }
                  else{$_SESSION['sta2'] = $_SESSION['sta2'] + 4;}
                  break;
              case 1: //BLOCK
                  if($_SESSION['sta2'] >= 1){ $_SESSION['sta2'] = $_SESSION['sta2'] - 1;
                  if(isset($_POST["attack"])){$_SESSION['arm2'] = $_SESSION['arm2'] + ($dmg1 / 2);}
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
          if ($action == 0){$action = 'Útok';} elseif($action == 1){$action = 'Obranu';} else {$action = 'Odpočinek';}
          $_SESSION['start'] = 0;
          $MSG1 = '<br />Zmáčknul jsi tlačítko ' . $_POST['attack'] . ', zaútočil jsi za ' . $dmg1 . ' bodů poškození.<br />' . '<br />PC použil ' . $action . '.<br />';
}
 /*------------TLAČÍTKO OBRANA---------------*/                                                                                                               

if (isset($_POST["block"])){
          if($_SESSION['sta1'] >= 1){ $_SESSION['sta1'] = $_SESSION['sta1'] - 1;
          if($action == 1){$_SESSION['arm1'] = $_SESSION['arm1'] + ($dmg2/2);}
          else{ $_SESSION['arm1'] = $_SESSION['arm1'] + 1; }
          if ($_SESSION['arm1'] > 5){$_SESSION['arm1'] = 5;}
          }
          else{$_SESSION['sta1'] = $_SESSION['sta1'] + 4;}
          
           switch ($action) {
              case 0: //ATTACK
                  if($_SESSION['sta2'] >= 2){ $_SESSION['sta2'] = $_SESSION['sta2'] - 2;
                  if ($dmg2 > $_SESSION['arm1']){$_SESSION['hp1'] = $_SESSION['hp1'] - ($dmg2-$_SESSION['arm1']);}
                  if($_SESSION['arm1'] > 0){ $_SESSION['arm1'] = $_SESSION['arm1'] - $dmg2; }
                  else {$_SESSION['hp1'] = $_SESSION['hp1'] - $dmg2;}
                  }
                  else{$_SESSION['sta2'] = $_SESSION['sta2'] + 4;}
                  break;
              case 1: //BLOCK
                  if($_SESSION['sta2'] >= 1){ $_SESSION['sta2'] = $_SESSION['sta2'] - 1;
                  if(isset($_POST["attack"])){$_SESSION['arm2'] = $_SESSION['arm2'] + ($dmg1 / 2);}
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
          if ($action == 0){$action = 'Útok';} elseif($action == 1){$action = 'Obranu';} else {$action = 'Odpočinek';}
          $_SESSION['start'] = 0;
          $MSG2 = '<br />Zmáčknul jsi tlačítko ' . $_POST['block'] . ' <br />' . '<br />PC použil ' . $action . '.<br />';
}
 /*------------TLAČÍTKO ÚTOK---------------*/

if (isset($_POST["rest"])){
          $_SESSION['sta1'] = $_SESSION['sta1'] + 4;
          if ($_SESSION['sta1'] > 10){$_SESSION['sta1'] = 10;}
          
           switch ($action) {
              case 0: //ATTACK
                  if($_SESSION['sta2'] >= 2){ $_SESSION['sta2'] = $_SESSION['sta2'] - 2;
                  if ($dmg2 > $_SESSION['arm1']){$_SESSION['hp1'] = $_SESSION['hp1'] - ($dmg2-$_SESSION['arm1']);}
                  if($_SESSION['arm1'] > 0){ $_SESSION['arm1'] = $_SESSION['arm1'] - $dmg2; }
                  else {$_SESSION['hp1'] = $_SESSION['hp1'] - $dmg2;}
                  }
                  else{$_SESSION['sta2'] = $_SESSION['sta2'] + 4;}
                  break;
              case 1: //BLOCK
                  if($_SESSION['sta2'] >= 1){ $_SESSION['sta2'] = $_SESSION['sta2'] - 1;
                  if(isset($_POST["attack"])){$_SESSION['arm2'] = $_SESSION['arm2'] + ($dmg1 / 2);}
                  else{ $_SESSION['arm2'] = $_SESSION['arm2'] + 1; }
                  if ($_SESSION['arm2'] > 5){$_SESSION['arm2'] = 5;}
                  }
                  else{$_SESSION['sta2'] = $_SESSION['sta2'] + 4;}
                  break;
              case 2: //REST
                  $_SESSION['sta2'] = $_SESSION['sta2'] + 4;
                  if ($_SESSION['sta2'] > 10){$_SESSION['sta2'] = 10;}
                  break;    }
          if ($action == 0){$action = 'Útok';} elseif($action == 1){$action = 'Obranu';} else {$action = 'Odpočinek';}
          $_SESSION['start'] = 0;
          $MSG3 = '<br />Zmáčknul jsi tlačítko ' . $_POST['rest'] . ', obnovil jsi 4 body výdrže.<br />' . '<br />PC použil ' . $action . '.<br />';
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
        <table border="1">
            <tr>
                <th></th>
                <th>Hráč</th>
                <th>&nbsp</th>
                <th>Nepřítel</th>
            </tr>
            <tr>
                <td><b>ŽIVOTY:</b></td>
                <td><?php for ($i = 1; $i <= $_SESSION['hp1']; $i++) { echo "❤"; }  ?><br></td>
                <th></th>
                <td><?php for ($i = 1; $i <= $_SESSION['hp2']; $i++) { echo "❤"; }  ?><br></td>
            </tr>
            <tr>
                <td><b>VÝDRŽ:</b></td>
                <td><?php for ($i = 1; $i <= $_SESSION['sta1']; $i++) { echo "☯"; }  ?><br></td>
                <th></th>
                <td><?php for ($i = 1; $i <= $_SESSION['sta2']; $i++) { echo "☯"; }  ?><br></td>
            </tr>
            <tr>
                <td><b>BRNĚNÍ:</b></td>
                <td><?php for ($i = 1; $i <= $_SESSION['arm1']; $i++) { echo "♖"; }  ?><br></td>
                <th></th>
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

echo $MSG1; 
echo $MSG2; 
echo $MSG3;

/*------------VÝHRA/PROHRA---------------*/

if ($_SESSION['hp1'] <= 0){
    session_unset();
    session_destroy();
    echo "<script>window.location = 'defeat.php'</script>";}
if ($_SESSION['hp2'] <= 0){
    session_unset();
    session_destroy();
    echo "<script>window.location = 'victory.php'</script>";}
?>    