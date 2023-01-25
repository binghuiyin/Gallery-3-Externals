<?php defined("SYSPATH") or die("No direct script access.");
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

class externals_Core {

  static function externals_link() {
	$block_id = $_GET['block_id'];
    switch ($block_id) {
    case "random_photo":
		do {
			$item = item::random_query(array(array("type", "!=", "album")))->find_all(1)->current();
		  } while (!$item && $attempts++ < 3);
		  if ($item && $item->loaded()) {
			$externals = new View("externals.html");
			$externals->item = $item;
			$externals->exif = exif::get($item);
			
		  }
	
		return $externals;
    break;
    case "random_album":
		do {
			$item = item::random_query(array(array("type", "=", "album")))->find_all(1)->current();
		  } while (!$item && $attempts++ < 3);
		  if ($item && $item->loaded()) {
			$externals = new View("externals.html");
			$externals->item = $item;
			
		  }
	
		return $externals;
    break;
    case "latest_photo":
		$item = ORM::factory("item")
		->viewable()
		->where("type", "!=", "album")
		->order_by("created", "DESC")
		->find();
		$exif = ORM::factory("exif_record")
		  ->where("item_id", "=", $item->id)
		  ->find();
		$latestimg = new View("externals.html");
		$latestimg->item = $item;
		$latestimg->exif = exif::get($item);
	
		return $latestimg;
      break;
    case "latest_album":
		$item = ORM::factory("item")
		->viewable()
		->where("type", "=", "album")
		->where("parent_id", "!=", "0")
		->order_by("created", "DESC")
		->find();
		
		$latestalb = new View("externals.html");
		$latestalb->item = $item;
	
		return $latestalb;
      break;
    }

  }

}
