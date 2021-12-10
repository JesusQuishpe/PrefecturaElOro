<?php
namespace App\Reportes;

use Illuminate\Support\Facades\Storage;
use TCPDF;

class HistorialReporte extends TCPDF{
    public function Header()
    {
        $image_file = public_path('images/png/prefectura-logo.png');
        $this->Image($image_file, 10, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        //$this->SetFillColor(117,164,120);
        $this->SetFillColor(200, 220, 255);
        $this->Cell(0, 15, 'HISTORIAL DEL PACIENTE', 0, false, 'C', true, '', 0, false, 'M', 'M');
    }

    public function InformacionPersonal($informacion)
    {
        $this->AddPage();
        $this->SetFillColor(200, 220, 255);
        #------------------DATOS PERSONALES------------------
        $this->Cell(0, 0, "1. INFORMACION PERSONAL", 0, 1, '', true);
        $this->MultiCell(50, 0, 'Nombres y apellidos: ', 0, 'J', false, 0);
        $this->MultiCell(0, 0, $informacion->nombres . ' ' . $informacion->apellidos, 0, 'L');
        $this->MultiCell(50, 0, 'Fecha de nacimiento: ', 0, 'J', false, 0);
        $this->MultiCell(30, 0, $informacion->nacimiento, 0, 'L', false, 0);
        //$this->MultiCell(15, 0, 'Edad: ', 0, 'J', false, 0);
       // $this->MultiCell(20, 0, '22 años', 0, 'L', false, 0);
        $this->MultiCell(15, 0, 'Sexo: ', 0, 'J', false, 0);
        $this->MultiCell(25, 0, $informacion->sexo, 0, 'L', false, 1);
        $this->MultiCell(20, 0, 'Celular: ', 0, 'J', false, 0);
        $this->MultiCell(30, 0, $informacion->telefono, 0, 'L', false, 0);
        $this->MultiCell(22, 0, 'Provincia: ', 0, 'J', false, 0);
        $this->MultiCell(43, 0, $informacion->provincias, 0, 'L', false, 0);
        $this->MultiCell(20, 0, 'Ciudad: ', 0, 'J', false, 0);
        $this->MultiCell(0, 0, $informacion->ciudad, 0, 'L', false, 1);
        #------------------MOTIVO DE LA CONSULTA------------------
        $this->Cell(0, 0, "2. MOTIVO DE LA CONSULTA", 0, 1, '', true);
        $this->MultiCell(0, 0, $informacion->motivoConsulta, 0, 'L', false, 1);
        #------------------ENFERMEDAD O PROBLEMA ACTUAL------------------
        $this->Cell(0, 0, "3. ENFERMEDAD O PROBLEMA ACTUAL", 0, 1, '', true);
        $this->MultiCell(0, 0, $informacion->enfermedadProblema, 0, 'L', false, 1);
    }
    public function Antecedentes($antecedentesOpciones,$detalles,$descripcion)
    {
        $this->Cell(0, 0, "4. ANTECEDENTES PERSONALES Y FAMILIARES", 0, 1, '', true);
        $this->Ln(2);
        $this->Cell(0, 0, "Antecendentes:", 0, 1, '', false);
        $this->Ln(2);
        $checkPositionX = $this->GetX();
        $checkPositionY = $this->GetY();
        for ($i = 0; $i < count($antecedentesOpciones); $i++) {
            if ($i % 4 == 0 && $i > 0) {
                $this->Ln();
                $checkPositionX = $this->GetX();
                $checkPositionY += 5;
            }
            $this->MultiCell(42.5, 0, $antecedentesOpciones[$i]->nombre, 0, 'L', false, 0, $checkPositionX, $checkPositionY);
            $encontrado = false;
            for ($y = 0; $y < count($detalles); $y++) {
                $det = $detalles[$y];
                if ($det->nombre === $antecedentesOpciones[$i]->nombre) {
                    $encontrado = true;
                    break;
                }
            }
            if ($encontrado) {
                $this->writeHTMLCell(5.5, 5.5, $this->GetX(), $checkPositionY + 1, '<img src="images/png/checked_checkbox.png" />');
            } else {
                $this->writeHTMLCell(5.5, 5.5, $this->GetX(), $checkPositionY + 1, '<img src="images/png/unchecked_checkbox.png" />');
            }
            $checkPositionX += 47.5;
        }
        $this->Ln(7);
        $this->Cell(0, 0, "Descripción:", 0, 1, '', false);
        $this->Ln(2);
        $this->MultiCell(0, 0, $descripcion, 0, 'L', false, 1);
        $this->Ln();
    }
    public function ExamenEstomatognatico($patologiasOpciones,$detalles,$descripcion)
    {
        $this->Cell(0, 0, "5. EXAMEN DEL SISTEMA ESTOMATOGNÁTICO", 0, 1, '', true);
        $checkPositionX = $this->GetX();
        $checkPositionY = $this->GetY();
        for ($i = 0; $i < count($patologiasOpciones); $i++) {
            if ($i % 4 == 0 && $i > 0) {
                $this->Ln();
                $checkPositionX = $this->GetX();
                $checkPositionY += 5;
            }
            $this->MultiCell(42.5, 0, $patologiasOpciones[$i]->nombre, 0, 'L', false, 0, $checkPositionX, $checkPositionY);
            $encontrado = false;
            for ($y = 0; $y < count($detalles); $y++) {
                $det = $detalles[$y];
                if ($det->nombre === $patologiasOpciones[$i]->nombre) {
                    $encontrado = true;
                    break;
                }
            }
            if ($encontrado) {
                $this->writeHTMLCell(5.5, 5.5, $this->GetX(), $checkPositionY + 1, '<img src="images/png/checked_checkbox.png" />');
            } else {
                $this->writeHTMLCell(5.5, 5.5, $this->GetX(), $checkPositionY + 1, '<img src="images/png/unchecked_checkbox.png" />');
            }
            $checkPositionX += 47.5;
        }
        $this->Ln(7);
        $this->Cell(0, 0, "Descripción:", 0, 1, '', false);
        $this->Ln(2);
        $this->MultiCell(0, 0, $descripcion, 0, 'L', false, 1);
        $this->Ln();
    }
    public function Odontograma($odontogramaImage)
    {
        $this->Cell(0, 0, "6. ODONTOGRAMA", 0, 1, '', true);
        //$imagen=file_get_contents(public_path('images/png/checked.png'));
        
        /*$img_base64_encoded = $odontogramaImage;
        $imgDecoded=base64_decode(preg_replace('#^data:image/[^;]+;base64,#', '', $img_base64_encoded));
        file_put_contents(public_path('images/png/odontograma.jpeg'),base64_decode(substr($img_base64_encoded, strpos($img_base64_encoded, ",")+1)));*/
        //base64_decode(substr($img_base64_encoded, strpos($img_base64_encoded, ",")+1));
        //base64_decode(preg_replace('#^data:image/[^;]+;base64,#', '', $img_base64_encoded));
        // $img = '<img src="@'.$imgDecoded. '" width="100px" height="100px">';
        //$this->writeHTML($img, true, false, true, false, '');
        
        $path =$odontogramaImage;
        $full_path = Storage::path($path);
        //storage_path('app/'.$data['odontograma']['odontogramaImage'])
        $this->Image($full_path,$this->GetX(),$this->GetY(),190,100,'','','',false,400);
    }
    public function IndicadoresDeSaludBucal($general,$detalles)
    {
        $this->AddPage();
        $this->setPageOrientation('P');

        $this->Cell(0, 0, "7. INDICADORES DE SALUD BUCAL", 0, 1, '', true);
        $options1 = ['Leve', 'Moderada', 'Severa'];
        $options2 = ['Angle I', 'Angle II', 'Angle III'];
        //Enfermedad periodontal
        $this->Cell(0, 0, "a. Enfermedad periodontal:", 0, 1, '', false);
        //$div="<div>";
        foreach ($options1 as $value) {
            if ($value === $general->enfPeriod) {
                //$div.="<span style='background-color: #FFFF00'>$value<span>";
                $this->SetFillColor(255, 255, 0);
                $this->Cell(25, 0, $value, 0, 0, 'C', true);
            } else {
                //$div.="<span style='background-color:#c0ffc8;'>$value<span>";
                $this->Cell(25, 0, $value, 0, 0, 'C', false);
            }
        }
        $this->Ln();
        $this->Cell(0, 0, "b. Mal oclusión:", 0, 1, '', false);
        foreach ($options2 as $value) {
            if ($value === $general->malOclu) {
                //$div.="<span style='background-color: #FFFF00'>$value<span>";
                $this->SetFillColor(255, 255, 0);
                $this->Cell(25, 0, $value, 0, 0, 'C', true);
            } else {
                //$div.="<span style='background-color:#c0ffc8;'>$value<span>";
                $this->Cell(25, 0, $value, 0, 0, 'C', false);
            }
        }
        $this->Ln();
        $this->Cell(0, 0, "c. Fluorosis:", 0, 1, '', false);
        foreach ($options1 as $value) {
            if ($value === $general->fluorosis) {
                //$div.="<span style='background-color: #FFFF00'>$value<span>";
                $this->SetFillColor(255, 255, 0);
                $this->Cell(25, 0, $value, 0, 0, 'C', true);
            } else {
                //$div.="<span style='background-color:#c0ffc8;'>$value<span>";
                $this->Cell(25, 0, $value, 0, 0, 'C', false);
            }
        }
        $this->Ln();
        $this->SetFillColor(200, 220, 255);
        $this->Ln();
        $this->crearTable($general,$detalles, 35);
    }
    private function crearTable($general,$detalles, $moveTo)
    {
        $this->SetX($moveTo);
        //----------------Header--------------------
        $tbHeader = array('Piezas dentales', 'Placa', 'Cálculo', 'Gingivitis');
        $widthHeaders = array(50, 30, 30, 30);
        for ($i = 0; $i < count($tbHeader); $i++) {
            $this->Cell($widthHeaders[$i], 7, $tbHeader[$i], 'LTBR', 0, 'C', 1);
        }
        $this->Ln();
        $this->SetX($moveTo);
        //----------------Body---------------------

        $yini = $this->GetY();
        $y = $yini;
        for ($i = 0; $i < count($detalles); $i++) {

            $detalle = $detalles[$i];
            //Primera fila
            if ($i == 0) {
                $this->createRow('16', '17', '55', $detalle, $widthHeaders, $y, 'LB', $moveTo);
                $y = $this->GetY();
                //$this->GetX()=$this->GetX();
            }
            if ($i == 1) {
                $this->createRow('11', '21', '51', $detalle, $widthHeaders, $y, 'LB', $moveTo);
                $y = $this->GetY();
                //$this->GetX()=$this->GetX();
            }
            if ($i == 2) {
                $this->createRow('26', '27', '65', $detalle, $widthHeaders, $y, 'LB', $moveTo);
                $y = $this->GetY();
                //$this->GetX()=$this->GetX();
            }
            if ($i == 3) {
                $this->createRow('36', '37', '75', $detalle, $widthHeaders, $y, 'LB', $moveTo);
                $y = $this->GetY();
                //$this->GetX()=$this->GetX();
            }
            if ($i == 4) {
                $this->createRow('31', '41', '71', $detalle, $widthHeaders, $y, 'LB', $moveTo);
                $y = $this->GetY();
                //$this->GetX()=$this->GetX();
            }
            if ($i == 5) {
                $this->createRow('46', '47', '85', $detalle, $widthHeaders, $y, 'LB', $moveTo);
                $y = $this->GetY();
                //$this->GetX()=$this->GetX();
            }
        }
        $this->SetX($moveTo);
        //----------------Footer--------------------
        $this->Cell($widthHeaders[0], 6, 'Totales', 'LBR', 0, 'C', 1);
        $this->Cell($widthHeaders[1], 6, $general->totalPlaca, 'LB', 0, 'C', 1);
        $this->Cell($widthHeaders[2], 6, $general->totalCalc, 'LB', 0, 'C', 1);
        $this->Cell($widthHeaders[3], 6, $general->totalGin, 'LBR', 0, 'C', 1);
    }
    private function createRow($num1, $num2, $num3, $detalle, $widthHeaders, $y, $border, $moveTo)
    {
        //--------------Primera celda-----------------
        $this->SetX($moveTo);
        $this->MultiCell($widthHeaders[0], 6, '', $border, '', false, 0, $this->GetX(), $y); //para efecto de primera celda
        $this->SetX($this->GetX() - $widthHeaders[0]);

        //Primer item con check
        $this->MultiCell(8, 6, $num1, 0, '', false, 0, $this->GetX(), $y);
        if ($detalle->numPieza1) {
            $this->writeHTMLCell(5.5, 5.5, $this->GetX(), $y + 1, '<img src="images/png/checked_checkbox.png" />');
        } else {
            $this->writeHTMLCell(5.5, 5.5, $this->GetX(), $y + 1, '<img src="images/png/unchecked_checkbox.png" />');
        }


        //Segundo item con check
        $this->MultiCell(8, 6, $num2, 0, '', false, 0, $this->GetX(), $y);
        if ($detalle->numPieza2) {
            $this->writeHTMLCell(5.5, 5.5, $this->GetX(), $y + 1, '<img src="images/png/checked_checkbox.png" />');
        } else {
            $this->writeHTMLCell(5.5, 5.5, $this->GetX(), $y + 1, '<img src="images/png/unchecked_checkbox.png" />');
        }


        //Tercer item con check
        $this->MultiCell(8, 6, $num3, 0, '', false, 0, $this->GetX(), $y);
        if ($detalle->numPieza3) {
            $this->writeHTMLCell(5.5, 5.5, $this->GetX(), $y + 1, '<img src="images/png/checked_checkbox.png" />');
        } else {
            $this->writeHTMLCell(5.5, 5.5, $this->GetX(), $y + 1, '<img src="images/png/unchecked_checkbox.png" />');
        }


        $this->SetX($this->GetX() + ($moveTo - $this->GetX()));
        //------------------------Segunda Celda--------------
        $this->SetX($this->GetX() + $widthHeaders[0]); //Se desplaza a la segunda celda
        $this->MultiCell($widthHeaders[1], 6, $detalle->numPlaca, $border, 'C', false, 0, $this->GetX(), $y);
        $this->MultiCell($widthHeaders[2], 6, $detalle->numCalc, $border, 'C', false, 0, $this->GetX(), $y);
        $this->MultiCell($widthHeaders[3], 6, $detalle->numGin, $border . 'R', 'C', false, 0, $this->GetX(), $y);

        $this->Ln();
        $y = $this->GetY();
        
    }
    
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        //$this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Pág '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
}