<?php
/**
* @package		EasyBlog
* @copyright	Copyright (C) 2010 - 2014 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasySocial is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');

class EasyBlogAvatarKunena
{
	public function exists()
	{
		$file = JPATH_ROOT . '/components/com_kunena/kunena.php';

		if (!JFile::exists($files)) {
			return false;
		}

		return true;
	}

	public function getAvatar($profile)
	{
		$user = KunenaFactory::getUser($profile->id);

		$avatar = $user->getAvatarURL('kavatar');

    	return $avatar;
	}
}