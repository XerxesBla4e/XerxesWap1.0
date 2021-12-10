<?php
require 'fpdf.php';
$db = new PDO('mysql:host=localhost;dbname=mydb','root','xerxescodes');

class myPDF extends FPDF{
    function header(){
       //$this->Image('logo.png',10,6);
       $this->SetFont('Arial','B',14);
       $this->Cell(276,10,'MOVIE DOCUMENT',0.0,'C');
       $this->Ln();
       $this->setFont('Times','',12);
       $this->Cell(276,10,'movies',0,0,'C');
       $this->Ln(20);
    }

    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
    }

    function headerTable(){
        $this->SetFont('Times','B',12);
        $this->Cell(20,10,'ID',1,0,'C');
        $this->Cell(40,10,'NAME',1,0,'C');
        $this->Cell(40,10,'DESCRIPTION',1,0,'C');
        $this->Cell(60,10,'RUNTIME',1,0,'C');
        $this->Cell(36,10,'RELEASEYEAR',1,0,'C');
        $this->Ln();
    }

    function viewTable($db){
      $this->SetFont('Times','',12);
      $stmt = $db->query('SELECT * FROM movies');
      while($data = $stmt->fetch(PDO::FETCH_OBJ)){
        $this->Cell(20,10,$data->id,1,0,'C');
        $this->Cell(40,10,$data->title,1,0,'C');
        $this->Cell(40,10,$data->description,1,0,'C');
        $this->Cell(60,10,$data->runtme,1,0,'C');
        $this->Cell(36,10,$data->year,1,0,'C');
        $this->Ln();
      }
    }
}

$pdf = new myPDF();
$pdf -> AliasNbPages();
$pdf -> AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf -> Output();



?>