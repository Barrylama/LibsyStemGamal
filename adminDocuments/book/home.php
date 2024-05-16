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
        Tableau de bord Admin Documents 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li class="active">Tableau de bord Admin Documents </li>
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
        
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM book";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
          
              <p>Nombre de Livres</p>
            </div>
            <div class="icon">
            <img src="./icones/bookshelf.png" alt="">
            </div>
            <a href="reader.php" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM memory";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>

              <p>Nombre de Memoires</p>
            </div>
            <div class="icon">
            <img src="./icones/memory.png" alt="">
            </div>
            <a href="reader_category.php" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM review";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>

              <p>Nombre de Revues</p>
            </div>
            <div class="icon">
            <img src="./icones/reviews.png" alt="">
            </div>
            <a href="reader_category.php" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

 
 

<div class="col-lg-12 col-xs-7">
  <h3 class="card-title">STATISTIQUE SUR LES LIVRES PAR FACULTE ET PAR CATEGORIE</h3>
    <div class="card-group">
        <?php
            $sql = "SELECT faculty.name_faculty, COUNT(book.book_id) AS num_books
                    FROM faculty
                    LEFT JOIN book ON faculty.faculty_id = book.faculty_id
                    GROUP BY faculty.faculty_id";

            $query = $conn->query($sql);

            while ($row = $query->fetch_assoc()) 
            {
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>".$row['name_faculty']."</h5>";
                echo "<p class='card-text'>".$row['num_books']." Livres</p>";
                echo "</div>";
                echo "<div class='card-footer'>";
                echo "</div>";
                echo "</div>";
            }
        ?>
    </div>
    <div class="card-group">
        <?php
            $sql = "SELECT book_category.name_category_book, COUNT(book.book_id) AS num_catbooks
                    FROM book_category
                    LEFT JOIN book ON book_category.book_category_id = book.book_category_id
                    GROUP BY book_category.book_category_id";

            $query = $conn->query($sql);

            while ($row = $query->fetch_assoc()) 
            {
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>".$row['name_category_book']."</h5>";
                echo "<p class='card-text'>".$row['num_catbooks']." Livres</p>";
                echo "</div>";
                echo "<div class='card-footer'>";
                echo "</div>";
                echo "</div>";
            }
        ?>
    </div>
</div>

<div class="col-lg-12 col-xs-7">
  <h3 class="card-title">STATISTIQUE SUR LES MEMOIRES PAR FACULTE ET PAR CATEGORIE</h3>
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
    <div class="card-group">
        <?php
            $sql = "SELECT memory_category.name_category_memory, COUNT(memory.memory_id) AS num_catmemory
                    FROM memory_category
                    LEFT JOIN memory ON memory_category.memory_category_id = memory.memory_category_id
                    GROUP BY memory_category.memory_category_id";

            $query = $conn->query($sql);

            while ($row = $query->fetch_assoc()) 
            {
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>".$row['name_category_memory']."</h5>";
                echo "<p class='card-text'>".$row['num_catmemory']." Livres</p>";
                echo "</div>";
                echo "<div class='card-footer'>";
                echo "</div>";
                echo "</div>";
            }
        ?>
    </div>
</div>

<div class="col-lg-12 col-xs-7">
  <h3 class="card-title">STATISTIQUE SUR LES REVUES PAR FACULTE ET PAR CATEGORIE</h3>
    <div class="card-group">
        <?php
            $sql = "SELECT faculty.name_faculty, COUNT(review.review_id) AS num_reviews
                    FROM faculty
                    LEFT JOIN review ON faculty.faculty_id = review.faculty_id
                    GROUP BY faculty.faculty_id";

            $query = $conn->query($sql);

            while ($row = $query->fetch_assoc()) 
            {
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>".$row['name_faculty']."</h5>";
                echo "<p class='card-text'>".$row['num_reviews']." Revues</p>";
                echo "</div>";
                echo "<div class='card-footer'>";
                echo "</div>";
                echo "</div>";
            }
        ?>
        
    </div>
    <div class="card-group">
        <?php
            $sql = "SELECT review_category.name_category_review, COUNT(review.review_id) AS num_catreview
                    FROM review_category
                    LEFT JOIN review ON review_category.review_category_id = review.review_category_id
                    GROUP BY review_category.review_category_id";

            $query = $conn->query($sql);

            while ($row = $query->fetch_assoc()) 
            {
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>".$row['name_category_review']."</h5>";
                echo "<p class='card-text'>".$row['num_catreview']." Livres</p>";
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
      margin-right: 15px;
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
      

      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>

</div>



<?php include 'includes/scripts.php'; ?>


</body>
</html>
