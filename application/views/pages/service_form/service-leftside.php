<?php $urlid = base64_decode($this->uri->segment(2)); ?>
<h5 class="heading_s">Services List </h5>
<ul class="list-group">
<?php foreach($serviceslist as $serviceslistInfo) { ?>
	<li class="list-group-item  <?php if($urlid==$serviceslistInfo['id']) { echo 'serviceactive';} ?>">
	<?php if($serviceslistInfo['id']==12){ ?>
	<a href="<?php echo base_url();?>jobs"><?php echo $serviceslistInfo['name'];?></a>
	<?php } else{?>
	<a href="<?php echo base_url();?>buyservices/<?php echo base64_encode($serviceslistInfo['id']);?>"><?php echo $serviceslistInfo['name'];?></a><?php } ?>
	
	</li>
<?php } ?>
</ul>
	