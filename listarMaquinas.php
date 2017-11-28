<?php

header('Content-Type: application/json');
$request = json_decode(file_get_contents('php://input'), true);
$types = array('json');
$arquivos = array();
if ($handle = opendir('maquinas')) {
    while ($entry = readdir($handle)) {
        $ext = strtolower(pathinfo($entry, PATHINFO_EXTENSION));
        if (in_array($ext, $types)) {
            $arquivos[] = $entry;
        }
    }
    closedir($handle);
}
echo json_encode($arquivos);
?>