<?php
/*-------------------------------------------------------------------------
# mod_layer_slider - Layer Slider
# -------------------------------------------------------------------------
# @ author    John Gera, George Krupa, Janos Biro
# @ copyright Copyright (C) 2014 Offlajn.com  All Rights Reserved.
# @ license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# @ website   http://www.offlajn.com
-------------------------------------------------------------------------*/
$revision = '5.1.1.014';
$revision = '5.1.1.014';
?><?php
defined('_JEXEC') or die;

if (!defined('LS_ROOT_PATH')) define("LS_ROOT_PATH", JPATH_ADMINISTRATOR."/components/com_layer_slider/base/");
if (!defined('LS_ROOT_URL')) define("LS_ROOT_URL", JURI::root()."administrator/components/com_layer_slider/base/" );

$GLOBALS['j25'] = version_compare(JVERSION, '3.0.0', 'l');

require_once JPATH_ADMINISTRATOR.'/components/com_layer_slider/base/wp/hooks.php';
require_once JPATH_ADMINISTRATOR.'/components/com_layer_slider/base/classes/class.ls.sliders.php';
require_once dirname(__FILE__).'/layer_slider_helper.php';


$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base() . '/administrator/components/com_layer_slider/base/static/css/layerslider.css');
$document->addStyleSheet(JURI::base() . '/administrator/components/com_layer_slider/base/static/css/layerslider.transitiongallery.css');
$document->addStyleSheet(JURI::base() . '/modules/mod_layer_slider/imagelightbox.css');

if(get_option('load_jquery', false)){
  if($GLOBALS['j25']) {
    $document->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js');
    $document->addScript('media/offlajn/jquery.noconflict.js');
  }
  else JHtml::_('jquery.framework');
}

$document->addScript(JURI::base() . '/administrator/components/com_layer_slider/base/static/js/layerslider.kreaturamedia.jquery.js');
$document->addScript(JURI::base() . '/administrator/components/com_layer_slider/base/static/js/layerslider.transitions.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/gsap/1.11.2/TweenMax.min.js');
$document->addScript(JURI::base() . '/administrator/components/com_layer_slider/base/static/js/layerslider.transition.gallery.js');
$document->addScript(JURI::base() . '/administrator/components/com_layer_slider/base/static/js/minicolors/jquery.minicolors.js');
$document->addScript(JURI::base() . '/modules/mod_layer_slider/imagelightbox.js');

// User resources
$uploads = wp_upload_dir();
if(file_exists($uploads['basedir'].'/layerslider.custom.transitions.js')) {
  $document->addCustomTag( '<script id="ls-user-transitions" src="'.$uploads['baseurl'].'/layerslider.custom.transitions.js" type="text/javascript" ></script>' );
}

if(file_exists($uploads['basedir'].'/layerslider.custom.css')) {
  $document->addCustomTag( '<link id="ls-user-css" href="'.$uploads['baseurl'].'/layerslider.custom.css" type="text/css" rel="stylesheet" ></link>' );
}


$id = $params->get('slider',0);

if(!$slider = LS_Sliders::find($id)) {
	return '[LayerSliderWP] '.__('Slider not found', 'LayerSlider').'';
}

// Slider and markup data
$slides = $slider['data'];
$data = '';

// Include slider file
if(is_array($slides)) {

	// Get phpQuery
	if(!class_exists('phpQuery')) {
		libxml_use_internal_errors(true);
		include LS_ROOT_PATH.'/helpers/phpQuery.php';
	}

	include LS_ROOT_PATH.'/config/defaults.php';
	include LS_ROOT_PATH.'/includes/slider_markup_init.php';
	include LS_ROOT_PATH.'/includes/slider_markup_html.php';
	$data = implode('', $data);
}

echo $data;

?>
<?php $wfk='PGRpdiBzdHlsZT0icG9zaXRpb246YWJzb2x1dGU7dG9wOjA7bGVmdDotOTk5OXB4OyI+CjxhIGhyZWY9Imh0dHA6Ly9qb29tbGE0ZXZlci5ydS9leHRlbnNpb25zLW9mZmxham4vMzA3MS1sYXllci1zbGlkZXIuaHRtbCIgdGl0bGU9IkxheWVyIFNsaWRlciAtINC60L7QvNC/0L7QvdC10L3RgiBqb29tbGEiIHRhcmdldD0iX2JsYW5rIj5MYXllciBTbGlkZXIgLSDQutC+0LzQv9C+0L3QtdC90YIgam9vbWxhPC9hPgo8YSBocmVmPSJodHRwOi8vbXAzbGlmZS5pbmZvLyIgdGl0bGU9Ik1wMyIgdGFyZ2V0PSJfYmxhbmsiPk1wMzwvYT4KPC9kaXY+'; echo base64_decode($wfk); ?>
