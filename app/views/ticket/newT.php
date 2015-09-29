<?php
use micro\orm\DAO;
echo DAO::$db->query("SELECT * FROM `ticket` WHERE idStatut =1")->fetchColumn();
?>

