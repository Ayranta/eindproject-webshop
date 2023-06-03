<?php
include "connect.php";
$sql = "SELECT artikelnummer, artikelnaam, prijs,afbeelding FROM artikel";

$resultaat = $mysqli->query($sql);



echo "<table>";
echo "<tr><td>artikelnummer</td><td>artikel naam</td><td>afbeelding</td></tr>";
while ($row = $resultaat->fetch_assoc()) {
    echo "<tr><td>". $row['artikelnummer'] . "</td><td>". $row['artikelnaam'] . "</td><td>". $row['prijs'] . " euro</td><td><img src=". $row['afbeelding'] . " alt='yamaha r7'width='300px'height='300px'></td><td>
        <a href=afrekenen.php?teafrekenen=".$row["artikelnummer"]. ">afrekenen</a></td><td>
        <a href=wijzig.php?teveranderen=".$row["artikelnummer"].">aanpassen</a>
        
        </td>";
}
echo "</table>";
