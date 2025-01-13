 
<?php
$Days = 1;
    
$date = new DateTime("2025-02-28");

$nbJourDansMois = $date->format('t');
$jourDebutMois = $date->modify("first day of this month")->format('N');
$jourDernierMoisPrecedent= $date->modify("last day of previous month")->format('N');

echo '<table border="1">';
echo '<tr>';
echo '<th>L</th>';
echo '<th>M</th>';
echo '<th>M</th>';
echo '<th>J</th>';
echo '<th>V</th>';
echo '<th>S</th>';
echo '<th>D</th>';
echo '</tr>';

for ($i=0; $i < 6 ; $i++) {
    echo '<tr>';
    for($j=1; $j < 8;$j++) {
        if($j+$i*7 >= $jourDebutMois ){
            if ($Days > $nbJourDansMois){$Days = 1;}
            echo "<td>$Days</td>";
            $Days++;
        }else{
            echo "<td>  ̇Ù</td>";
        }
    }
    echo '</tr>';
}