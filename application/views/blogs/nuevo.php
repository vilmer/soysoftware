
<link rel="stylesheet" href="<?php echo base_url('assets/css/fileinput.min.css'); ?>">

<script src="<?php echo base_url('assets/js/fileinput.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/es.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/ckeditor/ckeditor.js'); ?>"></script>
<section id="soy_blog" class="myportada" style="background-image: url(<?php echo base_url('assets/images/soyPortadaBlogNuevoEditar.jpg'); ?>);">
</section>

<a href="<?php echo site_url('Soy_blogs/index'); ?>" class="btn btn-outline-default btn-rounded waves-effect btn-sm pull-right"> <i class="fa fa-mail-reply"></i> Atras</a>
<section class="news" id="soy_blog">
  <div class="container">
    <div class="row">
     <div class="col-lg-12">
          
        <?php if ($usuario->nombre_usuario && $usuario->apellido_usuario){ ?>
          <div class="alert alert-info alert-dismissable">
            <strong>Bienvenido,</strong> <?php echo $usuario->nombre_usuario; ?> <?php echo $usuario->apellido_usuario; ?>, ahora podras crear un Blog expectacular. Recuerda la información proporcionada deberá ser de interés público.
          </div>
          <form action="<?php echo site_url('Soy_blogs/crear'); ?>" enctype="multipart/form-data" method="post" id="formBlog">
          
          <?php if ($this->session->flashdata('erroFormBlog')): ?>
            <div class="alert alert-success alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong><?php echo $this->session->flashdata('erroFormBlog'); ?></strong>
            </div>
          <?php endif ?>

          <div class="text-left">
              <div class="md-form form-sm">
                  <i class="fa fa-user prefix"></i>
                  <input type="text" id="titulo" name="titulo"  class="form-control" required="" placeholder="Ingrese título del blog" autofocus="">
                  <label for="titulo">Título</label>
              </div>
              
                  <input type="file" id="archivo" name="archivo" accept="image/*"  class="form-control" required="">
              

              <div class="">
                  <i class="fa fa-pencil prefix"></i>
                  <label for="contenido">Contenido</label>
                  <textarea type="text" id="contenido" name="contenido" required="" class="md-textarea"></textarea>
              </div>
                
                <div class="checkbox">
                    <label>
                      <input type="checkbox" id="terminosCondiciones" name="terminosCondiciones" value="agree" />He leído y acepto los<button class="btn-link" type="button" onclick="abrirModalTC(this);"><strong style="color: #c70b71">términos y condiciones de uso.</strong></button>
                    </label>
                </div>

              <div class="text-center">
                  <button type="submit" id="btnNuevoBlog" class="btn btn-outline-primary btn-rounded waves-effect pull-right"><i class="fa fa-save"> Crear blog</i></button>
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
<script src="<?php echo base_url('assets/js/logica/soy_blog_nuevo.js'); ?>"></script>

<div class="modal fade" id="modalTC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title w-100" id="myModalLabel">Términos y condiciones</h4>
            </div>
            <!--Body-->
            <div class="modal-body" style="text-align: justify;">
                <h3>Política de contenido de soyBlog</h3>

<p>
  soyBlog es un servicio gratuito para comunicarse, manifestarse y expresarse libremente. Pensamos que soyBlog contribuye a que haya más información disponible, que promueve un intercambio saludable de opiniones y que permite que la gente conecte. Creemos que el censurar estos contenidos iría contra el espíritu de un servicio basado en la libertad de expresión.
</p>

<p>
  No obstante, para mantener estos valores, tenemos que frenar los abusos que pongan en peligro nuestra capacidad de prestar este servicio y la libertad de expresión que promueve. Como consecuencia, hay ciertos límites en el tipo de contenidos que se pueden alojar en soyBlog. Los límites que hemos definido cumplen los requisitos legales y sirven para mejorar el servicio en su conjunto.
</p>

<p>
  Si consideras que un blog infringe nuestras políticas, infórmanos a <b>info@soysoftware.com</b>
</p>

<h3>Límites de contenido</h3>

<p>
  Nuestra política sobre contenidos es importante para garantizar que los usuarios tengan una experiencia positiva. Respeta estas directrices, por favor. Como cambiamos nuestra política sobre contenidos de vez en cuando, deberías pasarte por aquí con frecuencia para estar al día. Por otro lado, ten presente que a veces hacemos excepciones por criterios artísticos, formativos, documentales o científicos, o si representa otra ventaja notable para el público el que no modifiquemos los contenidos.
</p>

<p>
  <b>Contenido para adultos:</b> en soyBlog permitimos los contenidos no incluidas las imágenes o vídeos con desnudos o texto en actividad sexual estámos aquí para cambiar el mundo y proteger a los usuarios.
</p>

<h3>
  Nuestra política de contenido para adultos contempla las siguientes excepciones:
</h3>
<p>
  
No se permite el uso de soyBlog como medio para ganar dinero con contenido no apto para menores. Por ejemplo: no puedes crear blogs que contengan anuncios o enlaces a sitios comerciales.
No se permite ningún contenido sobre relaciones sexuales ilegales, lo que incluye las imágenes, los vídeos o los textos que representen o fomenten la violación, el incesto, la zoofilia o la necrofilia.
No publiques ni distribuyas imágenes de desnudos privadas ni sexualmente explícitas sin el consentimiento de las personas que aparecen. Si alguien ha publicado un desnudo privado o una imagen/vídeo sexualmente explícito de ti, infórmanos a <b>info@soysoftware.com</b>.
Protección infantil: tenemos una política de tolerancia cero con los contenidos que explotan a los niños. Algunos ejemplos:
</p>

<p>
  <b>Imágenes de abusos sexuales a menores:</b> cancelaremos las cuentas de todo usuario que aloje, publique o distribuya imágenes de abusos sexuales a menores. También denunciaremos a ese usuario a la autoridad legal competente.
<b>Pedofilia:</b> está prohibido todo contenido que fomente o promocione la atracción sexual hacia niños. Por ejemplo: no permitimos los blogs con galerías de imágenes de niños acompañadas de textos o imágenes de tono erótico, ni contenidos de tono sexual que impliquen la participación de un menor de edad.
<p>Incitación al odio:</p> nuestros productos son plataformas para ejercer la libertad de expresión. Sin embargo, no admitimos ningún contenido que promueva el odio ni la violencia contra otros grupos por su raza, origen étnico, religión, discapacidad, sexo, edad, veteranía u orientación sexual/identidad de género, ni cuyo fin principal sea incitar al odio con la excusa de dichas características. Es una cuestión que a veces puede resultar delicada, pero si el fin principal es atacar a un grupo protegido, consideramos que ese contenido se pasa de la raya.
</p>

<p>
  <b>Contenido vulgar:</b> no publiques algo por el mero hecho de que sea impactante o gráfico. Las imágenes ampliadas de heridas de bala o las escenas de accidentes sin contexto o comentarios adicionales, por ejemplo, incumplirían esta política.
</p>

<p>
  <b>Violencia:</b> no amenaces a nadie en tu blog. Por ejemplo: no publiques amenazas de muerte hacia otra persona o grupo de personas ni contenidos que animen a tus lectores a emprender acciones violentas contra otras personas o grupos.
</p>

<p>
  <b>Acoso:</b> no acoses ni intimides a nadie. Si utilizas el blog para acosar o intimidar a alguien podemos borrar tus contenidos o prohibirte definitivamente el acceso al sitio. Además, el acoso online es ilegal en muchas jurisdicciones y puede tener graves consecuencias penales.
</p>

<p>
  <b>Derechos de autor:</b> siempre atendemos los avisos claros de presunto incumplimiento de los derechos de autor. Puedes encontrar más información sobre nuestra política de derechos de autor aquí. Asimismo, no puedes publicar enlaces a sitios de donde tus lectores puedan descargarse contenidos ajenos sin la autorización de sus propietarios.
</p>

<p>
  <b>Datos personales y confidenciales:</b> no publiques datos personales ni confidenciales de otras personas. Por ejemplo: no publiques números de tarjetas de crédito ni de la Seguridad Social que no sean tuyos, ni tampoco números de teléfono que no aparezcan en la guía ni números de carné de conducir de otras personas. Tampoco publiques ni distribuyas imágenes o vídeos de menores sin el consentimiento necesario de sus representantes legales. Si alguien ha publicado una imagen o un vídeo de un menor sin el consentimiento necesario, avísanos por aquí <b>info@soysoftware.com</b>. Por otro lado, ten presente que los datos que están disponibles en otro sitio de Internet o en registros públicos no se suelen considerar confidenciales ni privados según nuestra política.
</p>
<p>
  
<b>Suplantación de identidad:</b> no engañes ni confundas a los lectores fingiendo ser otra persona o el representante de una organización si no es cierto. Con esto no queremos decir que no autoricemos la publicación de parodias o sátiras, simplemente que debes evitar el contenido que pueda confundir a los lectores con respecto a tu identidad real.
</p>

<p>
  <b>Actividades ilegales:</b> no utilices el blog para llevar a cabo o fomentar actividades ilegales o peligrosas. Por ejemplo: no animes a la gente en tu blog a que beba y después conduzca. Tampoco utilices para vender ni para promocionar drogas ilegales. Si lo haces, eliminaremos tu contenido. En casos más graves, como los de abuso de menores, podemos denunciarte a las autoridades legales competentes.
</p>

<p>
  <b>Bienes y servicios regulados:</b> no utilices el blog para vender ni para facilitar la venta de bienes y servicios regulados como alcohol, juegos de apuestas, productos farmacéuticos y suplementos no aprobados, tabaco, fuegos artificiales, armas o dispositivos médicos o sanitarios.
</p>

<p>
  <b>Spam:</b> el spam puede tomar diversas formas en el blog, pero todas ellas pueden provocar la eliminación de tu cuenta o de tu blog. Por ejemplo: no crees un blog diseñado para atraer tráfico a tu sitio web ni para colocarlo en las primeras posiciones de las búsquedas, no publiques comentarios en otros blogs solo para promocionar tu sitio o tu producto, ni utilices los contenidos de otras fuentes con ánimo de lucrarte o de conseguir otros beneficios personales.
</p>

<p>
  <b>Software malintencionado y virus:</b> no crees blogs que transmitan virus, que generen ventanas emergentes, que intenten instalar software sin el consentimiento del lector ni que afecten de alguna otra forma a los lectores con código o con secuencias de comandos malintencionados. Esas prácticas están terminantemente prohibidas.
</p>

<h3>Aplicación de la política de contenidos de blog</h3>

<p>
  Por favor, avísanos siempre que sospeches que se infringen nuestras políticas
</p>
<p>
  
Nuestro equipo estudia los informes que nos envían los usuarios sobre infracciones de nuestra política. Si el blog no infringe nuestras políticas, no tomamos ninguna medida contra el blog ni contra su propietario. Si decidimos que un blog sí que infringe nuestras políticas sobre contenidos, y según la gravedad de la infracción, tomamos una o varias de estas medidas:
</p>

<p>
  También podemos tomar cualquiera de las medidas descritas más arriba si vemos que un usuario ha creado varios blogs con el fin de hacer un uso inadecuado reiteradas veces. Si te hemos inhabilitado un blog, no crees otro que se dedique a una actividad similar para sustituirlo.
</p>
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Modal -->