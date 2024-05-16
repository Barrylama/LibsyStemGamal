<?php
require('fpdf/fpdf.php');

// Connexion à la base de données (à remplacer avec vos informations de connexion)
$host = 'localhost';
$dbname = 'libsystemgamal';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

class PDF extends FPDF
{
    protected $totalStudents;

    public function __construct()
    {
        parent::__construct();
        $this->totalStudents = 0;
    }
    public function updateStudentCounts($data)
    {
        // Mettre à jour le nombre total d'étudiants
        $this->totalStudents += count($data);
    }
    // En-tête
// En-tête
function Header()
{
    // Logo
    $this->Image('fpdf/tutorial/logoGamal.jpg', 9, 6, 30);
    // Titre
    $this->SetFont('Arial', 'B', 16);
    $this->Cell(0, 3, 'BIBLIOTHEQUE UNIVERSITAIRE DE L\'UGANC', 0, 1, 'C');
    $this->SetFont('Arial', 'B', 11);
    $this->Cell(0, 10, 'Liste des etudiants inscrits de la faculte des Sciences', 0, 1, 'C');
    // Total des étudiants du centre informatique
    $this->SetFont('Arial', 'B', 9);
    $this->Cell(0, 2, 'Total des etudiants : ' . $this->totalStudents, 0, 1, 'C');
    $this->Image('fpdf/tutorial/logoci.png', 173, 5, 30);
    // Saut de ligne
    $this->Ln(10);

   // Titres des colonnes
   $header = array('N°', 'PRENOMS', 'NOMS', 'DEPARTEMENT', 'CLASSES', 'MATRICULES', 'TELEPHONES','ADRESSES');
   $this->SetFont('Arial', 'B', 10);
   $this->Cell(8, 10, utf8_decode($header[0]), 1, 0, 'C');
   $this->Cell(50, 10, $header[1], 1, 0, 'C');
   $this->Cell(18, 10, $header[2], 1, 0, 'C');
   $this->Cell(45, 10, $header[3], 1, 0, 'C');
   $this->Cell(18, 10, $header[4], 1, 0, 'C');
   $this->Cell(28, 10, $header[5], 1, 0, 'C');
   $this->Cell(28, 10, $header[6], 1, 1, 'C');
}


    // Pied de page
    function Footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Numéro de page
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();


// Requête pour extraire les données de votre base de données (à remplacer par votre requête)
$stmt = $pdo->prepare("SELECT *, reader.reader_id AS readId 
FROM reader 
LEFT JOIN reader_category ON reader_category.reader_category_id = reader.reader_category_id 
LEFT JOIN gender ON gender.gender_id = reader.gender_id 
WHERE reader_category.reader_category_id = 4");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Mettre à jour le nombre total d'étudiants et le nombre d'étudiants par département
$pdf->updateStudentCounts($data);

$pdf->SetFont('Arial', '', 8);
$pdf->AddPage();

$no = 1; // initialisation du numéro
// Boucle pour remplir le tableau avec les données de la base de données
foreach ($data as $row) {
    $pdf->Cell(8, 7, $no++, 1, 0, 'C'); // Affichage du numéro
    $pdf->Cell(50, 7, $row['reader_firstname'], 1, 0, 'C');
    $pdf->Cell(18, 7, $row['reader_lastname'], 1, 0, 'C');
    $pdf->Cell(45, 7, $row['Departement'], 1, 0, 'C');
    $pdf->Cell(18, 7, $row['Licence'], 1, 0, 'C');
    $pdf->Cell(28, 7, $row['Matricule'], 1, 0, 'C');
    $pdf->Cell(28, 7, $row['reader_phone'], 1, 1, 'C');
}

$pdf->Output();
?>
