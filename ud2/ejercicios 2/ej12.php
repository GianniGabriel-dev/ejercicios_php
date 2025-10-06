<?php
echo "Suma de los números apres del uno al 30 . <br>";
$suma=0; //se establece la suma que cada vez que se encuentre un número par dentro del bucle se le sumaría el valor progresivamente hasta llegar a los 30 num
for ($i=1; $i <=30; $i++){
    if($i % 2 == 0) $suma+=$i;
}
echo"la suma es igual a $suma"
?>