<?php        
        if ($page > 1):
    ?><a href="index.php?action=pagin&amp;page=<?php echo $page - 1; ?>">Page précédente</a> — <?php
endif;


for ($i = 1; $i <= $nombreDePages; $i++):
    ?><a href="index.php?action=pagin&amp;page=<?php echo $i; ?>"><?php echo $i; ?></a> <?php
endfor;


if ($page < $nombreDePages):
    ?>— <a href="index.php?action=pagin&amp;page=<?php echo $page + 1; ?>">Page suivante</a><?php
endif;
?>
<?php
        while ($element = $query->fetch())
        {
        ?>
        <div class="text-left news">
            <h3>
                <?php echo htmlspecialchars($element['title']); ?>               
                
            </h3>
            <p>
            	<?php echo htmlspecialchars($element['content']); ?>
            </p>
        </div>
        <?php
        } // Fin de la boucle des billets
        $query->closeCursor();
        ?>

