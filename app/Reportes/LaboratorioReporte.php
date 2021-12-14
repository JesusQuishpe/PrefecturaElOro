<?php

namespace App\Reportes;

use Carbon\Carbon;
use TCPDF;

class LaboratorioReporte extends TCPDF
{
    public function Header()
    {
        
        $image_file = asset('images/prefectura-logo.png');
        $this->Image($image_file, 10,10, 30, 25, 'PNG', '', 'T', true, 300, '', false, false, 0, false, false, false);
        $this->SetFont('helvetica', 'B', 13);
        $this->SetX(25);
        $this->Cell(0, 0, "CENTRO INTEGRAL  DE SALUD DEL GOBIERNO AUTÓNOMO", 0, 1, 'C', false);
        $this->SetX(25);
        $this->Cell(0, 0, "DESCENTRALIZADO PROVINCIAL DE  EL ORO", 0, 1, 'C', false);
        $this->Ln(1);
        $this->SetFont('helvetica', '', 12);
        $this->SetX(25);
        $this->Cell(0, 0, "Dirección: 9 de Mayo s/n entre 25 de Junio y Sucre", 0, 1, 'C', false);
        $this->SetX(25);
        $this->Cell(0, 0, "Teléfono: 07-2936055", 0, 1, 'C', false);
        
    }
    public function Body($datos, $idTipoExamen)
    {
        $this->AddPage();
        
        #-------------DATOS PERSONALES-----------------
        $this->Ln(18);
        $this->SetFont('helvetica', 'B', 13);
        $this->MultiCell(0, 0, 'Información general: ', 'B', 'L', false, 1);
        $this->SetFont('helvetica', '', 12);
        $this->Ln(3);
        $this->MultiCell(50, 0, 'Código: ', 0, 'J', false, 0);
        $this->MultiCell(50, 0, $datos->id_paciente, 0, 'L', false, 1);
        $this->MultiCell(50, 0, 'Nombres y apellidos:', 0, 'L', false, 0);
        $this->MultiCell(0, 0, $datos->paciente, 0, 'L', false, 1);

        $this->MultiCell(50, 0, 'Sexo:', 0, 'L', false, 0);
        $this->MultiCell(0, 0, $datos->sexo, 0, 'L', false, 1);
        $this->MultiCell(50, 0, 'Doctor:', 0, 'L', false, 0);
        $this->MultiCell(0, 0, $datos->doctor, 0, 'L', false, 1);
        $this->MultiCell(50, 0, 'Fecha:', 0, 'L', false, 0);
        $this->MultiCell(0, 0,Carbon::parse($datos->fecha)->format('d/m/y H:i'), 0, 'L', false, 1);
        //Carbon::parse($datos->fecha)->isoFormat('dddd\, D \d\e MMMM \d\e\l Y')
        #-------------TIPO DE EXAMEN-----------------
        $this->SetFont('helvetica', 'B', 13);
        $this->Ln(3);
        $this->Cell(0, 0, $datos->examen, 'B', 1, 'L', false);
        $this->SetFont('helvetica', '', 12);
        $this->Ln(3);
        $this->resultadosPorTipoDeExamen($idTipoExamen, $datos);
    }

    public function resultadosPorTipoDeExamen($idTipoExamen, $datos)
    {
        if ($idTipoExamen === 1)  $this->reporteBioquimica($datos);
        if ($idTipoExamen === 2)  $this->reporteCoprologia($datos);
        if ($idTipoExamen === 3)  $this->reporteCoproparasitario($datos);
        if ($idTipoExamen === 4)  $this->reporteExamenOrina($datos);
    }

