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
        Emprunts Livres
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li>Transactions</li>
        <li class="active">Emprunts Livres</li>
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
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Emprunter</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Date d'emprunt</th>
                  <th>Identifiant du lecteur</th>
                  <th>Nom du lecteur</th>
                  <th>Photo du lecteur</th>
                  <th>ISBN du livre</th>
                  <th>Titre</th>
                  <th>Photo du livre</th>
                  <th>Statut</th>
                  <th>Date retour</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, 
                           reader.reader_number AS readId, 
                           book_borrow.borrow_book_id AS borrowBookId,
                           book_borrow.status AS barstat,
                           IF(book_borrow.status = 1, DATE_FORMAT(book_borrow.return_book_date, '%d,%M, %Y à %H:%i'), 'Non retourné') AS return_date_display
                            FROM book_borrow
                            LEFT JOIN reader ON reader.reader_id=book_borrow.reader_number
                            LEFT JOIN book ON book.book_id=book_borrow.book_id
                            ORDER BY borrow_book_date DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $status = ($row['barstat']) ? '<span class="label label-success">Retourné</span>' : '<span class="label label-danger">Non Retourné</span>';
                      $book_photo = (!empty($row['book_photo'])) ? '../../AdminDocuments/images/' . $row['book_photo'] : '../../AdminDocuments/images/profile.jpg';
                      $reader_photo = (!empty($row['reader_photo'])) ? '../../images/' . $row['reader_photo'] : '../../images/profile.jpg';

                      $returnButton = ($row['barstat']) ? '' : '<button class="btn btn-success btn-xs return-book-btn" data-book-id="' . $row['borrow_book_id'] . '">Retourner</button>';
                      $returnDateDisplay = $row['return_date_display'];
                      echo "
                        <tr>
                          <td>".date('d M, Y', strtotime($row['borrow_book_date']))."</td>
                          <td>".$row['readId']."</td>
                          <td>".$row['reader_firstname'].' '.$row['reader_lastname']."</td>
                          <td>
                            <img src='" . $reader_photo . "' width='40px' height='40px'>
                          </td>
                          <td>".$row['book_isbn']."</td>
                          <td>".$row['book_title']."</td>
                          <td>
                          <img src='" . $book_photo . "' width='40px' height='40px'>
                        </td>
                          <td>".$status."</td>
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
  $(document).on('click', '#append', function(e){
    e.preventDefault();
    $('#append-div').append(
      '<div class="form-group"><label for="" class="col-sm-3 control-label">ISBN</label><div class="col-sm-9"><input type="text" class="form-control" name="isbn[]"></div></div>'
    );
  });

  $(document).on('click', '.return-book-btn', function(e){
    e.preventDefault();
    $('#return-book-btn').modal('show');
    var id = $(this).data('book-id'); // Utilisez data-book-id pour correspondre à ce qui est défini dans votre bouton
    getRow(id);
});
});
function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'book_borrow_row.php',
    data: {borrow_book_id: id},
    dataType: 'json',
    success: function(response){
      // Récupération de l'ID
      $('.borrowBookId').val(response.borrowBookId);
      console.log(response.borrowBookId);


      // Affichage du titre du livre dans la modal
      $('.return_book').html(response.book_title);
    }
  });
}
</script>
</body>
</html>
