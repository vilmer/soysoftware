
<section class="myportada" style="background-image: url(<?php echo base_url('assets/images/portada.png'); ?>);"><br>

</section>
<a href="<?php echo site_url('Soy_soysoftware/index'); ?>" class="btn btn-outline-default btn-rounded waves-effect btn-sm pull-right"> <i class="fa fa-home"></i> Inicio</a>
<section class="news" id="soy_start">
  <div class="container">
    <div class="row">

    	<div class="col-lg-12 col-md-12 col-xs-12">
    	<center>
    	<h2 class="section-title" style="text-transform: none;"><b style="color: #fc0079">Opps,,</b>algo salio mal.</h2>
    		<img src="<?php echo base_url('assets/images/computer.png'); ?>" alt="" height="" width="" class="img-responsive">
    	</center>
    	</div>
    </div>
    
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
<!-- end news -->

<?php if ($this->session->flashdata('msjError')): ?>
  <script>
    alertify.success("<?php echo $this->session->flashdata('msjError'); ?>");
  </script>
<?php endif ?>