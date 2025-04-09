<?php
require('D:/fpdf186/fpdf.php');

class PDF_Peliculas_Columnas extends FPDF
{
    private $col = 0; // Columna actual (0 o 1)
    private $colWidth = 130;
    private $colMargin = 10;
    private $colSpacing = 10;
    private $rowHeight = 8;
    private $yStart = 50; // Punto inicial del contenido
    private $colWidths = [15, 80, 25]; // ID, Película, Año

    function Header()
    {
        $logoPath = 'logo_temp.jpg';
        $url = "https://www.thewrap.com/wp-content/uploads/2017/12/CinemarkLogo.jpg";
        if (!file_exists($logoPath)) {
            file_put_contents($logoPath, file_get_contents($url));
        }

        $this->Image($logoPath, 10, 6, 25);
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, utf8_decode('Reporte Básico de Películas'), 0, 1, 'C');
        $this->SetFont('Arial', 'I', 10);
        $this->Cell(0, 10, 'Generado el: ' . date('d/m/Y H:i'), 0, 1, 'C');
        $this->Ln(5);
    }

    function Footer()
    {
        $this->SetY(-20);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 5, utf8_decode('Jesus Alberto Quispe Quenta'), 0, 1, 'C');
        $this->Cell(0, 5, 'Página ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function SetCol($col)
    {
        $this->col = $col;
        $x = $this->colMargin + $col * ($this->colWidth + $this->colSpacing);
        $this->SetLeftMargin($x);
        $this->SetX($x);
    }

    function TablaPeliculasColumnas()
    {
        try {
            $pdo = new PDO("mysql:host=127.0.0.1;dbname=cine_db", 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = "SELECT ID_Pelicula, Nombre, Anio FROM PELICULA ORDER BY Anio DESC, Nombre";
            $resultado = $pdo->query($consulta);

            $datos = $resultado->fetchAll();
            $total = count($datos);

            $this->SetFont('Arial', '', 10);
            $this->SetFillColor(245, 245, 245);
            $this->SetTextColor(0);
            $this->SetDrawColor(200, 200, 200);

            $maxPorColumna = floor((270 - $this->yStart) / $this->rowHeight);
            $columnaActual = 0;
            $contador = 0;

            $this->SetY($this->yStart);
            $this->SetCol(0);
            $this->EncabezadoColumna();

            foreach ($datos as $row) {
                if ($contador >= $maxPorColumna) {
                    $columnaActual++;
                    if ($columnaActual >= 2) {
                        $this->AddPage();
                        $columnaActual = 0;
                    }

                    $this->SetY($this->yStart);
                    $this->SetCol($columnaActual);
                    $this->EncabezadoColumna();
                    $contador = 0;
                }

                $this->Cell($this->colWidths[0], $this->rowHeight, $row['ID_Pelicula'], 'LR', 0, 'C', true);
                $this->Cell($this->colWidths[1], $this->rowHeight, utf8_decode($row['Nombre']), 'LR', 0, 'L', true);
                $this->Cell($this->colWidths[2], $this->rowHeight, $row['Anio'], 'LR', 1, 'C', true);

                $contador++;
            }

            // Línea final
            $this->Cell($this->colWidth, 0, '', 'T');
        } catch (PDOException $e) {
            $this->SetFont('Arial', 'B', 10);
            $this->SetTextColor(255, 0, 0);
            $this->Cell(0, 10, 'Error: '.$e->getMessage(), 0, 1);
        }
    }

    function EncabezadoColumna()
    {
        $this->SetFont('Arial', 'B', 10);
        $this->SetFillColor(53, 85, 107);
        $this->SetTextColor(255);

        $headers = ['ID', utf8_decode('Película'), utf8_decode('Año')];
        for ($i = 0; $i < count($headers); $i++) {
            $this->Cell($this->colWidths[$i], $this->rowHeight, $headers[$i], 1, 0, 'C', true);
        }
        $this->Ln();
        $this->SetFont('Arial', '', 10);
        $this->SetTextColor(0);
    }
}

$pdf = new PDF_Peliculas_Columnas('P', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->TablaPeliculasColumnas();
$pdf->Output('reporte_peliculas_columnas.pdf', 'I');
?>
