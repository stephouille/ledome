<div class="block_content" id="block_friends">

	<div id="wrapper_friends">

		<h2>Les amis</h2>

		<p>Un grand merci à toutes les personnes qui nous soutiennent et qui nous aident à rendre ce projet possible.</p>

		<ul>
			<?php foreach ($contributors as $contributor) : ?>
				<li>
					<?php echo $this->Html->image($contributor['Contributor']['image'], array('class' => "image_contributor")); ?>
					<p class="name_contributor"><?= $contributor['Contributor']['name'] ?></p>
					<p class="poste_contributor"><?= $contributor['Contributor']['poste'] ?></p>
				</li>
			<?php endforeach; ?>
		</ul>

		<a href="" class="button" id="btn_becomeAFriend">Devenir notre ami</a>

	</div>

</div>