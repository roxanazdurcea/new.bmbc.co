<?php
/**
* @package		EasyBlog
* @copyright	Copyright (C) 2010 Stack Ideas Private Limited. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Restricted access');

require_once(JPATH_COMPONENT . '/views/views.php');

class EasyBlogViewEntry extends EasyBlogView
{
	function display( $tmpl = null )
	{


		JPluginHelper::importPlugin( 'easyblog' );
		$dispatcher = JDispatcher::getInstance();
		$mainframe	= JFactory::getApplication();
		$document	= JFactory::getDocument();
		$config = EasyBlogHelper::getConfig();

		//for trigger
		$params		= $mainframe->getParams('com_easyblog');

		$joomlaVersion = EasyBlogHelper::getJoomlaVersion();

	    $blogId = $this->input->get('id', 0, 'int');
	    if (empty($blogId)) {
			return JError::raiseError( 404, JText::_('COM_EASYBLOG_BLOG_NOT_FOUND') );
		}

	    $my 	= JFactory::getUser();

	    $blog	= EB::table('Blog');
	    $blog->load($blogId);

	    $post = EB::post($blogId);

		// Check if blog is password protected.
		$protected = $this->isProtected($post);

		if ($protected !== false) {
			return;
		}

		// If the blog post is already deleted, we shouldn't let it to be accessible at all.
		if ($post->isTrashed()) {
			return JError::raiseError(404, JText::_('COM_EASYBLOG_ENTRY_BLOG_NOT_FOUND'));
		}

		// Check if the blog post is trashed
		if (!$post->isPublished() && $this->my->id != $post->created_by && !EB::isSiteAdmin()) {
			return JError::raiseError(404, JText::_('COM_EASYBLOG_ENTRY_BLOG_NOT_FOUND'));
		}

		// Check for team's privacy
		$allowed = $this->checkTeamPrivacy($post);

		if ($allowed === false) {
			return JError::raiseError(404, JText::_('COM_EASYBLOG_TEAMBLOG_MEMBERS_ONLY'));
		}

		// Check if the blog post is accessible.
		$accessible = $post->isAccessible();

		if (!$accessible->allowed) {
			echo $accessible->error;

			return;
		}

		// Format the post
		$post = EB::formatter('entry', $post);

		$theme 	= EB::template();
		$theme->set('post', $post);

		$blogHtml	= $theme->output( 'site/blogs/entry/pdf' );


		$pageTitle	= EasyBlogHelper::getPageTitle($config->get('main_title'));
	    $document->setTitle( $post->title . $pageTitle );
		$document->setName($post->getPermalink());

		// Fix phoca pdf plugin.
		if( method_exists( $document , 'setArticleText' ) )
		{
			$document->setArticleText( $blogHtml );
		}

		echo $blogHtml;
	}
}
