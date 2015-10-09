<?php
require_once "sillaba.php";

$array=sillaba("Apelle figlio d'Apollo fece una palla di pelle di pollo, tutti i pesci vennero a galla per vedere la palla di pelle di pollo fatta da Apelle figlio d'Apollo.");

//stampo le sillabe attaccate da -
echo implode("-", $array);