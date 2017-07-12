
<link rel="stylesheet" href="<?php echo base_url('assets/css/fileinput.min.css'); ?>">

<script src="<?php echo base_url('assets/js/fileinput.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/es.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/ckeditor/ckeditor.js'); ?>"></script>
<section id="soy_blog" class="myportada" style="
    background-image: url(<?php echo base_url('assets/images/soyPortadaBlogNuevoEditar.jpg'); ?>);
">
</section>
<a href="<?php echo site_url('Soy_blogs/ver').'/'.encode_url($blog->id_noticia); ?>" class="btn btn-outline-default btn-rounded waves-effect btn-sm pull-right"> <i class="fa fa-mail-reply"></i> Atras</a>
<section class="news" id="soy_blog">
  <div class="container">
    <div class="row">
     <div class="col-lg-12">
          
        <?php if ($usuario->nombre_usuario && $usuario->apellido_usuario){ ?>
      
          <form action="<?php echo site_url('Soy_blogs/actualizar'); ?>" enctype="multipart/form-data" method="post" id="formBlog">
          
          <?php if ($this->session->flashdata('erroFormBlog')): ?>
            <div class="alert alert-success alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong><?php echo $this->session->flashdata('erroFormBlog'); ?></strong>
            </div>
          <?php endif ?>
          <input type="hidden" name="idB" id="idB" required="" value="<?php echo encode_url($blog->id_noticia); ?>">
          <div class="text-left">
              <div class="md-form form-sm">
                  <i class="fa fa-user prefix"></i>
                  <input type="text" id="titulo" name="titulo" value="<?php echo $blog->tema_noticia; ?>" class="form-control" required="" placeholder="Ingrese título del blog" autofocus="">
                  <label for="titulo">Título</label>
              </div>
              
                  <input type="file" id="archivo" name="archivo" accept="image/*"  class="file-loading">
              

              <div class="">
                  <i class="fa fa-pencil prefix"></i>
                  <label for="contenido">Contenido</label>
                  <textarea type="text" id="contenido" name="contenido" required="" class="md-textarea"><?php echo $blog->descripcion_noticia; ?></textarea>
              </div>

              <div class="text-center">
                  <button type="submit" id="btnActualizarBlog" class="btn btn-outline-primary btn-rounded waves-effect pull-right"><i class="fa fa-pencil-square-o"> Actualizar blog</i></button>
              </div>

          </div>
        </form>
        <?php }else{ ?>
            <div class="alert alert-info alert-dismissable">
            <strong>Opps,</strong> Debe actualizar datos de perfil para crear un Blog. <br>
            <a href="<?php echo site_url('Soy_security/soy_perfil'); ?>">Actualizar mi perfil</a>
          </div>
        <?php } ?>

     </div>
    </div>
    
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
<!-- end news -->
<script src="<?php echo base_url('assets/js/logica/soy_blog_editar.js'); ?>"></script>
<script>
    $("#archivo").fileinput({
    browseClass: "btn btn-outline-success waves-effect",
    previewFileType: "image",
    browseLabel: "Cambiar imagen",
    browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
    showCaption: false,
    showUpload: false,
    allowedFileExtensions: ["jpg", "png"],
    language:'es',
    <?php if ($blog->foto_noticia){ ?>
       initialPreview: [
          
            "<?php echo base_url('assets/images/blogs/').$blog->foto_noticia; ?>"
            
        ],
        initialPreviewAsData: true,
        initialPreviewConfig: [
            {caption: "<?php echo $blog->foto_noticia; ?>",  showDelete: false,key:1}
        ],
        overwriteInitial: true,
        initialCaption: "<?php echo $blog->foto_noticia; ?>"
    <?php } ?>
    });
</script>
