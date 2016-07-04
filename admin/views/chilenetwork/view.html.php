<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_chilenetwork
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die;

/**
 * ChileNetwork View
 *
 * @since  1.0.0
 */
class ChileNetworkViewChileNetwork extends JViewLegacy
{
	/**
	 * View form
	 *
	 * @var form
	 */
	protected $form = null;

	/**
	 * Display the ChileNetwork view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	public function display($tpl = null)
	{
		// Get the Data
		$form = $this->get('Form');
		$item = $this->get('Item');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}

		// Assign the Data
		$this->form = $form;
		$this->item = $item;

		// Set the toolbar
		$this->addToolBar();

		// Display the template
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	protected function addToolBar()
	{
		$input = JFactory::getApplication()->input;

		// Hide Joomla Administrator Main menu
		$input->set('hidemainmenu', true);

		$isNew = ($this->item->id == 0);

		if ($isNew)
		{
			$title = JText::_('COM_CHILENETWORK_MANAGER_CHILENETWORK_NEW');
		}
		else
		{
			$title = JText::_('COM_CHILENETWORK_MANAGER_CHILENETWORK_EDIT');
		}

		JToolBarHelper::title($title, 'chilenetwork');
		JToolBarHelper::save('chilenetwork.save');
		JToolBarHelper::cancel('chilenetwork.cancel' , $isNew? 'JTOOLBAR_CANCEL':'JTOOLBAR_CLOSE' );
	}
}