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
?>
<blockquote class="eb-quote <?php echo $data->style; ?>">
    <p contenteditable="true"><?php echo JText::_('COM_EASYBLOG_BLOCKS_QUOTES_CONTENT'); ?></p>
    <cite contenteditable="true"><?php echo JText::_('COM_EASYBLOG_BLOCKS_QUOTES_AUTHOR');?></cite>
</blockquote>
