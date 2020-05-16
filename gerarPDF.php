<?php

include './fpdf/fpdf.php';
include './conexao.php';

$pessoas = selectAllPessoa();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10,utf8_decode('Relatório de cadastros'),0,0,"C");
$pdf->Ln(15);

$pdf->SetFont("Arial","I",10);
$pdf->Cell(50,7,"Nome",1,0,"C");
$pdf->Cell(40,7,"Data de Nasc.",1,0,"C");
$pdf->Cell(40,7,"Telefone",1,0,"C");
$pdf->Cell(60,7,  utf8_decode("Endereço"),1,0,"C");
$pdf->Ln();

foreach ($pessoas as $pessoa){
    $pdf->Cell(50,7,utf8_decode($pessoa["nome"]),1,0,"C");
    $pdf->Cell(40,7,  formatoData($pessoa["nascimento"]),1,0,"C");
    $pdf->Cell(40,7,$pessoa["telefone"],1,0,"C");
    $pdf->Cell(60,7,  utf8_decode($pessoa["endereco"]),1,0,"C");
    $pdf->Ln();
}

$pdf->Output();
