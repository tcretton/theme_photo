<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version. 
// Moodle is distributed in the hope that it will be useful, // but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.
// You should have received a copy of the GNU General Public License along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Photo config.
 *
 * @package   theme_photo
 * @copyright 2016 Damyon Wiese
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Esta linha protege o arquivo de ser acessado diretamente por uma URL.
defined('MOODLE_INTERNAL') || die();

// $THEME é definido antes que esta página seja carregada e podemos definir as configurações adicionando propriedades a este objeto global.

// A primeira configuração de que precisamos é o nome do tema. Esta deve ser a última parte do nome do componente e igual ao nome do diretório do nosso tema.
$THEME->name = 'photo';

// This setting list the style sheets we want to include in our theme. Because we want to use SCSS instead of CSS - we won't list any style sheets. If we did we would list the name of a file in the /styles/ folder for our theme without any css file extensions.
// Esta configuração lista as folhas de estilo que queremos incluir em nosso tema. Porque queremos usar SCSS em vez de CSS - não listaremos nenhuma folha de estilo. Se o fizéssemos, listaríamos o nome de um arquivo na pasta / styles / do nosso tema sem nenhuma extensão de arquivo css.
$THEME->sheets = [];

// This is a setting that can be used to provide some styling to the content in the TinyMCE text editor. This is no longer the default text editor and "Atto" does not need this setting so we won't provide anything. If we did it would work the same as the previous setting - listing a file in the /styles/ folder.
// Esta é uma configuração que pode ser usada para fornecer algum estilo ao conteúdo no editor de texto TinyMCE. Este não é mais o editor de texto padrão e "Atto" não precisa dessa configuração, portanto, não forneceremos nada. Se fizéssemos, funcionaria da mesma forma que a configuração anterior - listar um arquivo na pasta / styles /.
$THEME->editor_sheets = [];

// This is a critical setting. We want to inherit from theme_boost because it provides a great starting point for SCSS bootstrap4 themes. We could add more than one parent here to inherit from multiple parents, and if we did they would be processed in order of importance (later themes overriding earlier ones). Things we will inherit from the parent theme include styles and mustache templates and some (not all) settings.
// Este é uma configuração importante. Queremos herdar de theme_boost porque ele fornece um ótimo ponto de partida para temas SCSS bootstrap4. As coisas que herdaremos do tema pai incluem estilos e modelos de bigode e algumas (não todas) configurações.
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
// Este é um recurso que diz à biblioteca de blocos para não usar o bloco "Adicionar um bloco". Não queremos isso em temas baseados em boost porque força uma região de bloco na página quando a edição está habilitada e ocupa muito espaço.
$THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_FLATNAV;

// This is the function that returns the SCSS source for the main file in our theme. We override the boost version because we want to allow presets uploaded to our own theme file area to be selected in the preset list.
$THEME->scss = function($theme) {
    return theme_photo_get_main_scss_content($theme);
};