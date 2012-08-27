<?php
$citate = ClassRegistry::init('Citates.Citate');
$citate = $citate->find('first', array('order'=>'rand()'));
if($citate != null && is_array($citate)){
    echo $citate['Citate']['body'];
    if(!empty($citate['Citate]['author])){
        echo "<br/><div class='small'> (" . str_replace(' ', '&nbsp;', $citate['Citate']['author']) . ")</div>";
    }
}
?>
