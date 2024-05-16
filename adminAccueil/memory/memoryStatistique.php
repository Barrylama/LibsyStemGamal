<?php include 'includes/session.php'; ?>
<?php 
  include 'includes/timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>
<?php include 'includes/header.php'; ?>
<style>
    .card-group {
        display: flex;
        flex-wrap: wrap;
    }

    .card {
        width: 48%; /* Ajustez la largeur des cartes selon vos préférences */
        margin-bottom: 10px;
    }
</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tableau de bord des Memoires
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li class="active">Tableau de bord</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box" style="background-color:#72C938; color: #fff;">
        <div class="inner">
        <?php
        $sql = "SELECT * FROM memory";
        $query = $conn->query($sql);
        $row = $query->fetch_assoc();
        echo "<h3>".$query->num_rows."</h3>"
        ?>
            <p>Memoires total <br> Disponible</p>
        </div>
        <div class="icon">
        <img src="../icons/bookshelf.png" alt="Votre Icône" />
        </div>
        <a href="memory.php" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
    </div>    
</div>


<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box" style="background-color: #38C946; color: #fff;">
        <div class="inner">
        <?php
        $sql = "SELECT * FROM memory_consultation";
        $query = $conn->query($sql);
        $row = $query->fetch_assoc();
        echo "<h3>".$query->num_rows."</h3>"
        ?>
            <p>Memoires total <br> consultés </p>
        </div>
        <div class="icon">
        <img src="../icons/consultant.png" alt="Votre Icône" />
        </div>
        <a href="../memory/memory_consultation.php" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
    </div>    
    
</div>
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box" style="background-color: #38C98F; color: #fff;">
        <div class="inner">
        <?php
        $sql = "SELECT * FROM memory_borrow";
        $query = $conn->query($sql);
        $row = $query->fetch_assoc();
        echo "<h3>".$query->num_rows."</h3>"
        ?>
            <p>Memoires Total <br> empruntés</p>
        </div>
        <div class="icon">
        <img src="../icons/book.png" alt="Votre Icône" />
        </div>
        <a href="../memory/memory_borrow.php" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
    </div>    
    
</div>

<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box" style="background-color: #38BBC9; color: #fff;">
        <div class="inner">
        <?php
        $sql = "SELECT * FROM memory_borrow WHERE status IS NULL";
        $query = $conn->query($sql);
        $row = $query->fetch_assoc();
        echo "<h3>".$query->num_rows."</h3>"
        ?>
            <p>Total de Memoires <br> en emprunts</p>
        </div>
        <div class="icon">
        <img src="../icons/book.png" alt="Votre Icône" />
        </div>
        <a href="../memory/memory_borrow.php" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
    </div>    
    
</div>

<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box" style="background-color: #38BBC9; color: #fff;">
        <div class="inner">
        <?php
        $sql = "SELECT * FROM memory_consultation WHERE status IS NULL";
        $query = $conn->query($sql);
        $row = $query->fetch_assoc();
        echo "<h3>".$query->num_rows."</h3>"
        ?>
            <p>Total de Memoires <br> en consultation</p>
        </div>
        <div class="icon">
        <img src="../icons/reader.png" alt="Votre Icône" />
        </div>
        <a href="../memory/memory_consultation.php" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
    </div>    
    
</div>

<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box" style="background-color: #38C98F; color: #fff;">
        <div class="inner">
        <?php
        $sql = "SELECT * FROM memory_borrow WHERE borrow_memory_date = CURDATE()";
        $query = $conn->query($sql);
        $row = $query->fetch_assoc();
        echo "<h3>".$query->num_rows."</h3>"
        ?>
            <p>Total de Memoires <br> empruntés aujourd'hui</p>
        </div>
        <div class="icon">
        <img src="../icons/borrow.png" alt="Votre Icône" />
        </div>
        <a href="../memory/memory_borrow.php" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
    </div>    
    
</div>

<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box" style="background-color: #38C946; color: #fff;">
        <div class="inner">
        <?php
        $sql = "SELECT * FROM memory_consultation WHERE consultation_memory_date = CURDATE()";
        $query = $conn->query($sql);
        $row = $query->fetch_assoc();
        echo "<h3>".$query->num_rows."</h3>"
        ?>
            <p>Total de Memoires <br> consultés aujourd'hui</p>
        </div>
        <div class="icon">
        <img src="../icons/reader.png" alt="Votre Icône" />
        </div>
        <a href="../memory/memory_consultation.php" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
    </div>    
    
</div>

<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box" style="background-color: #72C938; color: #fff;">
      <div class="inner">
      <?php
        $date = date('Y-m-d'); // Get the current date

        // Total de livres retournés aujourd'hui
        $sql = "SELECT COUNT(*) AS total FROM (
          SELECT * FROM memory_borrow WHERE DATE(return_memory_date) = '$date'
          UNION ALL
          SELECT * FROM memory_consultation WHERE DATE(return_consultation_date) = '$date'
        ) AS combined_table";
        $query = $conn->query($sql);
        $row = $query->fetch_assoc();
        echo "<h3>".$row['total']."</h3>";
      ?>
        <p>Total de Memoires <br> retournés aujourd'hui</p>
      </div>
      <div class="icon">
        <img src="../icons/return.png" alt="Votre Icône" />
      </div>
      <a href="../memory/memory_consultation.php" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
    
