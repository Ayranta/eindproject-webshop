<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
          rel="stylesheet">

    <title>Sixteen Clothing Products</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--

    TemplateMo 546 Sixteen Clothing

    https://templatemo.com/tm-546-sixteen-clothing

    -->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="../assets/css/owl.css">

</head>

<body>



<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="afrekenen.php"><h2 >Yamaha <em>Belgium</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

                    <?php
                    session_start();
                    include "connect.php";
                    if (isset($_SESSION["login"])) {
                        if ($_SESSION["login"]>0) {
                            $sql = "SELECT gebruikernummer,voornaam, admin, naam  FROM klanten WHERE gebruikernummer='" . $_SESSION['login'] . "'";
                            $resultaat = $mysqli->query($sql);
                            $row = $resultaat->fetch_assoc();
                            echo '<li class="nav-item">
                        <a class="nav-link">' . $row["naam"] . ' ' . $row["voornaam"] . '</a>
                        </li>';
                            $admin=$row["admin"];
                        }else{
                            echo'<li class="nav-item">
                            <a class="nav-link" href="register.php">registreer</a>
                            </li>
                    ';
                            $admin=0;
                        }
                    }else{
                        echo'<li class="nav-item">
                    <a class="nav-link" href="register.php">registreer</a>
                    </li>
                    ';
                        $admin=0;
                    }

                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Page Content -->
<div class="page-heading products-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-content">
                    <h2>Overzicht</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="filters-content">
                    <div class="row grid">


                        <?php
                        include "connect.php";
                        if (isset($_POST['pdf'])){
                            header('Location: pdf.php');
                        }
                        if (isset($_POST['knop'])) {

                        $gebruikersnummer = $_SESSION["login"];
                        $sql = "select * from winkelkar where gebruikernummer = ".$gebruikersnummer;
                        $resultaat = $mysqli->query($sql);

                        while ($row = $resultaat->fetch_assoc()) {
                            $gebruikersnummer = $_SESSION["login"];
                            $artikelnaam = $row['artikelnaam'];
                            $artikelnummer = $row['artikelnummer'];
                            $prijs = $row['prijs'];
                            $aantal = $row['aantal'];
                            $sql = "INSERT INTO bestelling (gebruikernummer, artikelnaam, prijs,aantal, artikelnummer) VALUES ('" . $gebruikersnummer . "', '" . $artikelnaam . "', '" . $prijs . "', '" . $aantal . "', '" . $artikelnummer . "')";
                            if ($mysqli->query($sql)) {
                                echo "Record succesvol toegevoegd<br>";
                            } else {
                                echo 'Error record toevoegen: ' . $mysqli->error . "<br>";
                            }

                        }


                        $sql = "DELETE FROM winkelkar WHERE gebruikernummer = ".$gebruikersnummer;
                            if ($mysqli->query($sql)) {
                                echo "Record succesvol toegevoegd<br>";
                            } else {
                                echo 'Error record toevoegen: ' . $mysqli->error . "<br>";
                            }
                            $mysqli->close();

                            header('Location: index.php');

                        }else{
                        $gebruikersnummer = $_SESSION["login"];
                        $sql = "select * from winkelkar where gebruikernummer = ".$gebruikersnummer;
                        ?>
                        <?php

                            echo '   
                        <form method="post" action="afrekenen.php">
                        <input type="submit" id="knop" name="knop" value="Home">
                        </form>
                        ';

                            echo ' <form method="post" action="afrekenen.php">
                        <input type="submit" id="pdf" name="pdf" value="Pdf">
                        </form>
                        ';

                            echo "<br>\n";
                            echo "<br>\n";
                            echo "<br>\n";


                        $resultaat = $mysqli->query($sql);
                        while ($row = $resultaat->fetch_assoc()) {

                          echo $row['artikelnummer'] . " "  . $row['artikelnaam'] . " " . $row['aantal'] . " x € " . $row['prijs'] . " = € "  . $row["aantal"]*$row["prijs"] . "<br>\n";
                        }
                        echo " " . "<br>\n";

                        }
                        ?>



                    </div>
                </div>
            </div>


            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="inner-content">
                                <p></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>


            <!-- Bootstrap core JavaScript -->
            <script src="../vendor/jquery/jquery.min.js"></script>
            <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


            <!-- Additional Scripts -->
            <script src="../assets/js/custom.js"></script>
            <script src="../assets/js/owl.js"></script>
            <script src="../assets/js/slick.js"></script>
            <script src="../assets/js/isotope.js"></script>
            <script src="../assets/js/accordions.js"></script>


            <script language="text/Javascript">
                cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
                function clearField(t) {                   //declaring the array outside of the
                    if (!cleared[t.id]) {                      // function makes it static and global
                        cleared[t.id] = 1;  // you could use true and false, but that's more typing
                        t.value = '';         // with more chance of typos
                        t.style.color = '#fff';
                    }
                }
            </script>


</body>

</html>