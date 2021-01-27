<?php
// This file is part of Moodle - http://moodle.org/
//

/**
 * Photo config.
 *
 * @package   theme_photo
 * @copyright 2016 Damyon Wiese
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// This line protects the file from being accessed by a URL directly.
defined('MOODLE_INTERNAL') || die();

// $THEME is defined before this page is included and we can define settings by adding properties to this global object.

$THEME->name = 'photo';

$THEME->sheets = [];

// This is a setting that can be used to provide some styling to the content in the TinyMCE text editor. This is no longer the default text editor and "Atto" does not need this setting so we won't provide anything. If we did it would work the same as the previous setting - listing a file in the /styles/ folder.
$THEME->editor_sheets = [];

$THEME->parents = ['boost'];

// A dock is a way to take blocks out of the page and put them in a persistent floating area on the side of the page. Boost does not support a dock so we won't either - but look at bootstrapbase for an example of a theme with a dock.
$THEME->enable_dock = false;

// This is an old setting used to load specific CSS for some YUI JS. We don't need it in Boost based themes because Boost provides default styling for the YUI modules that we use. It is not recommended to use this setting anymore.
$THEME->yuicssmodules = array();

// Most themes will use this rendererfactory as this is the one that allows the theme to override any other renderer.
$THEME->rendererfactory = 'theme_overridden_renderer_factory';

// This is a list of blocks that are required to exist on all pages for this theme to function correctly. For example bootstrap base requires the settings and navigation blocks because otherwise there would be no way to navigate to all the pages in Moodle. Boost does not require these blocks because it provides other ways to navigate built into the theme.
$THEME->requiredblocks = '';

// This is a feature that tells the blocks library not to use the "Add a block" block. We don't want this in boost based themes because it forces a block region into the page when editing is enabled and it takes up too much room.
$THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_FLATNAV;
// This is the function that returns the SCSS source for the main file in our theme. We override the boost version because we want to allow presets uploaded to our own theme file area to be selected in the preset list.
$THEME->scss = function($theme) {
    return theme_photo_get_main_scss_content($theme);
};