</div>

<div class="col-lg-12 col-xs-7">
  <h3 class="card-title">STATISTIQUE SUR LES MEMOIRES PAR FACULTE</h3>
    <div class="card-group">
        <?php
            $sql = "SELECT faculty.name_faculty, COUNT(memory.memory_id) AS num_memory
                    FROM faculty
                    LEFT JOIN memory ON faculty.faculty_id = memory.faculty_id
                    GROUP BY faculty.faculty_id";

            $query = $conn->query($sql);

            while ($row = $query->fetch_assoc()) 
            {
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>".$row['name_faculty']."</h5>";
                echo "<p class='card-text'>".$row['num_memory']." Memoires</p>";
                echo "</div>";
                echo "<div class='card-footer'>";
                echo "</div>";
                echo "</div>";
            }
        ?>
    </div>
    <h5 class ="card-title4">PAR CATEGORIE</h5>
    <div class="card-group">
        <?php
            $sql = "SELECT memory_category.name_category_memory, COUNT(memory.memory_id) AS num_memory_cat
                    FROM memory_category
                    LEFT JOIN memory ON memory_category.memory_category_id = memory.memory_category_id
                    GROUP BY memory_category.memory_category_id";

            $query = $conn->query($sql);

            while ($row = $query->fetch_assoc()) 
            {
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>".$row['name_category_memory']."</h5>";
                echo "<p class='card-text'>".$row['num_memory_cat']." Memoires</p>";
                echo "</div>";
                echo "<div class='card-footer'>";
                echo "</div>";
                echo "</div>";
            }
        ?>
    </div>
</div>





<style>
    .card-group {
        border: 1px solid #d6dae1;
        border-radius:10px;
        background-color:#d6dae1;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    .card-title4{
        text-align: center;
    }
    .small-box{
      border: 1px solid #d6dae1;
        border-radius:15px;
    }
    .small-box-footer
    {
      border: 1px solid inherit;
        border-radius:15px;
    }
    .card-title{
      text-align: center;
    }
    .card {
      background-color: #fff;
      margin-left: 5px;
      margin-right: 5px;
        text-align: center;
        border: 1px solid #d6dae1;
        border-radius:10px;
        margin-top: 10px;
        width: 18%; /* Ajustez la largeur des cartes selon vos préférences */
        margin-bottom: 10px;
    }
    .card-text{
      font-size :20px;
      color: green;
    }
    .content-header
    {
      background-color: #fff;
      border-top: 1px solid
      margin-top: 10px;
      margin-bottom: 20px;
    }
</style>

<div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Rapport mensuel des transactions</h3>
              <div class="box-tools pull-right">
                <form class="form-inline">
                  <div class="form-group">
                    <label>Selectionné l'année: </label>
                    <select class="form-control input-sm" id="select_year">
                      <?php
                        for($i=2015; $i<=2065; $i++){
                          $selected = ($i==$year)?'selected':'';
                          echo "
                            <option value='".$i."' ".$selected.">".$i."</option>
                          ";
                        }
                      ?>
                    </select>
                  </div>
                </form>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <br>
                <div id="legend" class="text-center"></div>
                <canvas id="barChart" style="height:350px"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>

      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>

</div>


<!-- ./wrapper -->

<!-- Chart Data -->
<?php
$year = isset($_GET['year']) ? $_GET['year'] : date("Y");

$borrow_year = 'AND YEAR(borrow_book_date) = ' . mysqli_real_escape_string($conn, $year);
$consult_year = 'AND YEAR(consultation_book_date) = ' . mysqli_real_escape_string($conn, $year);
$borrow = array();
$consultation = array();
$num_men = array();
$num_women = array();
$months = array();

// Ajout d'un tableau pour stocker les données par catégorie
$categoryData = array();

