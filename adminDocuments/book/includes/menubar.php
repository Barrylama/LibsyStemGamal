<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user['firstname'].' '.$user['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">RAPPORTS</li>
      <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Tableau de bord</span></a></li>
      <li class="header">GESTIONS</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-book"></i>
          <span>Livres</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="category.php"><i class="fa fa-circle-o"></i> Categorie de livre</a></li>
        <li><a href="book.php"><i class="fa fa-circle-o"></i> Tous les livres</a></li>
          <li><a href="bookFS.php"><i class="fa fa-circle-o"></i> Facultés des sciences</a></li>
          <li><a href="bookIP.php"><i class="fa fa-circle-o"></i> Institut polytechnique</a></li>
          <li><a href="bookCI.php"><i class="fa fa-circle-o"></i> Centre informatique</a></li>
          <li><a href="bookFSS.php"><i class="fa fa-circle-o"></i> Sciences de la santé</a></li>
          <li><a href="bookIDCF.php"><i class="fa fa-circle-o"></i> Institut des chemins de fer</a></li>

        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-book"></i>
          <span>Memoires</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="../memory/category.php"><i class="fa fa-circle-o"></i> Categorie de memoire</a></li>
        <li><a href="../memory/memory.php"><i class="fa fa-circle-o"></i> Liste de toutes les memoires</a></li>
          <li><a href="../memory/memoryFS.php"><i class="fa fa-circle-o"></i> Facultés des sciences</a></li>
          <li><a href="../memory/memoryIP.php"><i class="fa fa-circle-o"></i> Institut polytechnique</a></li>
          <li><a href="../memory/memoryCI.php"><i class="fa fa-circle-o"></i> Centre informatique</a></li>
          <li><a href="../memory/memoryFSS.php"><i class="fa fa-circle-o"></i> Sciences de la santé</a></li>
          <li><a href="../memory/memoryIDCF.php"><i class="fa fa-circle-o"></i> Institut des chemins de fer</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-book"></i>
          <span>Revues</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../review/category.php"><i class="fa fa-circle-o"></i> Categories de Revues</a></li>
          <li><a href="../review/review.php"><i class="fa fa-circle-o"></i> Liste des Revues</a></li>
          <li><a href="../review/reviewFSS.php"><i class="fa fa-circle-o"></i> Facultés des sciences</a></li>
          <li><a href="../review/reviewIP.php"><i class="fa fa-circle-o"></i> Institut polytechnique</a></li>
          <li><a href="../review/reviewCI.php"><i class="fa fa-circle-o"></i> Centre informatique</a></li>
          <li><a href="../review/reviewFSS.php"><i class="fa fa-circle-o"></i> Sciences de la santé</a></li>
          <li><a href="../review/reviewIDCF.php"><i class="fa fa-circle-o"></i> Institut des chemins de fer</a></li>
        </ul>
      </li>
     
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
