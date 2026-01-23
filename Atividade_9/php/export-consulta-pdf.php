<?php
require_once 'db.php';
require_once 'authenticate.php';
require '../vendor/autoload.php';

use Dompdf\Dompdf;

$query = $pdo->prepare(
    "SELECT c.ID_CON, c.DATA_CONSULTA, c.HORA_CONSULTA,
            p.NOME AS PACIENTE_NOME,
            m.NOME AS MEDICO_NOME
    FROM CONSULTA c
    INNER JOIN PACIENTE p ON c.ID_PACIENTE = p.ID
    INNER JOIN MEDICO m ON c.ID_MEDICO = m.ID
    ORDER BY c.DATA_CONSULTA, c.HORA_CONSULTA"
);
$query->execute();
$consultas = $query->fetchAll(PDO::FETCH_ASSOC);

$dompdf = new Dompdf();

$html = '
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Consultas</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h1 { font-size: 18px; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Listagem de Consultas Registradas</h1>
    <table>
        <thead>
            <tr>
                <th>Nome do Paciente</th>
                <th>Nome do Médico</th>
                <th>Data da Consulta</th>
                <th>Hora da Consulta</th>
            </tr>
        </thead>
        <tbody>';

foreach ($consultas as $consulta) {
    $html .= '<tr>
                <td>' . $consulta['PACIENTE_NOME'] . '</td>
                <td>' . $consulta['MEDICO_NOME'] . '</td>
                <td>' . $consulta['DATA_CONSULTA'] . '</td>
                <td>' . $consulta['HORA_CONSULTA'] . '</td>
              </tr>';
}

$html .= '
        </tbody>
    </table>
</body>
</html>';

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream('listagem_consultas.pdf', array("Attachment" => false));
?>