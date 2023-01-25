<?php

/**
 * G3 Grey Theme - a custom theme for Gallery 3
 * This theme is designed and built by David Yin, https://www.yinfor.com
 * Copyright (C) 2023 David Yin
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or (at
 * your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street - Fifth Floor, Boston, MA  02110-1301, USA.
 */


defined("SYSPATH") or die("No direct script access.");
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