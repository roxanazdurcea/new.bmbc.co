<?php
/*-------------------------------------------------------------------------
# com_layer_slider - com_layer_slider
# -------------------------------------------------------------------------
# @ author    John Gera, George Krupa, Janos Biro
# @ copyright Copyright (C) 2014 Offlajn.com  All Rights Reserved.
# @ license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# @ website   http://www.offlajn.com
-------------------------------------------------------------------------*/
?><?php
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View class for a list of Layer_slider.
 */
class Layer_sliderViewTransitionBuilder extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $state;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
    require_once JPATH_COMPONENT.'/helpers/layer_slider.php';
    require_once JPATH_COMPONENT.'/base/wp/compatibility.php';
    require_once JPATH_COMPONENT.'/base/views/transition_builder.php';
	  $this->addToolbar();
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @since	1.6
	 */
	protected function addToolbar()
	{

		$state	= $this->get('State');

		JToolBarHelper::title('<img width="33" src="https://d2mdw063ttlqtq.cloudfront.net/files/68738609/kmlogo.png" class="" alt="kreatura">');
     
	}
    
	protected function getSortFields()
	{
		return array(
		);
	}

    
}
