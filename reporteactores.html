<?php
require('D:/fpdf186/fpdf.php');

class PDF_Actores extends FPDF
{
    private $colWidths = [15, 35, 40, 100];

    function Header()
    {
        $logoUrl = "https://www.vemac.com.mx/wp-content/uploads/2016/08/clientes_55_vemac.jpg";
        $logoData = file_get_contents($logoUrl);
        $logoPath = 'logo_temp.jpg';
        file_put_contents($logoPath, $logoData);

        // Logo
        $this->Image($logoPath, 10, 8, 25);
        // Título
        $this->SetFont('Arial', 'B', 16);
        $this->SetXY(40, 10);
        $this->Cell(130, 10, utf8_decode('Reporte de Actores'), 0, 1, 'C');
        // Fecha
        $this->SetFont('Arial', '', 10);
        $this->SetXY(40, 18);
        $this->Cell(130, 10, 'Generado el: ' . date('d/m/Y H:i'), 0, 1, 'C');
        $this->Ln(5);

        // Línea decorativa
        $this->SetDrawColor(0, 70, 130);
        $this->SetLineWidth(0.8);
        $this->Line(10, 30, 200, 30);

        unlink($logoPath);
    }

    function Footer()
    {
        $this->SetY(-20);
        $this->SetFont('Arial', 'I', 9);
        $this->SetTextColor(100, 100, 100);
        $this->Cell(0, 5, utf8_decode('Jesus Alberto Quispe Quenta'), 0, 1, 'C');
        $this->Cell(0, 5, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function TablaActores()
    {
        $this->Ln(5);
        $this->SetFont('Arial', 'B', 10);
        $this->SetFillColor(0, 70, 130);
        $this->SetTextColor(255);

        $this->Cell($this->colWidths[0], 8, 'ID', 1, 0, 'C', true);
        $this->Cell($this->colWidths[1], 8, 'Nombre', 1, 0, 'C', true);
        $this->Cell($this->colWidths[2], 8, utf8_decode('Apellido'), 1, 0, 'C', true);
        $this->Cell($this->colWidths[3], 8, utf8_decode('Películas'), 1, 1, 'C', true);

        try {
            $miPDO = new PDO("mysql:host=127.0.0.1;dbname=cine_db", 'root', '');
            $miPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $consulta = "SELECT a.ID_Actor, a.Nombre, a.Apellido, 
                        GROUP_CONCAT(p.Nombre ORDER BY p.Nombre SEPARATOR ', ') AS peliculas
                        FROM ACTOR a
                        LEFT JOIN (
                            SELECT ID_Actor1 AS ID_Actor, Nombre FROM PELICULA
                            UNION ALL
                            SELECT ID_Actor2 AS ID_Actor, Nombre FROM PELICULA
                        ) p ON a.ID_Actor = p.ID_Actor
                        GROUP BY a.ID_Actor, a.Nombre, a.Apellido
                        ORDER BY a.Apellido, a.Nombre";

            $miConsulta = $miPDO->query($consulta);

            $this->SetFont('Arial', '', 9);
            $this->SetTextColor(0);
            $fill = false;

            foreach ($miConsulta as $row) {
                $peliculas = utf8_decode($row['peliculas']);
                $textWidth = $this->GetStringWidth($peliculas);
                $lines = ceil($textWidth / $this->colWidths[3]);
                $rowHeight = max(6, $lines * 5);

                if ($this->GetY() + $rowHeight > 260) {
                    $this->AddPage();
                    $this->SetFont('Arial', 'B', 10);
                    $this->SetFillColor(0, 70, 130);
                    $this->SetTextColor(255);
                    $this->Cell($this->colWidths[0], 8, 'ID', 1, 0, 'C', true);
                    $this->Cell($this->colWidths[1], 8, 'Nombre', 1, 0, 'C', true);
                    $this->Cell($this->colWidths[2], 8, utf8_decode('Apellido'), 1, 0, 'C', true);
                    $this->Cell($this->colWidths[3], 8, utf8_decode('Películas'), 1, 1, 'C', true);
                    $this->SetFont('Arial', '', 9);
                    $this->SetTextColor(0);
                }

                $this->SetFillColor($fill ? 240 : 255);
                $x = $this->GetX();
                $y = $this->GetY();

                $this->Cell($this->colWidths[0], $rowHeight, $row['ID_Actor'], 1, 0, 'C', $fill);
                $this->Cell($this->colWidths[1], $rowHeight, utf8_decode($row['Nombre']), 1, 0, 'L', $fill);
                $this->Cell($this->colWidths[2], $rowHeight, utf8_decode($row['Apellido']), 1, 0, 'L', $fill);

                $this->SetXY($x + $this->colWidths[0] + $this->colWidths[1] + $this->colWidths[2], $y);
                $this->MultiCell($this->colWidths[3], 5, $peliculas, 1, 'L', $fill);

                $fill = !$fill;
            }

        } catch (PDOException $e) {
            $this->SetFont('Arial', 'B', 10);
            $this->SetTextColor(255, 0, 0);
            $this->Cell(0, 10, 'Error: ' . $e->getMessage(), 0, 1);
        }
    }
}

$pdf = new PDF_Actores('P');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->TablaActores();
$pdf->Output('reporte_actores.pdf', 'I');
?>

