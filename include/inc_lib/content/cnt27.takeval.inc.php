<?php
/**
 * phpwcms content management system
 *
 * @author Oliver Georgi <og@phpwcms.org>
 * @copyright Copyright (c) 2002-2025, Oliver Georgi
 * @license http://opensource.org/licenses/GPL-2.0 GNU GPL-2
 * @link http://www.phpwcms.org
 *
 **/


// ----------------------------------------------------------------
// obligate check for phpwcms constants
if (!defined('PHPWCMS_ROOT')) {
	die("You Cannot Access This Script Directly, Have a Nice Day.");
}
// ----------------------------------------------------------------

// Content Type Text with Image
$content["faq_question"]		= $row["acontent_text"];
$content["faq_answer"]			= $row["acontent_html"];
$content["faq"]					= unserialize($row['acontent_form'], ['allowed_classes' => false]);

// 0   :1       :2   :3        :4    :5     :6      :7       :8
// dbid:filename:hash:extension:width:height:caption:position:zoom
$content["image_info"]			= explode(":", $row["acontent_image"]);

$content["image_id"]			= $content["image_info"][0];
$content["image_name"]			= $content["image_info"][1] ?? '';

$content["image_hash"]			= $content["image_info"][2] ?? '';
$content["image_ext"]			= $content["image_info"][3] ?? '';

$content["image_width"]			= $content["image_info"][4] ?? '';
$content["image_height"]		= $content["image_info"][5] ?? '';

$content["image_caption"]		= isset($content["image_info"][6]) ? base64_decode($content["image_info"][6]) : '';

$content["image_pos"]			= $content["image_info"][7] ?? 0;
$content["image_zoom"]			= $content["image_info"][8] ?? 0;

unset($content["image_info"]);
