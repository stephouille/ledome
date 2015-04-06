<h2>Editer la vidéo <?= $this->request->data['Video']['title'] ?></h2>

<?php 
    // debug($this->request->data); 
?>

<div class="block_content">
    <div class="videos form">
        <?php echo $this->Form->create('Video', array('type' => 'file'));?>
            
            <div class="form-group">
                <?php echo $this->Form->input('title', array('label' => 'Titre de la vidéo', 'class' => 'form-control')); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('iframe_video', array('label' => 'Iframe de la vidéo', 'type' => 'text', 'class' => 'form-control')); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('description', array('label' => 'Description de la vidéo', 'id' => 'desc_video', 'type' => 'textarea', 'class' => 'form-control')); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('summary', array('label' => 'Sommaire', 'type' => 'textarea', 'id' => 'summary_video', 'class' => 'form-control') ); ?>
            </div>
            <div class="form-group">
                <label>Difficulté</label>
                <select id="choose_speaker" name="data[Video][difficulty]" class="form-control">
                    <option value="1">1</option> 
                    <option value="2">2</option> 
                    <option value="3">3</option> 
                </select>
            </div>

        <h3>Speaker</h3>

        <div id="block_professor">

            <div class="form-group">
                <select id="choose_speaker" name="data[Professor][id]" class="form-control">
                    <option value=""></option> 
                    <?php foreach ($professors as $prof): ?>
                        <option value="<?= $prof['Professor']['id'] ?>" <?php if($this->request->data['Professor']['id'] == $prof['Professor']['id']) echo 'selected'; ?>><?= $prof['Professor']['name'] ?></option> 
                    <?php endforeach; ?>
                </select>
            </div>

            <?php if(isset($this->request->data['Professor'])) { ?>

                <img src="<?= $this->request->data['Professor']['picture'] ?>">
                <p><?= $this->request->data['Professor']['name'] ?></p>
                <p><?= $this->request->data['Professor']['email'] ?></p>

            <?php } ?>



        </div>  

        <h3>Annexes</h3>
    
        <ul id="list_annexes">
        <?php foreach ($this->request->data['AnnexesVideo'] as $av) { ?>
            <li data-id="<?= $av['id'] ?>">
                <a href="<?= Router::url('/', true) ?>files/<?= $av['video_id'] ?>/<?= $av['path'] ?>" download><?= $av['path'] ?></a>
                <a class="btn btn-danger delete_av">Supprimer</a>
            </li>
        <?php } ?>
        </ul>

        <div id="block_annexes">
            <a href="javascript:void(0)" class="btn btn-primary" id="add_index">Ajouter un annexe</a>
        </div>
        <br/><br/>

        <div class="form-group">
            <input type="submit" value="Modifier" class="btn btn-default">
        </div>
    </div>
</div>

<script type="text/javascript">

    var json_annexes = '<?php echo json_encode($type_annexes); ?>';
    var annexes = JSON.parse(json_annexes);
    console.log(annexes);

    
    var cke1 = CKEDITOR.replace('desc_video');
    var cke2 = CKEDITOR.replace('summary_video');

    var i = 0;

    //Ajout d'annexes
    $('#block_add_annexe').hide();
    $('#add_index').click(function() {
        var tpl = '<div class="form-group"><label>Type de l\'annexe</label>';
        tpl += '<select id="choose_annexe" class="form-control" name="data[Annexe]['+i+'][id]">';
        for(var j = 0; j < annexes.length; j++) {
            tpl += '<option value="'+annexes[j].Annexe.id+'">'+annexes[j].Annexe.type+'</option>';
        }
        tpl += '</select>';
        tpl += '<div class="form-group"><label>Fichier</label><input class="form-control" type="file" name="data[Annexe]['+i+'][file]" /></div></div>';
        $('#block_annexes').prepend(tpl);
        i++;
    });

    //supprimer un annexe
    $('.delete_av').click(function() {
        var id_av = $(this).closest('li').attr('data-id');
        $.ajax({
            url: window.WEB_URL + 'admin/videos/deleteAnnexe',
            type: "POST",
            data: {
                id_av : id_av
            },
            dataType : 'json',
            success : function(data) {
                $('#list_annexes li[data-id='+id_av+']').remove();
            }
        });
    });
</script>