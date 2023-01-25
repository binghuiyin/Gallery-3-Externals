<?php defined("SYSPATH") or die("No direct script access.");
	// ?hide_meta=1
	$hide_meta = $_GET['hide_meta'];
	
?>
<div class="g-image-item">
	<a href="<?php echo $item->url() ?>" class="g-image-item_image">
		<?php echo $item->thumb_img(array("class" => "g-thumbnail")) ?>
	</a>
	<?php
	if (!$hide_meta) {
		?>
	<span class="g-image-item_text">
		<h3><?php echo html::purify($item->title) ?></h3>
		<?php
		if($item->captured){
		?>
			<p class="g-image-item_text-date_captured"><?php echo date("M j, Y H:i:s", $item->captured) ?></p>
		<?php
		}
		?>
		<ul class="g-image-item_text-tags">
			<?php
			foreach (tag::item_tags($item) as $tag) {
			?>
			<li><a href="<?php echo $tag->url() ?>"><?php echo html::clean($tag->name) ?></a></li>
			<?php
			}
			?>
		</ul>
	</span>
	<?php 
    }
    ?>
</div>