for ($m = 1; $m <= 12; $m++) {
  // Livre empruntés par mois
  $sql = "SELECT * FROM book_borrow WHERE MONTH(borrow_book_date) = '$m' $borrow_year";
  $rquery = $conn->query($sql);
  array_push($borrow, $rquery->num_rows);

  // Livres consultés par mois
  $sql = "SELECT * FROM book_consultation WHERE MONTH(consultation_book_date) = '$m' $consult_year";
  $men_query = $conn->query($sql);
  array_push($consultation, $men_query->num_rows);

      // Requête pour compter le nombre d'emprunts et de consultations par catégorie de lecteur et par mois
    $sqlCategory = "SELECT 
    reader_category.name_category_reader,
    COUNT(DISTINCT book_borrow.borrow_book_id) AS num_borrows,
    COUNT(DISTINCT book_consultation.consultation_book_id) AS num_consultations
    FROM reader_category
    LEFT JOIN reader ON reader_category.reader_category_id = reader.reader_category_id
    LEFT JOIN book_borrow ON reader.reader_id = book_borrow.reader_number AND MONTH(book_borrow.borrow_book_date) = '$m' $borrow_year
    LEFT JOIN book_consultation ON reader.reader_id = book_consultation.reader_id AND MONTH(book_consultation.consultation_book_date) = '$m' $consult_year
    GROUP BY reader_category.reader_category_id";

    $categoryQuery = $conn->query($sqlCategory);
    if ($categoryQuery === false) {
    die('Erreur SQL : ' . $conn->error);
    }

    // Stockage des résultats dans $categoryData
    while ($categoryRow = $categoryQuery->fetch_assoc()) {
    $categoryName = $categoryRow['name_category_reader'];
    $numBorrows = $categoryRow['num_borrows'];
    $numConsultations = $categoryRow['num_consultations'];

    if (!isset($categoryData[$categoryName])) {
        $categoryData[$categoryName] = array_fill(1, 12, 0);
    }

    $categoryData[$categoryName][$m] = array(
        'num_borrows' => $numBorrows,
        'num_consultations' => $numConsultations
    );
    }


  $num = str_pad($m, 2, 0, STR_PAD_LEFT);
  $month = date('M', mktime(0, 0, 0, $m, 1));
  array_push($months, $month);
}

$months = json_encode($months);
$borrow = json_encode($borrow);
$consultation = json_encode($consultation);

// $categoryData est maintenant prêt à être utilisé pour générer le graphique des catégories
?>

<!-- End Chart Data -->
<?php include 'includes/scripts.php'; ?>
<script>
  $(function(){
    var barChartCanvas = $('#barChart').get(0).getContext('2d');
    var barChart = new Chart(barChartCanvas);
    var barChartData = {
      labels  : <?php echo $months; ?>,
      datasets:
       [
        {
          label               : 'Consultation ',
          fillColor           : '#0073b7', // Couleur spécifique que vous souhaitez
          strokeColor         : '#0073b7', // Utilisez également la couleur hexadécimale ici
          pointColor          : '#0073b7', // Utilisez également la couleur hexadécimale ici
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(59,139,186,1)',
          data                : <?php echo $consultation  ; ?>
        },
        {
          label               : 'Emprunts ',
          fillColor           : '#00a65a', // Couleur spécifique que vous souhaitez
          strokeColor         : 'rgba(59,139,186,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(59,139,186,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(59,139,186,1)',
          data                : <?php echo $borrow; ?>
        },
        <?php
                  // Fonction pour générer l'acronyme d'un nom de catégorie
                  function generateAcronym($categoryName)
                  {
                      $words = explode(" ", $categoryName);
                      $acronym = "";
  
                      foreach ($words as $word) {
                          $acronym .= strtoupper($word[0]);
                      }
  
                      return $acronym;
                  }
  
                  // Ajoutez une boucle pour générer les séries de données pour chaque catégorie
                  foreach ($categoryData as $categoryName => $categoryValues) {
                      echo "{";
                      echo "label: '" . generateAcronym($categoryName) . "_Emprunts',";
                      echo "fillColor: 'rgba(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ", 0.9)',";
                      echo "strokeColor: 'rgba(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ", 0.8)',";
                      echo "pointColor: '#3b8bba',";
                      echo "pointStrokeColor: 'rgba(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ", 1)',";
                      echo "pointHighlightFill: '#fff',";
                      echo "pointHighlightStroke: 'rgba(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ", 1)',";
                      echo "data: [" . implode(',', array_column($categoryValues, 'num_borrows')) . "]";
                      echo "},";
                      echo "{";
                      echo "label: '" . generateAcronym($categoryName) . "_Consultations',";
                      echo "fillColor: 'rgba(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ", 0.9)',";
                      echo "strokeColor: 'rgba(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ", 0.8)',";
                      echo "pointColor: '#3b8bba',";
                      echo "pointStrokeColor: 'rgba(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ", 1)',";
                      echo "pointHighlightFill: '#fff',";
                      echo "pointHighlightStroke: 'rgba(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ", 1)',";
                      echo "data: [" . implode(',', array_column($categoryValues, 'num_consultations')) . "]";
                      echo "},";
                  }
               ?>

        
      

      ]
    };
    barChartData.datasets[1].fillColor   = '#00a65a';
    barChartData.datasets[1].strokeColor = '#00a65a';
    barChartData.datasets[1].pointColor  = '#c1c7d2';
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 5,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : false,
      maintainAspectRatio     : true
    };

    barChartOptions.datasetFill = false;
    var myChart = barChart.Bar(barChartData, barChartOptions);
    document.getElementById('legend').innerHTML = myChart.generateLegend() 


  });
  $(function(){
    $('#select_year').change(function(){
      window.location.href = 'home.php?year=' + $(this).val();
    });
  });
</script>

</body>
</html>
