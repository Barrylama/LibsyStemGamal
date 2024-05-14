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
      Revues de la Faculté des Sciences
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li>Livres</li>
        <li class="active">Revues de la Faculté des Sciences</li>
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
            <div class="box-header with-border">
            <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat">
                <img src="icones/add_book1.png" alt="Votre Icône" />
                Nouveau
            </a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Faculté </th>
                  <th>Categorie</th>
                  <th>Couverture</th>
                  <th>NUMERO</th>
                  <th>Titre</th>
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
                review.*,
                review.review_id AS reviewId,
                faculty.name_faculty,
                review_category.name_category_review,
                (review.NbExemplaireTotal - 
                   COUNT(DISTINCT CASE WHEN review_borrow.status IS NULL THEN review_borrow.borrow_review_id END) - 
                   COUNT(DISTINCT CASE WHEN review_consultation.status IS NULL THEN review_consultation.consultation_review_id END)
                ) AS NbExemplaireDispo
                FROM review
                LEFT JOIN review_category ON review_category.review_category_id = review.review_category_id
                LEFT JOIN faculty ON faculty.faculty_id = review.faculty_id
                LEFT JOIN review_borrow ON review_borrow.review_id = review.review_id
                LEFT JOIN review_consultation ON review_consultation.review_id = review.review_id 
                WHERE faculty.faculty_id = 3 
                GROUP BY review.review_id";

                $query = $conn->query($sql);
                while ($row = $query->fetch_assoc()) {
                  $photo = (!empty($row['review_photo'])) ? '../images/' . $row['review_photo'] : '../images/profile.jpg';
                    echo "
                        <tr>
                          <td>" . $row['name_faculty'] ."</td>
                          <td>" . $row['name_category_review'] . "</td>
                          <td>
                            <img src='" . $photo . "' width='40px' height='40px'>
                            <a href='#edit_photo' data-toggle='modal' class='pull-right photo' data-id='" . $row['reviewId'] . "'><span class='fa fa-edit'></span></a>
                          </td>
                          <td>" . $row['review_number'] . "</td>
                          <td>" . $row['review_title'] . "</td>
                          <td>" . $row['review_author'] . "</td>
                          <td>" . $row['review_description'] . "</td>
                          <td>" . $row['review_publish_date'] . "</td>
                          <td>" . $row['NbExemplaireTotal'] . "</td>
                          <td>" . $row['NbExemplaireDispo'] . "</td>
                          <td>
                            <button class='btn btn-primary btn-xs view btn-flat' data-id='" . $row['reviewId'] . "'><i class='fa fa-eye'></i></button>
                            <button class='btn btn-success btn-xs edit btn-flat' data-id='" . $row['reviewId'] . "'><i class='fa fa-edit'></i></button>
                            <button class='btn btn-danger btn-xs delete btn-flat' data-id='" . $row['reviewId'] . "'><i class='fa fa-trash'></i></button>
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
  <?php include 'includes/review_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  $(document).on('click', '.view', function(e){
    e.preventDefault();
    $('#view').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    console.log('Bouton Supprimer cliqué.');
    $('#delete').modal('show');
    var id = $(this).data('id');
    console.log('ID du livre à supprimer :', id);
    getRow(id);
});

    $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'review_row.php',
    data: {review_id:id},
    dataType: 'json',
    success: function(response){
      //Recuperation de l'ID
      $('.reviewId').val(response.reviewId);
      //Affichage pour la modification
      $('#sel_faculte_review').val(response.faculty_id).html(response.name_faculty);
      $('#sel_category_review').val(response.review_category_id).html(response.name_category_review);
      $('#edit_isbn').val(response.review_number);
      $('#edit_titre').val(response.review_title);
      $('#edit_author').val(response.review_author);
      $('#edit_datepicker_add').val(response.review_publish_date);
      $('#edit_NBexemplaire').val(response.NbExemplaireTotal);
      $('#edit_description').val(response.review_description);
      //Affichage pour le boutton view
      $('#view_faculte_review').val(response.faculty_id).html(response.name_faculty);
      $('#view_category_review').val(response.review_category_id).html(response.name_category_review);
      $('#view_isbn').val(response.review_number);
      $('#view_titre').val(response.review_title);
      $('#view_author').val(response.review_author);
      $('#view_datepicker_add').val(response.review_publish_date);
      $('#view_NBexemplaire').val(response.NbExemplaireTotal);
      $('#view_description').val(response.review_description);
      var photoPath = response.review_photo_path || '../images/profile.jpg';
      $('#view_photo').attr('src', photoPath);

      $('.del_review').html(response.review_title);
    }
  });
}
</script>
</body>
</html>
