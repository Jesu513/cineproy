<?php
require('D:/fpdf186/fpdf.php');

class PDF_Estudios extends FPDF
{
    private $colWidths = [15, 90, 70, 20]; // Anchos de columna ajustados

    function Header()
    {
        $logoUrl = "https://3.bp.blogspot.com/-2cqbbywJsRw/WSydJUoblPI/AAAAAAAAJm4/WKCYvAaA89Q1W0oFATHewFcT3Mi5gybOwCLcB/s1600/cineplanet.jpg";
        $logoData = file_get_contents($logoUrl);
        $logoPath = 'logo_temp.jpg';
        file_put_contents($logoPath, $logoData);

        $this->Image($logoPath, 10, 6, 30);
        $this->SetFont('Arial', 'B', 16); // Usar Arial en negrita
        $this->Cell(0, 10, utf8_decode('Reporte de Estudios'), 0, 1, 'C');
        $this->SetFont('Arial', 'I', 10);
        $this->Cell(0, 10, 'Generado el: ' . date('d/m/Y H:i'), 0, 1, 'C');
        $this->Ln(5);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 5, utf8_decode('Jesus Alberto Quispe Quenta'), 0, 1, 'C');
        $this->Cell(0, 5, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function TablaEstudios()
    {
        $this->SetFillColor(255, 223, 56); // Color amarillo claro
        $this->SetFont('Arial', 'B', 10); // Usar Arial en negrita para los encabezados

        // Encabezados
        $this->Cell($this->colWidths[0], 7, 'ID', 1, 0, 'C', true);
        $this->Cell($this->colWidths[1], 7, 'Estudio', 1, 0, 'C', true);
        $this->Cell($this->colWidths[2], 7, utf8_decode('Dirección'), 1, 0, 'C', true);
        $this->Cell($this->colWidths[3], 7, 'Total', 1, 1, 'C', true);

        try {
            $miPDO = new PDO("mysql:host=127.0.0.1;dbname=cine_db", 'root', '');
            $miPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $consulta = "SELECT e.ID_Estudio, e.Nombre AS estudio, e.Direccion, 
                        COUNT(p.ID_Pelicula) AS total_peliculas,
                        GROUP_CONCAT(p.Nombre ORDER BY p.Anio DESC SEPARATOR ', ') AS peliculas
                        FROM ESTUDIO e
                        LEFT JOIN PELICULA p ON e.ID_Estudio = p.ID_Estudio
                        GROUP BY e.ID_Estudio, e.Nombre, e.Direccion
                        ORDER BY e.Nombre";

            $miConsulta = $miPDO->query($consulta);

            $this->SetFont('Arial', '', 9); // Usar Arial normal para el contenido
            $fill = false;

            foreach($miConsulta as $row) {
                if($this->GetY() > 250) {
                    $this->AddPage();
                    // Redibujar encabezados
                    $this->SetFont('Arial', 'B', 10);
                    $this->Cell($this->colWidths[0], 7, 'ID', 1, 0, 'C', true);
                    $this->Cell($this->colWidths[1], 7, 'Estudio', 1, 0, 'C', true);
                    $this->Cell($this->colWidths[2], 7, utf8_decode('Dirección'), 1, 0, 'C', true);
                    $this->Cell($this->colWidths[3], 7, 'Total', 1, 1, 'C', true);
                    $this->SetFont('Arial', '', 9);
                }

                $this->SetFillColor($fill ? 255 : 230, $fill ? 255 : 230, 150); // Alternar colores
                $this->Cell($this->colWidths[0], 6, $row['ID_Estudio'], 'LR', 0, 'C', $fill);
                $this->Cell($this->colWidths[1], 6, utf8_decode($row['estudio']), 'LR', 0, 'L', $fill);
                $this->Cell($this->colWidths[2], 6, utf8_decode($row['Direccion']), 'LR', 0, 'L', $fill);
                $this->Cell($this->colWidths[3], 6, $row['total_peliculas'], 'LR', 1, 'C', $fill);

                if($this->GetY() + 6 < 250) {
                    $this->SetFont('Arial', 'I', 8); // Usar cursiva para la lista de películas
                    $this->Cell($this->colWidths[0], 6, '', 'LR', 0, 'C', $fill);
                    $this->Cell(array_sum(array_slice($this->colWidths, 1)), 6, 
                                utf8_decode('Películas: ' . $row['peliculas']), 'LR', 1, 'L', $fill);
                    $this->SetFont('Arial', '', 9); // Volver al tamaño normal
                }

                $fill = !$fill;
            }

            $this->Cell(array_sum($this->colWidths), 0, '', 'T');

        } catch(PDOException $e) {
            $this->SetFont('Arial', 'B', 10);
            $this->SetTextColor(255, 0, 0);
            $this->Cell(0, 10, 'Error: '.$e->getMessage(), 0, 1);
        }
    }
}

$pdf = new PDF_Estudios();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->TablaEstudios();
$pdf->Output('reporte_estudios_corregido.pdf', 'I');
?>
