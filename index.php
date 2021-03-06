<?php
namespace Webtrees;

/**
 * webtrees: online genealogy
 * Copyright (C) 2015 webtrees development team
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Defined in session.php
 *
 * @global Tree $WT_TREE
 */

define('WT_SCRIPT_NAME', 'index.php');
require './includes/session.php';

// The only option for action is "ajax"
$action = Filter::get('action');

// The default view depends on whether we are logged in
if (Auth::check()) {
	$ctype = Filter::get('ctype', 'gedcom|user', 'user');
} else {
	$ctype = 'gedcom';
}

// Get the blocks list
if ($ctype === 'user') {
	$blocks = get_user_blocks(Auth::id());
} else {
	$blocks = get_gedcom_blocks(WT_GED_ID);
}

$all_blocks = Module::getActiveBlocks();

// The latest version is shown on the administration page.  This updates it every day.
fetch_latest_version();

// We generate individual blocks using AJAX
if ($action === 'ajax') {
	$controller = new AjaxController;
	$controller->pageHeader();

	// Check we’re displaying an allowable block.
	$block_id = Filter::getInteger('block_id');
	if (array_key_exists($block_id, $blocks['main'])) {
		$module_name = $blocks['main'][$block_id];
	} elseif (array_key_exists($block_id, $blocks['side'])) {
		$module_name = $blocks['side'][$block_id];
	} else {
		
		return;
	}
	if (array_key_exists($module_name, $all_blocks)) {
		$class_name = 'Webtrees\\' . $module_name . '_WT_Module';
		$module     = new $class_name;
		echo $module->getBlock($block_id);
	}
	if (WT_DEBUG_SQL) {
		echo Database::getQueryLog();
	}
	
	return;
}

$controller = new PageController;
if ($ctype === 'user') {
	$controller->restrictAccess(Auth::check());
}
$controller
	->setPageTitle($ctype === 'user' ? I18N::translate('My page') : WT_TREE_TITLE)
	->setMetaRobots('index,follow')
	->setCanonicalUrl(WT_SCRIPT_NAME . '?ctype=' . $ctype . '&amp;ged=' . WT_GEDCOM)
	->pageHeader()
	// By default jQuery modifies AJAX URLs to disable caching, causing JS libraries to be loaded many times.
	->addInlineJavascript('jQuery.ajaxSetup({cache:true});');

if ($ctype === 'user') {
	echo '<div id="my-page">';
	echo '<h1 class="center">', I18N::translate('My page'), '</h1>';
} else {
	echo '<div id="home-page">';
}
if ($blocks['main']) {
	if ($blocks['side']) {
		echo '<div id="index_main_blocks">';
	} else {
		echo '<div id="index_full_blocks">';
	}
	foreach ($blocks['main'] as $block_id => $module_name) {
		$class_name = 'Webtrees\\' . $module_name . '_WT_Module';
		$module     = new $class_name;
		if ($SEARCH_SPIDER || !$module->loadAjax()) {
			// Load the block directly
			echo $module->getBlock($block_id);
		} else {
			// Load the block asynchronously
			echo '<div id="block_', $block_id, '"><div class="loading-image">&nbsp;</div></div>';
			$controller->addInlineJavascript(
				'jQuery("#block_' . $block_id . '").load("index.php?ctype=' . $ctype . '&action=ajax&block_id=' . $block_id . '");'
			);
		}
	}
	echo '</div>';
}
if ($blocks['side']) {
	if ($blocks['main']) {
		echo '<div id="index_small_blocks">';
	} else {
		echo '<div id="index_full_blocks">';
	}
	foreach ($blocks['side'] as $block_id => $module_name) {
		$class_name = 'Webtrees\\' . $module_name . '_WT_Module';
		$module     = new $class_name;
		if ($SEARCH_SPIDER || !$module->loadAjax()) {
			// Load the block directly
			echo $module->getBlock($block_id);
		} else {
			// Load the block asynchronously
			echo '<div id="block_', $block_id, '"><div class="loading-image">&nbsp;</div></div>';
			$controller->addInlineJavascript(
				'jQuery("#block_' . $block_id . '").load("index.php?ctype=' . $ctype . '&action=ajax&block_id=' . $block_id . '");'
			);
		}
	}
	echo '</div>';
}

echo '<div id="link_change_blocks">';

if ($ctype === 'user') {
	echo '<a href="index_edit.php?user_id=' . Auth::id() . '">', I18N::translate('Change the blocks on this page'), '</a>';
} elseif ($ctype === 'gedcom' && WT_USER_GEDCOM_ADMIN) {
	echo '<a href="index_edit.php?gedcom_id=' . WT_GED_ID . '">', I18N::translate('Change the blocks on this page'), '</a>';
}

if ($WT_TREE->getPreference('SHOW_COUNTER')) {
	echo '<span>' . I18N::translate('Hit count:') . ' ' . $hitCount . '</span>';
}

echo '</div></div>';
