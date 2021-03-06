<?php
/**
* @package      EasyBlog
* @copyright    Copyright (C) 2010 - 2015 Stack Ideas Sdn Bhd. All rights reserved.
* @license      GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');

require_once(JPATH_COMPONENT . '/views/views.php');

class EasyBlogViewSearch extends EasyBlogView
{
    /**
     * Allows caller to search for posts
     *
     * @since   5.0
     * @access  public
     * @param   string
     * @return
     */
	public function search()
	{
        $query = $this->input->get('query', '', 'word');

        $model = EB::model('Search');
        $result = $model->searchText($query);

        if (!$result) {
            return $this->ajax->resolve($result);
        }

        $posts = array();

        foreach ($result as $item) {
            $post = EB::post();
            $post->bind($item, array('force' => true));

            // Set a formatted date
            $post->formattedDate = EB::date($post->created)->format(JText::_('DATE_FORMAT_LC2'));
            $post->intro = $post->getIntro(true);

            $post->permalink = $post->getExternalPermalink();

            $posts[] = $post;
        }

        $theme = EB::template();
        $theme->set('posts', $posts);

        $output = $theme->output('site/composer/posts/post');

        return $this->ajax->resolve($output);
	}
}
