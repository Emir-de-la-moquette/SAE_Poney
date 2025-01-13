<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des ressources internes</title>
    <link rel="stylesheet" href="../static/styles/calendrier.css">
</head>
<?php
$exemplecours = ['Lundi'=>[['debut'=>9,
                            'fin'=>10,
                            'intitulé'=>'aqua poney',
                            'description'=>'des poneys qui font joujou dans l eau'],
                           ['debut'=>8,
                            'fin'=>9,
                            'intitulé'=>'soulever de poney',
                            'description'=>'on soulève des poneys et ouais']],
                 'Mardi'=>[['debut'=>8,
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
    echo "<th class='thsem><h2>$key</h2></th>";
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
                    printf("<td rowspan=%s class='tdsem'><a href=''><div class='cours'><h3>%s</h3></div></a></td>",$value['fin']-$value['debut'],$value['intitulé']);
                }
            }
        }
        if($pascours) {
            echo "<td class='tdsem'></td>";
        }
    }
    echo '</tr>';
}


?>
