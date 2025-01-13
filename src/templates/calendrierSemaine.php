
<?php

//include "../static/scriptmodele";

#getCours("2024-11-20","2024-11-24");

$date = new DateTime($_GET['date'] ?? "now");
$premierJourSemaine = $date->format('d') - $date->format('N') + 1;

$mois = $date->format('m');
$nbJourDansMoisDernier = $date->modify("last day of previous month")->format('t');

$exemplecours = ['Lundi'=>[['id'=>1,
                            'debut'=>9,
                            'fin'=>10,
                            'intitulé'=>'aqua poney',
                            'description'=>'des poneys qui font joujou dans l eau'],
                           ['id'=>2,
                            'debut'=>8,
                            'fin'=>9,
                            'intitulé'=>'soulever de poney',
                            'description'=>'on soulève des poneys et ouais']],
                 'Mardi'=>[['id'=>3,
                            'debut'=>8,
                            'fin'=>12,
                            'intitulé'=>'soulever de poney2',
                            'description'=>'des poneys qui font joujou dans l eau']],
                 'Mercredi'=>[],
                 'Jeudi'=>[],
                 'Vendredi'=>[],
                 'Samedi'=>[],
                 'Dimanche'=>[]];

echo '<table border="1">';
echo '<tr class="trsem">';
echo '<th class="thsem"></th>';
foreach ($exemplecours as $key => $value) {
    $jour = $premierJourSemaine;
    if($premierJourSemaine<=0){
        $jour=$nbJourDansMoisDernier+$premierJourSemaine;
        $mois = $date->modify('-1 month')->format('m');
        $annee = $date->format('o');
    } elseif ($premierJourSemaine==1) {
        $mois = $date->format('m');
        $annee = $date->format('o');
    }
    $date->modify('+1 month');
    echo "<th class='thsem'><h2>$key</h2><p>$jour/$mois/$annee</p></th>";
    $premierJourSemaine++;
}
echo '</tr>';

for ($i= 8;$i<20;$i++){
    echo '<tr class="trsem">';
    printf("<th class='thsem'>%s - %s h</th>", $i, ($i+1)%24);
    foreach ($exemplecours as $jour=>$cours) {
        $pascours = true;
        foreach ($cours as $value) {
            if ($i>=$value['debut'] && ($i<$value['fin'] || $i==$value['debut'])){
                $pascours = false;
                if ($i==$value['debut']) {
                    printf("<td rowspan=%s class='tdsem'><a href='/src/templates/seance.php?id=%s'><div class='cours'><h3>%s</h3></div></a></td>",$value['fin']-$value['debut'],$value['id'],$value['intitulé']);
                }
            }
        }
        if($pascours) {
            echo "<td class='tdsem'></td>";
        }
    }
    echo '</tr>';
}
echo '</table>';
?>
