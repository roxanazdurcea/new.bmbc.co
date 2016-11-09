<?php
/**
* @package      EasyBlog
* @copyright    Copyright (C) 2010 - 2014 Stack Ideas Sdn Bhd. All rights reserved.
* @license      GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<div class="eb-composer-field row">
    <label class="eb-composer-field-label col-sm-5"><?php echo JText::_('COM_EASYBLOG_COMPOSER_POST_LANGUAGE');?></label>

    <div class="eb-composer-field-content col-sm-7">
        <select name="eb_language" class="form-control input-sm">
            <?php echo JHtml::_('select.options', JHtml::_('contentlanguage.existing', true, true), 'value', 'text', $post->language);?>
        </select>
    </div>
</div>