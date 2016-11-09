<?php
/**
* @package      EasyBlog
* @copyright    Copyright (C) 2010 - 2014 Stack Ideas Sdn Bhd. All rights reserved.
* @license      GNU/GPL, see LICENSE.php
* EasySocial is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<div class="input-group date" data-date-picker-<?php echo $hash;?>>
    <input type="text" class="form-control" name="<?php echo $name;?>" value="<?php echo $this->html('string.escape', $value);?>" />
    <span class="input-group-addon">
        <i class="fa fa-calendar"></i>
    </span>
</div>