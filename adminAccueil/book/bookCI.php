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
        Livres de la faculté Centre Informatique
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li>Livres</li>
        <li class="active">Liste de tous les livres</li>
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
                  <th>ISBN</th>
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
                book.*,
                book.book_id AS bookId,
                faculty.name_faculty,
                book_category.name_category_book,
                (book.NbExemplaireTotal - 
                   COUNT(DISTINCT CASE WHEN book_borrow.status IS NULL THEN book_borrow.borrow_book_id END) - 
                   COUNT(DISTINCT CASE WHEN book_consultation.status IS NULL THEN book_consultation.consultation_book_id END)
                ) AS NbExemplaireDispo
                FROM book
                LEFT JOIN book_category ON book_category.book_category_id = book.book_category_id
                LEFT JOIN faculty ON faculty.faculty_id = book.faculty_id
                LEFT JOIN book_borrow ON book_borrow.book_id = book.book_id
                LEFT JOIN book_consultation ON book_consultation.book_id = book.book_id 
                where faculty.faculty_id = 1  
                GROUP BY book.book_id";

                $query = $conn->query($sql);
                while ($row = $query->fetch_assoc()) {
                  $photo = (!empty($row['book_photo'])) ? '../../AdminDocuments/images/' . $row['book_photo'] : '../../AdminDocuments/images/profile.jpg';
                    echo "
                        <tr>
                          <td>" . $row['name_faculty'] ."</td>
                          <td>" . $row['name_category_book'] . "</td>
                          <td>
                            <img src='" . $photo . "' width='60px' height='60px'>
                          </td>
                          <td>" . $row['book_isbn'] . "</td>
                          <td>" . $row['book_title'] . "</td>
                          <td>" . $row['book_author'] . "</td>
                          <td>" . $row['book_description'] . "</td>
                          <td>" . $row['book_publish_date'] . "</td>
                          <td>" . $row['NbExemplaireTotal'] . "</td>
                          <td>" . $row['NbExemplaireDispo'] . "</td>
                          <td>
                            <button class='btn btn-primary btn-xs view btn-flat' data-id='" . $row['bookId'] . "'><i class='fa fa-eye'></i></button>
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
  <?php include 'includes/book_modal.php'; ?>
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
    url: 'book_row.php',
    data: {book_id:id},
    dataType: 'json',
    success: function(response){
      //Recuperation de l'ID
      $('.bookId').val(response.bookId);
      //Affichage pour le boutton view
      $('#view_faculte_book').val(response.faculty_id).html(response.name_faculty);
      $('#view_category_book').val(response.book_category_id).html(response.name_category_book);
      $('#view_isbn').val(response.book_isbn);
      $('#view_titre').val(response.book_title);
      $('#view_author').val(response.book_author);
      $('#view_datepicker_add').val(response.book_publish_date);
      $('#view_NBexemplaire').val(response.NbExemplaireTotal);
      $('#view_description').val(response.book_description);
      var photoPath = response.book_photo_path || '../images/profile.jpg';
      $('#view_photo').attr('src', photoPath);

      $('.del_book').html(response.book_title);
    }
  });
}
</script>
</body>
</html>
