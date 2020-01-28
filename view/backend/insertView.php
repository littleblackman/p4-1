<h2>Ajouter un article</h2>
<p>Vous pouvez créer un article en remplissant le formulaire ci-deçus!</p>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script> 
  <script>tinymce.init({ selector:'textarea' });</script>
<form method="post" action="index.php?action=listAllPosts">
        <input type="text" placeholder="titre" name="titre" />
        <textarea placeholder="contenu" name="contenu">Contenu</textarea>
        <input type="submit" />
</form>