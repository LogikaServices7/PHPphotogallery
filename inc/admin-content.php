<section class="review">
	<div class="section-header center">
		<hl>Welcome! <?php echo ucfirst($adminSession); ?></hl>
	</div>
	<div class="container">
		<div class="row">
			<div id="unapproved_pics">
				<?php get_unapproved_pics(); ?>
			</div>
		</div>
	</div>
</section>