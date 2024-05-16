<?php
include 'includes/session.php';
include 'includes/header.php';
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Consultation Livres
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li>Transactions</li>
        <li class="active">Consultation Livres</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-warning"></i> Erreur!</h4>
                <ul>
                <?php
                  foreach($_SESSION['error'] as $error){
                    echo "<li>".$error."</li>";
                  }
                ?>
                </ul>
            </div>
          <?php
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
              <a href="#consultation_addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Consulter</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Date de consultation</th>
                  <th>Identifiant du lecteur</th>
                  <th>Nom du lecteur</th>
                  <th>Photo du lecteur</th>
                  <th>ISBN</th>
                  <th>Titre</th>
                  <th>Couverture du livre</th>
                  <th>Statut</th>
                  <th>Date retour</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, 
                    reader.reader_number AS readId,
                    book_consultation.consultation_book_id AS consultationBookId, 
                    book_consultation.status AS barstat, 
                    IF(book_consultation.status = 1, DATE_FORMAT(book_consultation.return_book_date, '%d,%M, %Y à %H:%i'), 'Non retourné') AS return_date_display
                    FROM book_consultation
                    LEFT JOIN reader ON reader.reader_id = book_consultation.reader_id
                    LEFT JOIN book ON book.book_id = book_consultation.book_id
                    ORDER BY consultation_book_date DESC";
                     $query = $conn->query($sql);
            
                    while ($row = $query->fetch_assoc()) {
                        $status = ($row['barstat']) ? '<span class="label label-success">Retourné</span>' : '<span class="label label-danger">Non Retourné</span>';
                        $book_photo = (!empty($row['book_photo'])) ? '../../AdminDocuments/images/' . $row['book_photo'] : '../../AdminDocuments/images/profile.jpg';
                        $reader_photo = (!empty($row['reader_photo'])) ? '../../images/' . $row['reader_photo'] : '../../images/profile.jpg';

                        // Ajout de la colonne pour le bouton "Retourner"
                        $returnButton = ($row['barstat']) ? '' : '<button class="btn btn-success btn-xs return-btn" data-book-id="' . $row['consultation_book_id'] . '">Retourner</button>';

                        $returnDateDisplay = $row['return_date_display'];


                        echo "
                            <tr>
                                <td>" . date('d,M, Y', strtotime($row['consultation_book_date'])) . "</td>
                                <td>" . $row['readId'] . "</td>
                                <td>" . $row['reader_firstname'] . ' ' . $row['reader_lastname'] . "</td>
                                <td>
                                    <img src='" . $reader_photo . "' width='40px' height='40px'>
                                </td>
                                <td>" . $row['book_isbn'] . "</td>
                                <td>" . $row['book_title'] . "</td>
                                <td>
                                    <img src='" . $book_photo . "' width='40px' height='40px'>
                                </td>
                                <td>" . $status . "</td>
                                <td>" . $returnDateDisplay . "</td>
                                <td>" . $returnButton . "</td>
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
  <?php include 'includes/borrow_modal.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $(document).on('click', '#consultation_append', function(e){
    e.preventDefault();
    $('#consultation_append-div').append(
      '<div class="form-group"><label for="" class="col-sm-3 control-label">ISBN</label><div class="col-sm-9"><input type="text" class="form-control" name="isbn[]"></div></div>'
    );
  });

  $(document).on('click', '.return-btn', function(e){
    e.preventDefault();
    $('#return-btn').modal('show');
    var id = $(this).data('book-id'); // Utilisez data-book-id pour correspondre à ce qui est défini dans votre bouton
    getRow(id);
});
});
function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'consultation_row.php',
    data: {consultation_book_id: id},
    dataType: 'json',
    success: function(response){
      // Récupération de l'ID
      $('.consultationBookId').val(response.consultationBookId);
      console.log(response.consultationBookId);

      // Affichage du titre du livre dans la modal
      $('.return_book').html(response.book_title);
    }
  });
}


</script>
</body>
</html>
