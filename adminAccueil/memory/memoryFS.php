<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Liste de toutes les memoire
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li>Memoires</li>
        <li class="active">Liste de toutes les memoire</li>
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
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Faculté </th>
                  <th>Categorie</th>
                  <th>Couverture</th>
                  <th>Numero</th>
                  <th>Theme</th>
                  <th>Auteur</th>
                  <th>Description</th>
                  <th>Date de publication</th>
                  <th>Nombre d'exemplaires</th>
                  <th>Exemplaires disponibles</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT
                memory.*,
                memory.memory_id AS memoryId,
                faculty.name_faculty,
                memory_category.name_category_memory,
                (memory.NbExemplaireTotal - 
                   COUNT(DISTINCT CASE WHEN memory_borrow.status IS NULL THEN memory_borrow.borrow_memory_id END) - 
                   COUNT(DISTINCT CASE WHEN memory_consultation.status IS NULL THEN memory_consultation.consultation_memory_id END)
                ) AS NbExemplaireDispo
                FROM memory
                LEFT JOIN memory_category ON memory_category.memory_category_id = memory.memory_category_id
                LEFT JOIN faculty ON faculty.faculty_id = memory.faculty_id
                LEFT JOIN memory_borrow ON memory_borrow.memory_id = memory.memory_id
                LEFT JOIN memory_consultation ON memory_consultation.memory_id = memory.memory_id 
                WHERE faculty.faculty_id = 3 
                GROUP BY memory.memory_id";

                $query = $conn->query($sql);
                while ($row = $query->fetch_assoc()) {
                  $photo = (!empty($row['memory_photo'])) ? '../images/' . $row['memory_photo'] : '../images/profile.jpg';
                    echo "
                        <tr>
                          <td>" . $row['name_faculty'] ."</td>
                          <td>" . $row['name_category_memory'] . "</td>
                          <td>
                            <img src='" . $photo . "' width='60px' height='60px'>
                            <a href='#edit_photo' data-toggle='modal' class='pull-right photo' data-id='" . $row['memoryId'] . "'><span class='fa fa-edit'></span></a>
                          </td>
                          <td>" . $row['memory_number'] . "</td>
                          <td>" . $row['memory_theme'] . "</td>
                          <td>" . $row['memory_author'] . "</td>
                          <td>" . $row['memory_description'] . "</td>
                          <td>" . $row['memory_publish_date'] . "</td>
                          <td>" . $row['NbExemplaireTotal'] . "</td>
                          <td>" . $row['NbExemplaireDispo'] . "</td>
                          <td>
                            <button class='btn btn-primary btn-xs view btn-flat' data-id='" . $row['memoryId'] . "'><i class='fa fa-eye'></i></button>
                          </td>
                        </tr>
                    ";
                }
                ?>


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/memory_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $(document).on('click', '.view', function(e){
    e.preventDefault();
    $('#view').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'memory_row.php',
    data: {memory_id:id},
    dataType: 'json',
    success: function(response){
      //Recuperation de l'ID
      $('.memoryId').val(response.memoryId);
      //Affichage pour le boutton view
      $('#view_faculte_memory').val(response.faculty_id).html(response.name_faculty);
      $('#view_category_memory').val(response.memory_category_id).html(response.name_category_memory);
      $('#view_isbn').val(response.memory_number);
      $('#view_titre').val(response.memory_theme);
      $('#view_author').val(response.memory_author);
      $('#view_datepicker_add').val(response.memory_publish_date);
      $('#view_NBexemplaire').val(response.NbExemplaireTotal);
      $('#view_description').val(response.memory_description);
      var photoPath = response.memory_photo_path || '../images/profile.jpg';
      $('#view_photo').attr('src', photoPath);
    }
  });
}
</script>
</body>
</html>
