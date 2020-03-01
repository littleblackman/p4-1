<footer class="page-footer font-small blue pt-4">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase">Remarque</h5>
        <p>Ceci est un site d'étudiant openclassroom.</p>

      </div>
      <?php if(!isset($_SESSION['admin'])) : ?>
        <h5 id = "admin" class="col-4 "><a href="index.php?action=connect"><i class="fa fa-lock" aria-hidden="true"></i>Connection</a></h5> 
      <?php else: ?>
        <h5 id = "adminIndex" class="col-4 "><a href="index.php?action=adminIndex"><i class="fa fa-unlock" aria-hidden="true"></i>Admin</a></h5> 
      <?php endif ?>
    </div>

  </div>
</footer>