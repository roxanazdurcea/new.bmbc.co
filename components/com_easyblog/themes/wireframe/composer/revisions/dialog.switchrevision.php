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
<dialog>
    <width>400</width>
    <height>120</height>
    <selectors type="json">
    {
        "{closeButton}" : "[data-close-button]",
        "{form}" : "[data-form-response]",
        "{submitButton}" : "[data-submit-button]"
    }
    </selectors>
    <bindings type="javascript">
    {
        "{closeButton} click": function()
        {
            this.parent.close();
        },
        "{submitButton} click": function()
        {
            this.form().submit();
        }
    }
    </bindings>
    <title><?php echo JText::_('COM_EASYBLOG_COMPOSER_SWITCH_REVISION_TITLE'); ?></title>
    <content>
        <p><?php echo JText::_('COM_EASYBLOG_COMPOSER_SWITCH_REVISION_CONTENT');?></p>

        <form action="<?php echo JRoute::_('index.php');?>" method="post" data-form-response>
            <input type="hidden" name="task" value="posts.useRevision" />
            <input type="hidden" name="uid" value="<?php echo $post->uid;?>" />
            <input type="hidden" name="tmpl" value="component" />
            <?php echo $this->html('form.token'); ?>
        </form>

    </content>
    <buttons>
        <button data-close-button type="button" class="btn btn-default btn-sm"><?php echo JText::_('COM_EASYBLOG_CLOSE_BUTTON'); ?></button>
        <button data-submit-button type="button" class="btn btn-primary btn-sm"><?php echo JText::_('COM_EASYBLOG_SWITCH_BUTTON'); ?></button>
    </buttons>
</dialog>
