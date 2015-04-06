<div class="loader"></div>
<div class="block_dome">
	<?php if (!$authUser) { ?>	
	<div id="block_noconnected">
		<div id="wrapper_noconnected">
			<p>Inscrivez-vous pour sauvegarder votre progression et organiser les cours que vous souhaitez apprendre au sein de votre DOME.</p>
			<?php echo $this->Html->link("Je m'inscris", array('controller'=>'users','action' => 'add'), array('class' => 'button greenbutton btn_connexion'));?>
		</div>
	</div>
	<?php } ?>
     <div id="wrapper_dome">
          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"width="800px" height="612px" viewBox="0 0 612 612" enable-background="new 0 0 612 612" xml:space="preserve">
          <?php if ($authUser):
               foreach ($zones as $zone): 
                    $active = false;
                    foreach ($lessons_user as $l) {
                         if($l['Learning']['id'] == $zone['Zone']['learning_id']) {
                            $active = true;
                            break;
                         }
                    } 
                    if($active): ?>
                    <a xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?= Router::url('/') ?>learnings/view/<?= $l['Learning']['id'] ?>" data-name="<?= $l['Learning']['name'] ?>" data-progress="<?= $l['UsersLesson']['progress'] ?>" data-nb-videos="<?= count($l['Learning']['Video']) ?>" data-learning-image="<?= $l['Learning']['image'] ?>">
                    <?php endif; ?>
                         <polygon class="area <?php if($active) echo 'active'; ?>" fill="#<?= $zone['Zone']['color'] ?>" id="area-<?= $zone['Zone']['id'] ?>" points="<?= $zone['Zone']['coords'] ?>"/>
                    <?php if($active): ?>
                    </a>
                    <?php endif;
               endforeach; ?>
               <g>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="427.1" y1="137" x2="465" y2="85.4"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="465" y1="85.4" x2="523.6" y2="105.1"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="427.1" y1="137" x2="478.8" y2="249.5"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="427.1" y1="137" x2="524.2" y2="168.5"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="524.2" y1="168.5" x2="478.8" y2="249.5"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="465" y1="85.4" x2="524.2" y2="168.5"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="524.2" y1="168.5" x2="523.6" y2="105.1"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="427.1" y1="137" x2="304.9" y2="122.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="304.9" y1="122.8" x2="367.7" y2="54.7"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="367.7" y1="54.7" x2="427.1" y2="137"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="367.7" y1="54.7" x2="465" y2="85.4"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="367.7" y1="54.7" x2="427.1" y2="35.3"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="427.1" y1="35.3" x2="465" y2="85.4"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="367.7" y1="54.7" x2="242" y2="54.7"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="242" y1="54.7" x2="304.9" y2="122.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="242" y1="54.7" x2="304.9" y2="10"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="304.9" y1="10" x2="367.7" y2="54.7"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="182.5" y1="35.3" x2="242" y2="54.7"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="182.5" y1="35.3" x2="304.9" y2="10"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="182.5" y1="35.3" x2="144.9" y2="85.4"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="144.9" y1="85.4" x2="242" y2="54.7"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="144.9" y1="85.4" x2="182.5" y2="137"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="182.5" y1="137" x2="242" y2="54.7"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="144.9" y1="85.4" x2="85.6" y2="105.4"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="85.6" y1="105.4" x2="85.6" y2="168.5"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="85.6" y1="168.5" x2="144.9" y2="85.4"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="85.6" y1="168.5" x2="182.5" y2="137"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="23.5" y1="214.1" x2="85.6" y2="168.5"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="23.5" y1="214.1" x2="46.9" y2="287.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="85.6" y1="168.5" x2="46.9" y2="287.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="46.9" y1="287.8" x2="131.2" y2="249"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="85.6" y1="168.5" x2="131.2" y2="249"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="131.2" y1="249" x2="182.5" y2="137"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="182.5" y1="137" x2="304.9" y2="122.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="182.5" y1="137" x2="245" y2="223.2"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="245" y1="223.2" x2="304.9" y2="122.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="304.9" y1="122.8" x2="364.8" y2="223.2"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="364.8" y1="223.2" x2="427.1" y2="137"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="245" y1="223.2" x2="364.8" y2="223.2"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="364.8" y1="223.2" x2="478.8" y2="249.5"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="245" y1="223.2" x2="304.9" y2="305.5"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="304.9" y1="305.5" x2="364.8" y2="223.2"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="304.9" y1="305.5" x2="401.8" y2="337"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="401.8" y1="337" x2="478.8" y2="249.5"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="364.8" y1="223.2" x2="401.8" y2="337"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="131.2" y1="249" x2="208" y2="337"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="208" y1="337" x2="245" y2="223.2"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="245" y1="223.2" x2="131.2" y2="249"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="208" y1="337" x2="107" y2="369.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="208" y1="337" x2="304.9" y2="305.5"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="208" y1="337" x2="304.9" y2="407.5"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="304.9" y1="305.5" x2="304.9" y2="407.5"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="208" y1="337" x2="197.5" y2="453.2"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="197.5" y1="453.2" x2="304.9" y2="407.5"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="107" y1="369.8" x2="197.5" y2="453.2"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="131.2" y1="249" x2="107" y2="369.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="46.9" y1="287.8" x2="107" y2="369.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="107" y1="369.8" x2="107" y2="471.5"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="107" y1="471.5" x2="197.5" y2="453.2"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="197.5" y1="453.2" x2="208" y2="544.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="208" y1="544.8" x2="304.9" y2="513.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="304.9" y1="513.8" x2="304.9" y2="577.7"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="304.9" y1="577.7" x2="208" y2="544.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="208" y1="544.8" x2="244.8" y2="596.2"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="244.8" y1="596.2" x2="304.9" y2="577.7"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="107" y1="471.5" x2="131.2" y2="544.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="131.2" y1="544.8" x2="208" y2="544.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="208" y1="544.8" x2="107" y2="471.5"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="304.9" y1="407.5" x2="412" y2="453.2"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="304.9" y1="407.5" x2="304.9" y2="513.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="304.9" y1="513.8" x2="412" y2="453.2"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="197.5" y1="453.2" x2="304.9" y2="513.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="412" y1="453.2" x2="503.2" y2="471.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="412" y1="453.2" x2="402" y2="545"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="402" y1="545" x2="503.2" y2="471.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="503.2" y1="471.8" x2="478.3" y2="544.2"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="478.3" y1="544.2" x2="402" y2="545"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="304.9" y1="513.8" x2="402" y2="545"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="402" y1="545" x2="304.9" y2="577.7"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="304.9" y1="577.7" x2="364.2" y2="596.2"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="364.2" y1="596.2" x2="402" y2="545"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="478.3" y1="544.2" x2="364.2" y2="596.2"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="364.2" y1="596.2" x2="426.3" y2="576"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="426.3" y1="576" x2="478.3" y2="544.2"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="364.2" y1="596.2" x2="304.9" y2="600.5"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="304.9" y1="600.5" x2="244.8" y2="596.2"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="244.8" y1="596.2" x2="364.2" y2="596.2"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="131.2" y1="544.8" x2="182.8" y2="575.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="182.8" y1="575.8" x2="244.8" y2="596.2"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="244.8" y1="596.2" x2="131.2" y2="544.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="46.5" y1="451.8" x2="107" y2="471.5"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="46.5" y1="451.8" x2="85" y2="504.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="85" y1="504.8" x2="131.2" y2="544.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="131.2" y1="544.8" x2="46.5" y2="451.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="46.5" y1="451.8" x2="46.5" y2="389.7"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="46.5" y1="389.7" x2="107" y2="471.5"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="46.5" y1="389.7" x2="107" y2="369.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="46.9" y1="287.8" x2="46.5" y2="389.7"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="46.9" y1="287.8" x2="9.7" y2="338.7"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="9.7" y1="338.7" x2="46.5" y2="389.7"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="9.7" y1="338.7" x2="23.3" y2="396"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="23.3" y1="396" x2="46.5" y2="451.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="9.7" y1="338.7" x2="46.5" y2="451.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="9.7" y1="338.7" x2="9.7" y2="272.3"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="23.5" y1="214.1" x2="9.7" y2="272.3"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="23.5" y1="214.1" x2="9.7" y2="338.7"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="23.5" y1="214.1" x2="46.9" y2="158.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="85.6" y1="105.4" x2="46.9" y2="158.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="85.6" y1="105.4" x2="23.5" y2="214.1"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="85.6" y1="105.4" x2="131.2" y2="66.3"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="131.2" y1="66.3" x2="182.5" y2="35.3"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="182.5" y1="35.3" x2="85.6" y2="105.4"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="182.5" y1="35.3" x2="243.7" y2="15"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="243.7" y1="15" x2="304.9" y2="10"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="304.9" y1="10" x2="364.6" y2="15"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="427.1" y1="35.3" x2="364.6" y2="15"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="304.9" y1="10" x2="427.1" y2="35.3"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="427.1" y1="35.3" x2="477.9" y2="65.6"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="477.9" y1="65.6" x2="523.6" y2="105.1"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="427.1" y1="35.3" x2="523.6" y2="105.1"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="523.6" y1="105.1" x2="563.2" y2="159"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="563.2" y1="159" x2="586" y2="214.4"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="586" y1="214.4" x2="524.2" y2="168.5"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="523.6" y1="105.1" x2="586" y2="214.4"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="478.8" y1="249.5" x2="562.5" y2="287.3"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="562.5" y1="287.3" x2="586" y2="214.4"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="524.2" y1="168.5" x2="562.5" y2="287.3"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="586" y1="214.4" x2="599.8" y2="272.3"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="599.8" y1="272.3" x2="599.8" y2="337.7"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="586" y1="214.4" x2="599.8" y2="337.7"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="599.8" y1="337.7" x2="562.5" y2="287.3"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="478.8" y1="249.5" x2="503.2" y2="370"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="503.2" y1="370" x2="562.5" y2="287.3"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="562.5" y1="287.3" x2="563.8" y2="389.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="563.8" y1="389.8" x2="599.8" y2="337.7"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="401.8" y1="337" x2="503.2" y2="370"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="503.2" y1="370" x2="563.8" y2="389.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="599.8" y1="337.7" x2="586" y2="397.1"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="586" y1="397.1" x2="563.1" y2="452.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="563.1" y1="452.8" x2="563.8" y2="390.5"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="599.8" y1="337.7" x2="563.1" y2="452.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="503.2" y1="471.8" x2="563.1" y2="452.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="563.8" y1="389.8" x2="503.2" y2="471.8"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="503.2" y1="471.8" x2="503.2" y2="370"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="478.3" y1="544.2" x2="524.5" y2="505.3"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="563.1" y1="452.8" x2="524.5" y2="505.3"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="563.1" y1="452.8" x2="478.3" y2="544.2"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="412" y1="453.2" x2="503.2" y2="370"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="401.8" y1="337" x2="412" y2="453.2"/>
                    <line fill="none" stroke="#000000" stroke-width="0.75" stroke-miterlimit="10" x1="304.9" y1="407.5" x2="401.8" y2="337"/>
               </g>
          <?php endif; ?>
          </svg>
          <div id="hover_dome">
          </div>
    </div>
