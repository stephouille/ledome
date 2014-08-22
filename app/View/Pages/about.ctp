<div class="block_content">
	<div id="wrapper_about">

		<h2>LE DOME</h2>
		<h3>Opening knowledge to all</h3>

		<p>LE DOME est un endroit où il fait bon apprendre. Conçu pour rendre le savoir accessible au plus grand nombre, ce site web offre à la fois la possibilité de consulter gratuitement des cours de toutes sortes (arts, savoirs académiques, savoirs technologiques, développement personnel) et de les sauvegarder au cœur d’un espace qui enregistre la progression parcourue et où ils peuvent être consultables à tout instant.</p>

		<p>La philosophie est l’open source. Tout est gratuit, l’inscription n’est pas obligatoire mais elle permet la conservation  de la bibliothèque et de la progression des cours consultés. Toutefois les données récupérées (login, email) ne sont destinées à aucun but commercial. Il n’y a pas non plus de pub et n’y en aura jamais (c’est dans les statuts).</p>

		<p>Vous pouvez nous apporter un soutien financier ou nous aider à améliorer nos cours, ça nous sera très utile. Mais ce qui nous ferait vraiment vraiment plaisir, c’est que vous appreniez un truc, là, tout de suite.</p>

		<?php echo $this->Html->link('Démarrer', array('controller' => 'lessons','action' => 'index'), array('class' => 'button'));?>

	</div>
</div>
<!-- Tip Content -->
    <ol id="joyRideTipContent">
      <li data-class="so-awesome" data-text="Next" class="custom">
        <h2>Stop #1</h2>
        <p>You can control all the details for you tour stop. Any valid HTML will work inside of Joyride.</p>
      </li>
      <li data-id="numero2" data-button="Next" data-options="tipLocation:top;tipAnimation:fade">
        <h2>Stop #2</h2>
        <p>Get the details right by styling Joyride with a custom stylesheet!</p>
      </li>
      <li data-id="numero3" data-button="Next" data-options="tipLocation:right">
        <h2>Stop #3</h2>
        <p>It works right aligned.</p>
      </li>
      <li data-button="Next">
        <h2>Stop #4</h2>
        <p>It works as a modal too!</p>
      </li>
      <li data-class="someclass" data-button="Next" data-options="tipLocation:right">
        <h2>Stop #4.5</h2>
        <p>It works with classes, and only on the first visible element with that class.</p>
      </li>
      <li data-id="numero5" data-button="Close">
        <h2>Stop #5</h2>
        <p>Now what are you waiting for? Add this to your projects and get the most out of your apps!</p>
      </li>
    </ol>

<?php echo $this->Html->script('jquery.joyride-2.1'); ?>
<script type="text/javascript">

	$('#joyRideTipContent').joyride({
      	autoStart : true,
      	postStepCallback : function (index, tip) {
	      if (index == 2) {
	        $(this).joyride('set_li', false, 1);
	      }
	    },
	    modal:true,
	    expose: true
    });

</script>