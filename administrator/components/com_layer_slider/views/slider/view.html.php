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
 * View to edit
 */
class Layer_sliderViewSlider extends JViewLegacy
{
	protected $state;
	protected $item;
	protected $form;
	public $slname;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
	
/*		$this->state	= $this->get('State');
		$this->item		= $this->get('Item');
		$this->form		= $this->get('Form');*/

    if(!$GLOBALS['j25']) { 
      echo '<img alt="Offlajn & Kreatura Media" src="components/com_layer_slider/assets/images/common-logo.png" style="position: absolute; top: 34px; right: 21px;">';
    }
    require_once JPATH_COMPONENT.'/base/wp/layerslider.php';
    require_once JPATH_COMPONENT.'/base/wp/compatibility.php';
    require_once JPATH_COMPONENT.'/base/views/slider_edit.php';
    $this->slname = $slider['properties']['title'];
		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
		}

		$this->addToolbar();
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 */
	protected function addToolbar()
	{
		JFactory::getApplication()->input->set('hidemainmenu', true);

		$user		= JFactory::getUser();
		$isNew		= true;
        if (isset($this->item->checked_out)) {
		    $checkedOut	= !($this->item->checked_out == 0 || $this->item->checked_out == $user->get('id'));
        } else {
            $checkedOut = false;
        }
		$canDo		= Layer_sliderHelper::getActions();

/*		JToolBarHelper::title(JText::_($this->slname), 'slider.png');

		// If not checked out, can save the item.
		if (!$checkedOut && ($canDo->get('core.edit')||($canDo->get('core.create'))))
		{

			JToolBarHelper::apply('slider.apply', 'JTOOLBAR_APPLY');
			JToolBarHelper::save('slider.save', 'JTOOLBAR_SAVE');
		}
		if (!$checkedOut && ($canDo->get('core.create'))){
			JToolBarHelper::custom('slider.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
		}
		// If an existing item, can save to a copy.
		if (!$isNew && $canDo->get('core.create')) {
			JToolBarHelper::custom('slider.save2copy', 'save-copy.png', 'save-copy_f2.png', 'JTOOLBAR_SAVE_AS_COPY', false);
		}
		if (empty($this->item->id)) {
			JToolBarHelper::cancel('slider.cancel', 'JTOOLBAR_CANCEL');
		}
		else {
			JToolBarHelper::cancel('slider.cancel', 'JTOOLBAR_CLOSE');
		}*/

	}
}