    public function reporteBioquimica($datos)
    {
        $this->SetFont('helvetica', 'B', 12);

        $this->MultiCell(63.33, 0, 'RESULTADO ', 0, 'L', false, 0);
        $this->MultiCell(63.33, 0, '=VN= ', 0, 'C', false, 0);
        $this->MultiCell(63.33, 0, '=INMUNOLOGÍA= ', 0, 'L', false, 1);

        $this->Ln(2);
        $this->SetFont('helvetica', '', 12);

        $this->MultiCell(55, 0, 'Glucosa: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->glucosa, 0, 'L', false, 0);
        $this->MultiCell(35, 0, '75-115 mg%', 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'VDRL: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->vdrl, 0, 'L', false, 1);

        $this->MultiCell(55, 0, 'Urea: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->urea, 0, 'L', false, 0);
        $this->MultiCell(35, 0, '10-50 mg%', 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'Proteína C react: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->proteinas_c_react, 0, 'L', false, 1);

        $this->MultiCell(55, 0, 'Creatinina: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->creatinina, 0, 'L', false, 0);
        $this->MultiCell(35, 0, '0.4-1.1 mg%', 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'R.A Test (Latex): ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->ra_test_latex, 0, 'L', false, 1);

        $this->MultiCell(55, 0, 'Ácido úrico: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->acido_urico, 0, 'L', false, 0);
        $this->MultiCell(35, 0, '2.5-6 mg%', 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'A.S.T.O: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->asto, 0, 'L', false, 1);

        $this->MultiCell(55, 0, 'Colesterol total: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->colesterol_total, 0, 'L', false, 0);
        $this->MultiCell(35, 0, '150-200 mg%', 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'Salmonella O: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->salmonella_o, 0, 'L', false, 1);

        $this->MultiCell(55, 0, 'Colesterol hdl: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->colesterol_hdl, 0, 'L', false, 0);
        $this->MultiCell(35, 0, '55 mg%', 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'Salmonella h: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->salmonella_h, 0, 'L', false, 1);

        $this->MultiCell(55, 0, 'Colesterol ldl: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->colesterol_ldl, 0, 'L', false, 0);
        $this->MultiCell(35, 0, '140 mg%', 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'Paratifica A: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->paratifica_a, 0, 'L', false, 1);

        $this->MultiCell(55, 0, 'Trigliceridos: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->trigliceridos, 0, 'L', false, 0);
        $this->MultiCell(35, 0, '200 mg%', 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'Paratifica B: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->paratifica_b, 0, 'L', false, 1);
        
        $this->MultiCell(55, 0, 'Proteínas totales: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->proteinas_totales, 0, 'L', false, 0);
        $this->MultiCell(35, 0, '6-8 mg%', 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'Proteus O x 19: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->proteus_0x19, 0, 'L', false, 1);

        $this->MultiCell(55, 0, 'Albumina: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->albumina, 0, 'L', false, 0);
        $this->MultiCell(35, 0, '3.5-5.5 mg%', 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'Proteus O x 2: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->proteus_0x2, 0, 'L', false, 1);

        $this->MultiCell(55, 0, 'Globulina: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->globulina, 0, 'L', false, 0);
        $this->MultiCell(35, 0, '2.4 mg%', 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'Proteus O x K: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->proteus_0xk, 0, 'L', false, 1);

        $this->MultiCell(55, 0, 'Relación A/G: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->relacion_ag, 0, 'L', false, 0);
        $this->MultiCell(35, 0, '1.4-3', 0, 'L', false, 1);
        
        $this->MultiCell(55, 0, 'Bilirrubina directa: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->bilirrubina_directa, 0, 'L', false, 0);
        $this->MultiCell(35, 0, '0.25 mg%', 0, 'L', false, 1);

        $this->MultiCell(55, 0, 'Bilirrubina indirecta: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->bilirrubina_indirecta, 0, 'L', false, 0);
        $this->MultiCell(35, 0, '1 mg%', 0, 'L', false, 1);

        $this->MultiCell(55, 0, 'Bilirrubina total: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->bilirrubina_total, 0, 'L', false, 0);
        $this->MultiCell(35, 0, '1 mg%', 0, 'L', false, 1);

        $this->MultiCell(55, 0, 'Gamma glutamil transp: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->gamma_gt, 0, 'L', false, 0);
        $this->MultiCell(35, 0, '9-61 U/L', 0, 'L', false, 1);

        $this->MultiCell(55, 0, 'Calcio: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->calcio, 0, 'L', false, 0);
        $this->MultiCell(35, 0, '9-11 mg%', 0, 'L', false, 1);

        //Enzimas
        
        $this->MultiCell(55, 0, 'Transaminasa OX: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->transaminasa_ox, 0, 'L', false, 0);
        $this->MultiCell(35, 0, 'Hasta 31 U/L', 0, 'L', false, 1);

        $this->MultiCell(55, 0, 'Transaminasa PIR: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->transaminasa_pir, 0, 'L', false, 0);
        $this->MultiCell(35, 0, 'Hasta 37 U/L', 0, 'L', false, 1);

        $this->MultiCell(55, 0, 'Fosfatasa alcalina adultos: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->fosfatasa_alcalina_adultos, 0, 'L', false, 0);
        $this->MultiCell(35, 0, '68-240 U/L', 0, 'L', false, 1);
        
        $this->MultiCell(55, 0, 'Fosfatasa alcalina niños: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->fosfatasa_alcalina_ninos, 0, 'L', false, 0);
        $this->MultiCell(35, 0, '100-400 U/L', 0, 'L', false, 1);

        $this->MultiCell(55, 0, 'Amilasa: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->amilasa, 0, 'L', false, 0);
        $this->MultiCell(35, 0, 'Hasta 220 U/L', 0, 'L', false, 1);

        $this->MultiCell(55, 0, 'Lipasa: ', 0, 'L', false, 0);
        $this->MultiCell(25, 0, $datos->lipasa, 0, 'L', false, 0);
        $this->MultiCell(35, 0, '10-150 U/L', 0, 'L', false, 1);
    }

    public function reporteExamenOrina($datos)
    {
        $this->SetFont('helvetica', 'B', 12);
        $this->MultiCell(95, 0, 'FÍSICO QUÍMICO ', 0, 'L', false, 0);
        $this->MultiCell(95, 0, 'MICROSCOPIO ', 0, 'L', false, 1);
        $this->Ln(2);
        $this->SetFont('helvetica', '', 12);
        $this->MultiCell(50, 0, 'Color: ', 0, 'L', false, 0);
        $this->MultiCell(45, 0, $datos->color, 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'Hematies: ', 0, 'L', false, 0);
        $this->MultiCell(40, 0, $datos->hematies, 0, 'L', false, 1);

        $this->MultiCell(50, 0, 'Olor: ', 0, 'L', false, 0);
        $this->MultiCell(45, 0, $datos->olor, 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'Leucocitos: ', 0, 'L', false, 0);
        $this->MultiCell(40, 0, $datos->leucocitos, 0, 'L', false, 1);

        $this->MultiCell(50, 0, 'Sedimento: ', 0, 'L', false, 0);
        $this->MultiCell(45, 0, $datos->sedimento, 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'Cel. Epiteliales: ', 0, 'L', false, 0);
        $this->MultiCell(40, 0, $datos->cel_epiteliales, 0, 'L', false, 1);

        $this->MultiCell(50, 0, 'Ph: ', 0, 'L', false, 0);
        $this->MultiCell(45, 0, $datos->ph, 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'Fil. Mucosos: ', 0, 'L', false, 0);
        $this->MultiCell(40, 0, $datos->fil_mucosos, 0, 'L', false, 1);

        $this->MultiCell(50, 0, 'Densidad: ', 0, 'L', false, 0);
        $this->MultiCell(45, 0, $datos->densidad, 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'Bacterias: ', 0, 'L', false, 0);
        $this->MultiCell(40, 0, $datos->bacterias, 0, 'L', false, 1);

        $this->MultiCell(50, 0, 'Leucocituria: ', 0, 'L', false, 0);
        $this->MultiCell(45, 0, $datos->leucocituria, 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'Bacilos: ', 0, 'L', false, 0);
        $this->MultiCell(40, 0, $datos->bacilos, 0, 'L', false, 1);

        $this->MultiCell(50, 0, 'Nitritos: ', 0, 'L', false, 0);
        $this->MultiCell(45, 0, $datos->nitritos, 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'Cristales: ', 0, 'L', false, 0);
        $this->MultiCell(40, 0, $datos->cristales, 0, 'L', false, 1);

        $this->MultiCell(50, 0, 'Albumina: ', 0, 'L', false, 0);
        $this->MultiCell(45, 0, $datos->albumina, 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'Cilindros: ', 0, 'L', false, 0);
        $this->MultiCell(40, 0, $datos->cilindros, 0, 'L', false, 1);

        $this->MultiCell(50, 0, 'Glucosa: ', 0, 'L', false, 0);
        $this->MultiCell(45, 0, $datos->glucosa, 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'Piocitos: ', 0, 'L', false, 0);
        $this->MultiCell(40, 0, $datos->piocitos, 0, 'L', false, 1);

        $this->MultiCell(50, 0, 'Cetonas: ', 0, 'L', false, 0);
        $this->MultiCell(45, 0, $datos->cetonas, 0, 'L', false, 1);

        $this->MultiCell(50, 0, 'Urobilinogeno: ', 0, 'L', false, 0);
        $this->MultiCell(45, 0, $datos->urobilinogeno, 0, 'L', false, 1);

        $this->MultiCell(50, 0, 'Bilirrubina: ', 0, 'L', false, 0);
        $this->MultiCell(45, 0, $datos->bilirrubina, 0, 'L', false, 1);

        $this->MultiCell(50, 0, 'Sangre (Hem. Enteros): ', 0, 'L', false, 0);
        $this->MultiCell(45, 0, $datos->sangre_enteros, 0, 'L', false, 1);

        $this->MultiCell(50, 0, 'Sangre (H. Lisados): ', 0, 'L', false, 0);
        $this->MultiCell(45, 0, $datos->sangre_lisados, 0, 'L', false, 1);

        $this->MultiCell(50, 0, 'Ácido Ascorbico: ', 0, 'L', false, 0);
        $this->MultiCell(45, 0, $datos->acido_ascorbico, 0, 'L', false, 1);

        $this->Ln(2);
        $this->MultiCell(0, 0, '==OBSERVACIONES== ', 0, 'C', false, 1);
        $this->MultiCell(0, 0, $datos->observaciones, 0, 'L', false, 1);
    }
    public function reporteCoproparasitario($datos)
    {
        $this->SetFont('helvetica', 'B', 13);
        $this->Cell(0, 0, 'Resultados', '', 1, 'L', false);
        $this->Ln(2);
        $this->SetFont('helvetica', '', 12);
        $this->MultiCell(50, 0, 'Protozoarios: ', 0, 'L', false, 0);
        $this->MultiCell(0, 0, $datos->protozoarios, 0, 'L', false, 1);
        $this->MultiCell(50, 0, 'Ameba histolítica: ', 0, 'L', false, 0);
        $this->MultiCell(0, 0, $datos->ameba_histolitica, 0, 'L', false, 1);
        $this->MultiCell(50, 0, 'Ameba Coli: ', 0, 'L', false, 0);
        $this->MultiCell(0, 0, $datos->ameba_coli, 0, 'L', false, 1);
        $this->MultiCell(50, 0, 'Trichomona hominis: ', 0, 'L', false, 0);
        $this->MultiCell(0, 0, $datos->trichomona_hominis, 0, 'L', false, 1);
        $this->MultiCell(50, 0, 'Chilomastik mesnile: ', 0, 'L', false, 0);
        $this->MultiCell(0, 0, $datos->chilomastik_mesnile, 0, 'L', false, 1);
        $this->MultiCell(50, 0, 'Helmintos: ', 0, 'L', false, 0);
        $this->MultiCell(0, 0, $datos->helmintos, 0, 'L', false, 1);
        $this->MultiCell(50, 0, 'Trichuris trichura: ', 0, 'L', false, 0);
        $this->MultiCell(0, 0, $datos->trichuris_trichura, 0, 'L', false, 1);
        $this->MultiCell(50, 0, 'Ascaris lumbricoides: ', 0, 'L', false, 0);
        $this->MultiCell(0, 0, $datos->ascaris_lumbricoides, 0, 'L', false, 1);
        $this->MultiCell(50, 0, 'Strongyloides stercolarie: ', 0, 'L', false, 0);
        $this->MultiCell(0, 0, $datos->strongyloides_stercolarie, 0, 'L', false, 1);
        $this->MultiCell(50, 0, 'Oxiuros: ', 0, 'L', false, 0);
        $this->MultiCell(0, 0, $datos->oxiuros, 0, 'L', false, 1);
        $this->MultiCell(0, 0, '==OBSERVACIONES== ', 0, 'C', false, 0);
        $this->MultiCell(0, 0, $datos->observaciones, 0, 'L', false, 1);
    }

    public function reporteCoprologia($datos)
    {
        $this->SetX(95);
        $this->MultiCell(70, 0, '==INMUNOLOGÍA==', 0, 'C', false, 1);
        $this->Ln(2);
        $this->SetFillColor(200, 220, 255);
        $this->MultiCell(50, 0, 'Consistencia: ', 0, 'J', false, 0);
        $this->MultiCell(45, 0, $datos->consistencia, 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'Leufocitos: ', 0, 'J', false, 0);
        $this->MultiCell(40, 0, $datos->leucocitos, 0, 'L', false, 1);

        $this->MultiCell(50, 0, 'Moco: ', 0, 'J', false, 0);
        $this->MultiCell(45, 0, $datos->moco, 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'Polimorfonucleares: ', 0, 'J', false, 0);
        $this->MultiCell(45, 0, $datos->polimorfonucleares, 0, 'L', false, 1);

        $this->MultiCell(50, 0, 'Sangre: ', 0, 'J', false, 0);
        $this->MultiCell(45, 0, $datos->sangre, 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'Mononucleares: ', 0, 'J', false, 0);
        $this->MultiCell(45, 0, $datos->mononucleares, 0, 'L', false, 1);

        $this->MultiCell(50, 0, 'Ph: ', 0, 'J', false, 0);
        $this->MultiCell(45, 0, $datos->ph, 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'Protozoarios: ', 0, 'J', false, 0);
        $this->MultiCell(45, 0, $datos->protozoarios, 0, 'L', false, 1);

        $this->MultiCell(50, 0, 'Azúcares reductores: ', 0, 'J', false, 0);
        $this->MultiCell(45, 0, $datos->azucares_reductores, 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'Helmintos: ', 0, 'J', false, 0);
        $this->MultiCell(45, 0, $datos->helmintos, 0, 'L', false, 1);

        $this->MultiCell(50, 0, 'Levadura y Micelios: ', 0, 'L', false, 0);
        $this->MultiCell(45, 0, $datos->levadura_y_micelos, 0, 'L', false, 0);
        $this->MultiCell(50, 0, 'Esteatorrea: ', 0, 'J', false, 0);
        $this->MultiCell(45, 0, $datos->esteatorrea, 0, 'L', false, 1);

        $this->MultiCell(50, 0, 'Gram: ', 0, 'J', false, 0);
        $this->MultiCell(45, 0, $datos->gram, 0, 'L', false, 1);
        $this->Ln(2);
        $this->MultiCell(0, 0, '==OBSERVACIONES== ', 0, 'C', false, 1);
        $this->MultiCell(0, 0, $datos->observaciones, 0, 'L', false, 1);
    }

    public function Footer()
    {
        # code...
    }
}
