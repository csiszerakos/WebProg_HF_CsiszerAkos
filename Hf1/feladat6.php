<?php
$honap=13;
    if($honap==12 or $honap==1 or $honap==2){
        echo "A megadott hónap télen van.";
    }
    elseif($honap==3 or $honap==4 or $honap==5){
        echo "A megadott hónap tavasszal van.";
    }
    elseif($honap==6 or $honap==7 or $honap==8){
        echo "A megadott hónap nyáron van.";
    }
    elseif($honap==9 or $honap==10 or $honap==11){
        echo "A megadott hónap ősszel van.";
    }
    else{
        echo "A megadott hónap nem létezik";
    }
?>