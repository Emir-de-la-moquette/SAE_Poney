<?php
$exemplecours = ['Lundi'=>[['debut'=>5,
                            'fin'=>7,
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
echo '<tr>';
echo '<th></th>';
foreach ($exemplecours as $key => $value) {
    echo "<th>$key</th>";
}
echo '</tr>';

for ($i= 0;$i<24;$i++){
    echo '<tr>';
    printf("<th>%s - %s h</th>", $i, ($i+1)%24);
    foreach ($exemplecours as $jour=>$cours) {
        $pascours = true;
        foreach ($cours as $value) {
            if ($i>=$value['debut'] && ($i<$value['fin'] || $i==$value['debut'])){
                $pascours = false;
                if ($i==$value['debut']) {
                    printf("<td rowspan=%s><div><h2>%s</h2><p>%s</p></div></td>",$value['fin']-$value['debut'],$value['intitulé'],$value['description']);
                }
            }
        }
        if($pascours) {
            echo "<td></td>";
        }
    }
    echo '</tr>';
}