</div>

<script type="text/javascript">

	$('#btn_signup').hide();

	$(function (){
        var inpParent = $('.input');

        if (!inpParent.length) return;

        inpParent.each(function (){
            var thisLine =  $(this),
                inpTxt =  thisLine.find('.txt-field'),
                inpCapt =  thisLine.find('.caption');

            function fIn() {
                inpTxt.parent().addClass('active');
            }
            function fOut() {
                if(inpTxt.val() != 0){

                }else{
                    inpTxt.parent().removeClass('active');
                }
            }

            inpTxt.focusin(fIn);
            inpTxt.focusout(fOut);
        })
    });

     $('#wrapper_dome svg a').hover(function() {
          var learning = $(this).attr('data-name');
          var progress = $(this).attr('data-progress');
          var nb_videos = $(this).attr('data-nb-videos');
          var image = $(this).attr('data-learning-image');

          $('#hover_dome').html('<div class="content_hover"><img src="img/'+image+'" /><p>'+learning+'</p><div class="progress">'+progress+'/'+nb_videos+'</div></div>');
          $('#hover_dome').css({
               'top' : $(this).position().top - 100,
               'left' : $(this).position().left
          })
          $('#hover_dome').show();
     }, function() {
          $('#hover_dome').hide();
     });
	


</script>