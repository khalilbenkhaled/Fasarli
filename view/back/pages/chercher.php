<?php 

include "../../../../controller/controller.php";

$list = GroupC::chercher($_GET["q"]);

exit(json_encode($list));