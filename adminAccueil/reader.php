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
        Liste des lecteurs
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li>Lecteurs</li>
        <li class="active">Liste de lecteurs</li>
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
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-user-plus"></i> Nouveau</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Categorie</th>
                  <th>Photo</th>
                  <th>Identifiant</th>
                  <th>Prenom</th>
                  <th>Nom </th>
                  <th>Telephone</th>
                  <th>Adresse</th>
                  <th>Genre</th>
                  <th>Quota livre</th>
                  <th>Date d'inscription</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT *, reader.reader_id AS readId FROM reader LEFT JOIN reader_category ON reader_category.reader_category_id = reader.reader_category_id LEFT JOIN gender ON gender.gender_id = reader.gender_id";
                $query = $conn->query($sql);
                while ($row = $query->fetch_assoc()) {
                    $photo = (!empty($row['reader_photo'])) ? '../images/' . $row['reader_photo'] : '../images/profile.jpg';
                    echo "
                        <tr>
                          <td>" . $row['name_category_reader'] . "</td>
                          <td>
                            <img src='" . $photo . "' width='30px' height='30px'>
                            <a href='#edit_photo' data-toggle='modal' class='pull-right photo' data-id='" . $row['readId'] . "'><span class='fa fa-edit'></span></a>
                          </td>
                          <td>" . $row['reader_number'] . "</td>
                          <td>" . $row['reader_firstname'] . "</td>
                          <td>" . $row['reader_lastname'] . "</td>
                          <td>" . $row['reader_phone'] . "</td>
                          <td>" . $row['reader_address'] . "</td>
                          <td>" . $row['gender_name'] . "</td>
                          <td>" . $row['book_quota'] . "</td>
                          <td>" . date('d/m/Y à H:i', strtotime($row['created_on'])) . "</td>
                          <td>
                            <button class='btn btn-success btn-xs edit btn-flat' data-id='" . $row['readId'] . "'><i class='fa fa-edit'></i></button>
                            <button class='btn btn-danger btn-xs delete btn-flat' data-id='" . $row['readId'] . "'><i class='fa fa-trash'></i></button>
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
  <?php include 'includes/reader_modal.php'; ?>
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

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
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
    url: 'reader_row.php',
    data: {reader_id:id},
    dataType: 'json',
    success: function(response){
      $('.readId').val(response.readId);
      $('#edit_firstname').val(response.reader_firstname);
      $('#edit_lastname').val(response.reader_lastname);
      $('#edit_reader_phone').val(response.reader_phone);
      $('#edit_reader_address').val(response.reader_address);
      $('#sel_reader_gender').val(response.gender_id);
      $('#sel_reader_gender').html(response.gender_name);
      $('#sel_reader_category').val(response.reader_category_id);
      $('#sel_reader_category').html(response.name_category_reader);
      $('#edit_book_quota').val(response.book_quota);
      $('.del_stu').html(response.reader_firstname+' '+response.reader_lastname);
    }
  });
}
</script>
</body>
</html>
