<?php
require('D:/fpdf186/fpdf.php');

class PDF extends FPDF
{
    private $widths;

    function Header()
    {
        $logoUrl = "https://www.thewrap.com/wp-content/uploads/2017/12/CinemarkLogo.jpg";
        $imgTemp = "logo_temp.jpg";

        if (!file_exists($imgTemp)) {
            file_put_contents($imgTemp, file_get_contents($logoUrl));
        }

        $this->Image($imgTemp, 10, 6, 20);
        $this->SetFont('Arial', 'B', 16);
        $this->SetTextColor(33, 37, 41);
        $this->Cell(0, 10, utf8_decode('Reporte General de Películas'), 0, 1, 'C');

        $this->SetFont('Arial', '', 10);
        $this->SetTextColor(100);
        $this->Cell(0, 10, 'Generado el: ' . date('d/m/Y H:i'), 0, 1, 'C');

        $this->SetDrawColor(220, 220, 220);
        $this->SetLineWidth(0.4);
        $this->Line(10, $this->GetY(), 287, $this->GetY());
        $this->Ln(5);
    }

    function Footer()
    {
        $this->SetY(-20);
        $this->SetFont('Arial', 'I', 8);
        $this->SetTextColor(120);
        $this->Cell(0, 5, utf8_decode('Jesus Alberto Quispe Quenta'), 0, 1, 'C');
        $this->Cell(0, 5, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function TablaPeliculas()
    {
        $this->widths = [15, 60, 20, 55, 100];
        $headers = ['ID', utf8_decode('Película'), utf8_decode('Año'), 'Estudio', 'Actores'];

        // Encabezado con fondo suave
        $this->SetFillColor(230, 240, 255); // Azul muy suave
        $this->SetTextColor(40);
        $this->SetFont('Arial', 'B', 11);

        foreach ($headers as $i => $header) {
            $this->Cell($this->widths[$i], 8, $header, 0, 0, 'C', true);
        }
        $this->Ln();

        try {
            $pdo = new PDO("mysql:host=127.0.0.1;dbname=cine_db", 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $consulta = "SELECT p.ID_Pelicula, p.Nombre, p.Anio, e.Nombre AS estudio, 
                        CONCAT(a1.Nombre, ' ', a1.Apellido, ' / ', a2.Nombre, ' ', a2.Apellido) AS actores
                        FROM PELICULA p
                        JOIN ESTUDIO e ON p.ID_Estudio = e.ID_Estudio
                        JOIN ACTOR a1 ON p.ID_Actor1 = a1.ID_Actor
                        JOIN ACTOR a2 ON p.ID_Actor2 = a2.ID_Actor
                        ORDER BY p.Anio DESC";

            $resultado = $pdo->query($consulta);
            $this->SetFont('Arial', '', 10);
            $this->SetTextColor(33);

            $fill = false;

            foreach ($resultado as $row) {
                $nombre = str_replace(
                    ['Marçon', 'Moy Potter', 'Forest Camp', 'Jrassic Park', 'San Marsa Epispicio IV', 'Cain y Furioso'],
                    ['Matrix', 'Harry Potter', 'Forrest Gump', 'Jurassic Park', 'Star Wars: Episodio IV', 'Rápido y Furioso'],
                    $row['Nombre']
                );

                if ($this->GetY() > 190) {
                    $this->AddPage();
                    $this->SetFillColor(230, 240, 255);
                    $this->SetFont('Arial', 'B', 11);
                    foreach ($headers as $i => $header) {
                        $this->Cell($this->widths[$i], 8, $header, 0, 0, 'C', true);
                    }
                    $this->Ln();
                    $this->SetFont('Arial', '', 10);
                    $this->SetTextColor(33);
                }

                $bg = $fill ? [250, 250, 250] : [240, 245, 255];
                $this->SetFillColor($bg[0], $bg[1], $bg[2]);

                $this->Cell($this->widths[0], 6, $row['ID_Pelicula'], 0, 0, 'C', true);
                $this->Cell($this->widths[1], 6, utf8_decode($nombre), 0, 0, 'L', true);
                $this->Cell($this->widths[2], 6, $row['Anio'], 0, 0, 'C', true);
                $this->Cell($this->widths[3], 6, utf8_decode($row['estudio']), 0, 0, 'L', true);
                $this->Cell($this->widths[4], 6, utf8_decode($row['actores']), 0, 1, 'L', true);

                $fill = !$fill;
            }

        } catch (PDOException $e) {
            $this->SetFont('Arial', 'B', 10);
            $this->SetTextColor(255, 0, 0);
            $this->Cell(0, 10, 'Error: ' . $e->getMessage(), 0, 1);
        }
    }
}

$pdf = new PDF('L', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->TablaPeliculas();
$pdf->Output();
?>
