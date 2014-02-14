<?php
// Stoping from executed directly
defined('_JEXEC') or die;

// Check to see if user has manage permissions
// JFactory::getUser function get details on user
// authorise function that checks if user can manage this extesion ('com_folio')
if (!JFactory::getUser()->authorise('core.manage', 'com_folio'))
{
	// If user does not ahve acces, user gets an 404 error
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// Creates an instance of JControllerLegacy
// By doing this we will get a prefix for all the classses
// Since the component will have more then one page, we have a "task" input that -
// determines what the component is going to do next 
$controller = JControllerLegacy::getInstance('Folio');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
