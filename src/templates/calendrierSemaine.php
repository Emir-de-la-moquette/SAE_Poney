<?php
$Days = 1;
    
$date = new DateTime("2025-01-13");
// Nombre de jours dans le mois
$nbJourDansMois = $date->format('t'); // 't' retourne le nombre de jours dans le mois
$jourDebutMois = $date->format('N')+1-$date->format('d'); // Le jour de la semaine du 1er jour du mois (1 = lundi, 7 = dimanche)
if($jourDebutMois<0)$jourDebutMois = ($jourDebutMois%7)+7;

// header basique avec les jours
echo '<table border="1">';
echo '<tr>';
echo '<th>Lundi</th>';
echo '<th>Mardi</th>';
echo '<th>Mercredi</th>';
echo '<th>Jeudi</th>';
echo '<th>Vendredi</th>';
echo '<th>Samedi</th>';
echo '<th>Dimanche</th>';
echo '</tr>';

for ($i=0; $i < 6 ; $i++) {
    echo '<tr>';
    for($j=1; $j < 8;$j++) {
        if($j+$i*7 >= $jourDebutMois ){
            if ($Days > $nbJourDansMois)$Days = 1;
            echo "<td>$Days</td>";
            $Days++;
        }else{
            echo "<td></td>";
        }
    }
    echo '</tr>';
}
