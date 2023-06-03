<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
        *,
        *:before,
        *:after{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            background-color: #080710;
        }
        .background{
            width: 430px;
            height: 520px;
            position: absolute;
            transform: translate(-50%,-50%);
            left: 50%;
            top: 50%;
        }
        .background .shape{
            height: 200px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }
        .shape:first-child{
            background: linear-gradient(
                    #1845ad,
                    #23a2f6
            );
            left: -80px;
            top: -80px;
        }
        .shape:last-child{
            background: linear-gradient(
                    to right,
                    #ff512f,
                    #f09819
            );
            right: -30px;
            bottom: -80px;
        }
        form{
            height: 520px;
            width: 400px;
            background-color: rgba(255,255,255,0.13);
            position: absolute;
            transform: translate(-50%,-50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255,255,255,0.1);
            box-shadow: 0 0 40px rgba(8,7,16,0.6);
            padding: 50px 35px;
        }
        form *{
            font-family: 'Poppins',sans-serif;
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }
        form h3{
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
        }

        label{
            display: block;
            margin-top: 30px;
            font-size: 16px;
            font-weight: 500;
        }
        input{
            display: block;
            height: 50px;
            width: 100%;
            background-color: rgba(255,255,255,0.07);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }
        ::placeholder{
            color: #e5e5e5;
        }
        #knop{
            margin-top: 40px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }
        .social{
            margin-top: 30px;
            display: flex;
        }
        .social div{
            background: red;
            width: 150px;
            border-radius: 3px;
            padding: 5px 10px 10px 5px;
            background-color: rgba(255,255,255,0.27);
            color: #eaf0fb;
            text-align: center;
        }
        .social div:hover{
            background-color: rgba(255,255,255,0.47);
        }
        .social .fb{
            margin-left: 25px;
        }
        .social i{
            margin-right: 4px;
        }

    </style>
</head>
<body>
<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<?php
session_start();
if (isset($_SESSION['admin'])){
    if ($_SESSION['admin']==0){
        header('Location: index.php');
    }
}else{
    header('Location: index.php');
}
echo "<h2>Tabel aanpassen</h2><br>";
include "connect.php";
if (isset($_POST['knop'])){
    $nummer = $_POST['nummer'];
    $naam = $_POST['naam'];
    $voornaam = $_POST['voornaam'];
    if (isset($_POST['admin'])) {
        $admin = 1;
    }else{
        $admin=0;
    }
    $wachtwoord = $_POST['wachtwoord'];
    $email=$_POST["email"];
    $sql = "UPDATE klanten SET naam = '".$naam."',  voornaam = '".$voornaam."',admin = '".$admin."', wachtwoord = '".$wachtwoord."', email = '".$email."' WHERE gebruikernummer =".$nummer;
    if ($mysqli->query($sql)) {
        echo "Record succesvol bijgewerkt";

    } else {
        echo "Error record wijzigen: ".$mysqli->error;
    }
    echo '<a href="users.php"></a>';
    header('Location: users.php');

}else{

    $sql = "select * from klanten where gebruikernummer = ".$_GET['veranderen'];
    $resultaat = $mysqli->query($sql);
    $row = $resultaat->fetch_assoc();
    print $sql;
    echo'
<form method="post" action="wijzig_klanten.php">
    <h3>toevoegen hier</h3>
   
              <table>
            
              <input type="hidden" name="nummer" id="nummer" value="'.$row["gebruikernummer"].'">

              <input type="text" name="naam" value="'.$row['naam'].'">
              <input type="text" name="voornaam" value="'.$row['voornaam'].'">
              <input type="password" name="wachtwoord" value="'.$row["wachtwoord"].'">
              <input type="text" name="email" value="'.$row["email"].'">
              ';
    if ($row["admin"]==1) {
        echo '<form>
            
           <input type = "checkbox" name = "admin" value = "'.$row["admin"].'" checked>
           </form>
        ';
      }else{
        echo '<form>
           
           <input type = "checkbox" name = "admin" value = "'.$row["admin"].'">
           </form>
        ';
    }
echo '
</table>

    <input type="submit" id="knop" name="knop" value="Wijzigen">
    
</form>
';
}
?>
</body>
</html>

