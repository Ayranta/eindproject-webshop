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

<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php"><h2>Yamaha <em>Belgium</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="products.php">producten</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="users.php">users</a>
                    </li>
                    <?php
                    session_start();
                    if (isset($_SESSION['admin'])){
                        if ($_SESSION['admin']==0){
                            header('Location: index.php');
                        }
                    }else{
                        header('Location: index.php');
                    }
                    if (isset($_SESSION["login"])) {
                        echo '
                <li class="nav-item">
                     <a  class="nav-link" href="loguit.php">uitloggen</a>
                </li> 
              ';
                    }else{
                        echo '
                
                 <li class="nav-item">
                  <a  class="nav-link" href="login.php">login</a>
              </li>
              ';
                    }
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
                    echo'
                    <li class="nav-item">
                        <a class="nav-link active" href="winkelkar.php"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg></a>
                    </li>
                        ';
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
                    <h2>winkelkar</h2>
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

                        $gebruikersnummer = $_SESSION["login"];
                        $sql = "select * from winkelkar where gebruikernummer = ".$gebruikersnummer;
                        ?>



                        <?php
                            echo "<table>";
                                $resultaat = $mysqli->query($sql);
                                while ($row = $resultaat->fetch_assoc()) {

                                echo ' <div class="col-md-4">
                                    <div class="product-item">
                                        <a href="#"><img src=' . $row["afbeelding"] . ' alt=""></a>
                                        <div class="down-content">
                                            <a href="#"><h4>' . $row["artikelnaam"] . '</h4></a>
                                            <h6>' . $row["prijs"] . '€</h6>
                                            <p>Aantal ' . $row["aantal"] . '</p>
                                            <h5>Totaal '.$row["aantal"]*$row["prijs"].'</h5>
                                        </div>
                                    </div>
                                </div>';



                                }


                                echo "</table>";?>
                        <br><br><br><br>
                                <?php
                                echo "<a href='afrekenen.php'>Afrekenen</a>";
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