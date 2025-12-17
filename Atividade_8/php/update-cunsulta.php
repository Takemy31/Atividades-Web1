<?php
if (isset($_GET['id'])) {
    header('Location: update-consulta.php?id=' . urlencode($_GET['id']));
    exit;
}
header('Location: index-consulta.php');
exit;