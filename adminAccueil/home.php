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
        Tableau de bord Admin Accueil
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
              <h5><i class='icon fa fa-warning'></i> Error!</h5>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h5><i class='icon fa fa-check'></i> Success!</h5>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM reader";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
          
              <p>Nombre de lecteurs</p>
            </div>
            <div class="icon">
            <i class="fa fa-users"></i>
            </div>
            <a href="reader.php" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM reader_category";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>

              <p>Catégories totales de lecteurs</p>
            </div>
            <div class="icon">
            <i class="fa fa-user-secret"></i>
            </div>
            <a href="reader_category.php" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

      <div class="col-lg-3 col-xs-6">
    <!-- small box -->
      <div class="small-box bg-blue">
        <div class="inner">
        <?php
            $sql = "SELECT COUNT(*) AS num_men FROM reader
                    LEFT JOIN gender ON reader.gender_id = gender.gender_id
                    WHERE gender.gender_name = 'homme'";
            $query = $conn->query($sql);
            $row = $query->fetch_assoc();
            echo "<h3>".$row['num_men']."</h3>";
        ?>

            <p>Nombre d'hommes</p>
        </div>
        <div class="icon">
            <i class="fa fa-male"></i> <!-- Utilisez une icône appropriée pour représenter les hommes -->
        </div>
        <a href="reader.php" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
</div>
        <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box" style="background-color: #ff72de; color: #fff;">
        <div class="inner">
        <?php
        $sql = "SELECT COUNT(*) AS num_women FROM reader
                LEFT JOIN gender ON reader.gender_id = gender.gender_id
                WHERE gender.gender_name = 'femme'";
        $query = $conn->query($sql);
        $row = $query->fetch_assoc();
        echo "<h3>".$row['num_women']."</h3>";
        ?>
            <p>Nombre de femmes</p>
        </div>
        <div class="icon">
            <i class="fa fa-female"></i>
        </div>
        <a href="reader.php" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  
</div>

<div class="col-lg-12 col-xs-7">
  <h3 class="card-title">STATISTIQUE SUR LES LECTEURS PAR CATEGORIE</h3>
    <div class="card-group">
        <?php
            $sql = "SELECT reader_category.name_category_reader, COUNT(reader.reader_id) AS num_readers
                    FROM reader_category
                    LEFT JOIN reader ON reader_category.reader_category_id = reader.reader_category_id
                    GROUP BY reader_category.reader_category_id";

            $query = $conn->query($sql);

            while ($row = $query->fetch_assoc()) 
            {
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>".$row['name_category_reader']."</h5>";
                echo "<p class='card-text'>".$row['num_readers']." Lecteurs</p>";
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
      font-size: 20px;
      text-align: center;
    }
    .card-title4{
      text-align: center;
    }
    .card {
      background-color: #fff;
      margin-left: 10px;
      margin-right: 10px;
        text-align: center;
        border: 1px solid #d6dae1;
        border-radius:10px;
        margin-top: 10px;
        width: 30%; /* Ajustez la largeur des cartes selon vos préférences */
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

$and = 'AND YEAR(created_on) = ' . mysqli_real_escape_string($conn, $year);
$months = array();
$reader = array();
$num_men = array();
$num_women = array();

// Ajout d'un tableau pour stocker les données par catégorie
$categoryData = array();

for ($m = 1; $m <= 12; $m++) {
    // Lecteurs par mois
    $sql = "SELECT * FROM reader WHERE MONTH(created_on) = '$m' $and";
    $rquery = $conn->query($sql);
    array_push($reader, $rquery->num_rows);

    // Hommes par mois
    $sql = "SELECT * FROM reader WHERE MONTH(created_on) = '$m' AND gender_id = '1' $and";
    $men_query = $conn->query($sql);
    array_push($num_men, $men_query->num_rows);

    // Femmes par mois
    $sql = "SELECT * FROM reader WHERE MONTH(created_on) = '$m' AND gender_id = '2' $and";
    $women_query = $conn->query($sql);
    array_push($num_women, $women_query->num_rows);

    // Requête pour compter le nombre d'inscrits par catégorie et par mois
    $sqlCategory = "SELECT 
                        reader_category.name_category_reader,
                        COUNT(reader.reader_id) AS num_readers
                    FROM reader_category
                    LEFT JOIN reader ON reader_category.reader_category_id = reader.reader_category_id
                    WHERE MONTH(reader.created_on) = '$m' $and
                    GROUP BY reader_category.reader_category_id";
    $categoryQuery = $conn->query($sqlCategory);

    // Stockage des résultats dans $categoryData
    while ($categoryRow = $categoryQuery->fetch_assoc()) {
        $categoryName = $categoryRow['name_category_reader'];
        $numReaders = $categoryRow['num_readers'];

        if (!isset($categoryData[$categoryName])) {
            $categoryData[$categoryName] = array_fill(1, 12, 0);
        }

        $categoryData[$categoryName][$m] = $numReaders;
    }

    $num = str_pad($m, 2, 0, STR_PAD_LEFT);
    $month = date('M', mktime(0, 0, 0, $m, 1));
    array_push($months, $month);
}

$months = json_encode($months);
$reader = json_encode($reader);
$num_men = json_encode($num_men);
$num_women = json_encode($num_women);

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
                    label               : 'Hommes  ',
                    fillColor           : '#0073b7', // Couleur spécifique que vous souhaitez
                    strokeColor         : '#0073b7', // Utilisez également la couleur hexadécimale ici
                    pointColor          : '#0073b7', // Utilisez également la couleur hexadécimale ici
                    pointStrokeColor    : '#c1c7d1',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(59,139,186,1)',
                    data                : <?php echo $num_men  ; ?>
              },
              {
                    label               : 'Lecteurs ',
                    fillColor           : '#00a65a', // Couleur spécifique que vous souhaitez
                    strokeColor         : 'rgba(59,139,186,0.8)',
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(59,139,186,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(59,139,186,1)',
                    data                : <?php echo $reader; ?>
                },
              
                
                {
                    label               : 'Femmes',
                    fillColor           : '#e566c7', // Couleur spécifique que vous souhaitez
                    strokeColor         : 'rgba(59,139,186,0.8)',
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(59,139,186,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(59,139,186,1)',
                    data                : <?php echo $num_women; ?>
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
                      echo "label: '" . generateAcronym($categoryName) . "',";
                      echo "fillColor: 'rgba(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ", 0.9)',";
                      echo "strokeColor: 'rgba(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ", 0.8)',";
                      echo "pointColor: '#3b8bba',";
                      echo "pointStrokeColor: 'rgba(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ", 1)',";
                      echo "pointHighlightFill: '#fff',";
                      echo "pointHighlightStroke: 'rgba(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ", 1)',";
                      echo "data: [" . implode(',', $categoryValues) . "]";
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
            barStrokeWidth          : 2,
            //Number - Spacing between each of the X value sets
            barValueSpacing         : 5,
            //Number - Spacing between data sets within X values
            barDatasetSpacing       : 1,
            //String - A legend template
            legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
            //Boolean - whether to make the chart responsive
            responsive              : true,
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
