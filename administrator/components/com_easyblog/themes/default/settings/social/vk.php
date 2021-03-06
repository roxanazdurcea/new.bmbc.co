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
?>
<div class="row">
	<div class="col-lg-6">
		<div class="panel">
			<div class="panel-head">
            	<b><?php echo JText::_('COM_EASYBLOG_SETTINGS_VK');?></b>
            </div>

            <div class="panel-body">
	            <?php echo $this->html('settings.toggle', 'main_vk', 'COM_EASYBLOG_SETTINGS_VK_ENABLE'); ?>
	            <?php echo $this->html('settings.toggle', 'main_vk_frontpage', 'COM_EASYBLOG_SETTINGS_SOCIALSHARE_SHOW_ON_FRONTPAGE'); ?>
                <?php echo $this->html('settings.text', 'main_vk_api', 'COM_EASYBLOG_SETTINGS_VK_API_ID'); ?>
	        </div>
		</div>
	</div>
</div>