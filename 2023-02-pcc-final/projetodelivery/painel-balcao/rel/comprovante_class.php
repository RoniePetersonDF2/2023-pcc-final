<?php 

include('../../conexao.php');

//CARREGAR DOMPDF
require_once '../../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$id = $_GET['id'];

//ALIMENTAR OS DADOS NO RELATÓRIO
$path = "http://localhost/delivery//painel-balcao/rel/comprovante.php?id=".$id;

$html = (file_get_contents($path));

// http://localhost/delivery/painel-balcao/rel/comprovante.php?id=77

//INICIALIZAR A CLASSE DO DOMPDF
$pdf = new DOMPDF();

var_dump($pdf); exit;
//Definir o tamanho do papel e orientação da página
$pdf->set_paper(array(0, 0, 297.64, 700), 'portrait');

//CARREGAR O CONTEÚDO HTML
$pdf->load_html(utf8_decode($html));

//RENDERIZAR O PDF
$pdf->render();

//NOMEAR O PDF GERADO
$pdf->stream(
'comprovante.pdf',
array("Attachment" => false)
);


