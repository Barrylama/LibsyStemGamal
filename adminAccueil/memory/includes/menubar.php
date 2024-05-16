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
      <li class=""><a href="../home.php"><i class="fa fa-dashboard"></i> <span>Tableau de bord</span></a></li>
      <li class="header">GESTIONS</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-refresh"></i>
          <span>Transactions</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <li class="treeview">
        <a href="#">
          <i class="fa fa-refresh"></i>
          <span>Livres</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../book/book_consultation.php"><i class="fa fa-circle-o"></i> Consultations</a></li>
          <li><a href="../book/book_borrow.php"><i class="fa fa-circle-o"></i> Emprunts</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-refresh"></i>
          <span>Memoires</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="memory_consultation.php"><i class="fa fa-circle-o"></i> Consultations</a></li>
          <li><a href="memory_borrow.php"><i class="fa fa-circle-o"></i> Emprunts</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-refresh"></i>
          <span>Revues</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../review/review_consultation.php"><i class="fa fa-circle-o"></i> Consultations</a></li>
          <li><a href="../review/review_borrow.php"><i class="fa fa-circle-o"></i> Emprunts</a></li>
        </ul>
      </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-book"></i>
          <span>Livres</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="../book/book.php"><i class="fa fa-circle-o"></i> Liste de tous les livres</a></li>
          <li><a href="../book/bookFS.php"><i class="fa fa-circle-o"></i> Facultés des sciences</a></li>
          <li><a href="../book/bookIP.php"><i class="fa fa-circle-o"></i> Institut polytechnique</a></li>
          <li><a href="../book/bookCI.php"><i class="fa fa-circle-o"></i> Centre informatique</a></li>
          <li><a href="../book/bookFSS.php"><i class="fa fa-circle-o"></i> Sciences de la santé</a></li>
          <li><a href="../book/bookIDCF.php"><i class="fa fa-circle-o"></i> Institut des chemins de fer</a></li>
          <li><a href="../book/bookStatistique.php"><i class="fa fa-circle-o"></i> Statistiques</a></li>

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
          <li><a href="memory.php"><i class="fa fa-circle-o"></i> Liste de toutes les memoires</a></li>
          <li><a href="memoryFS.php"><i class="fa fa-circle-o"></i> Facultés des sciences</a></li>
          <li><a href="memoryIP.php"><i class="fa fa-circle-o"></i> Institut polytechnique</a></li>
          <li><a href="memoryCI.php"><i class="fa fa-circle-o"></i> Centre informatique</a></li>
          <li><a href="memoryFSS.php"><i class="fa fa-circle-o"></i> Sciences de la santé</a></li>
          <li><a href="memoryIDCF.php"><i class="fa fa-circle-o"></i> Institut des chemins de fer</a></li>
          <li><a href="memoryStatistique.php"><i class="fa fa-circle-o"></i> Statistiques</a></li>
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
          <li><a href="../review/review.php"><i class="fa fa-circle-o"></i> Liste des Revues</a></li>
          <li><a href="../review/reviewFSS.php"><i class="fa fa-circle-o"></i> Facultés des sciences</a></li>
          <li><a href="../review/reviewIP.php"><i class="fa fa-circle-o"></i> Institut polytechnique</a></li>
          <li><a href="../review/reviewCI.php"><i class="fa fa-circle-o"></i> Centre informatique</a></li>
          <li><a href="../review/reviewFSS.php"><i class="fa fa-circle-o"></i> Sciences de la santé</a></li>
          <li><a href="../review/reviewIDCF.php"><i class="fa fa-circle-o"></i> Institut des chemins de fer</a></li>
          <li><a href="../review/reviewStatistique.php"><i class="fa fa-circle-o"></i> Statistiques</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
        <i class="fa fa-users"></i>
          <span>Lecteurs</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../reader.php"><i class="fa fa-circle-o"></i> Liste des lecteurs</a></li>
          <li><a href="../reader_category.php"><i class="fa fa-circle-o"></i> Categorie de lecteurs</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-refresh"></i>
          <span>Lecteurs</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <li class="treeview">
        <a href="#">
          <i class="fa fa-refresh"></i>
          <span>Etudiants</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../reader.php"><i class="fa fa-circle-o"></i> Liste des etudiants</a></li>
          <li><a href="../reader_category.php"><i class="fa fa-circle-o"></i> Faculté</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-refresh"></i>
          <span>Autres Lecteurs</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../reader_personnel.php"><i class="fa fa-circle-o"></i> Personnel Universitaire</a></li>
          <li><a href="../reader_particulier.php"><i class="fa fa-circle-o"></i> Particuliers</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
