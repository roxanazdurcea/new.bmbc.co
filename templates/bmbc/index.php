<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$user = JFactory::getUser();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Output as HTML5
$doc->setHtml5(true);

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option = $app->input->getCmd('option', '');
$view = $app->input->getCmd('view', '');
$layout = $app->input->getCmd('layout', '');
$task = $app->input->getCmd('task', '');
$itemid = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

if ($task == "edit" || $layout == "form") {
    $fullWidth = 1;
} else {
    $fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

$doc->addScriptVersion($this->baseurl . '/templates/' . $this->template . '/js/template.js');
$doc->addScriptVersion($this->baseurl . '/templates/' . $this->template . '/js/bmbc.js');

// Add Stylesheets
$doc->addStyleSheetVersion($this->baseurl . '/templates/' . $this->template . '/css/template.css');
$doc->addStyleSheetVersion($this->baseurl . '/templates/' . $this->template . '/css/bmbc.css');

// Use of Google Font
if ($this->params->get('googleFont')) {
    $doc->addStyleSheet('//fonts.googleapis.com/css?family=' . $this->params->get('googleFontName'));
    $doc->addStyleDeclaration("
	h1, h2, h3, h4, h5, h6, .site-title {
		font-family: '" . str_replace('+', ' ', $this->params->get('googleFontName')) . "', sans-serif;
	}");
}

// Template color
if ($this->params->get('templateColor')) {
    $doc->addStyleDeclaration("
	body.site {
		border-top: 3px solid " . $this->params->get('templateColor') . ";
		background-color: " . $this->params->get('templateBackgroundColor') . ";
	}
	a {
		color: " . $this->params->get('templateColor') . ";
	}
	.nav-list > .active > a,
	.nav-list > .active > a:hover,
	.dropdown-menu li > a:hover,
	.dropdown-menu .active > a,
	.dropdown-menu .active > a:hover,
	.nav-pills > .active > a,
	.nav-pills > .active > a:hover,
	.btn-primary {
		background: " . $this->params->get('templateColor') . ";
	}");
}

// Check for a custom CSS file
$userCss = JPATH_SITE . '/templates/' . $this->template . '/css/user.css';

if (file_exists($userCss) && filesize($userCss) > 0) {
    $this->addStyleSheetVersion($this->baseurl . '/templates/' . $this->template . '/css/user.css');
}

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Adjusting content width
if ($this->countModules('position-7') && $this->countModules('position-8')) {
    $span = "span6";
} elseif ($this->countModules('position-7') && !$this->countModules('position-8')) {
    $span = "span9";
} elseif (!$this->countModules('position-7') && $this->countModules('position-8')) {
    $span = "span9";
} else {
    $span = "span12";
}

// Logo file or site title param
if ($this->params->get('logoFile')) {
    $logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
} elseif ($this->params->get('sitetitle')) {
    $logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($this->params->get('sitetitle'), ENT_COMPAT, 'UTF-8') . '</span>';
} else {
    $logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <jdoc:include type="head"/>
    <!--[if lt IE 9]>
    <script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script><![endif]-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.0.4/js/bootstrap-tab.js"></script>


    <!-- slick -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>


    <!-- google analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-64304633-1', 'auto');
        ga('send', 'pageview');

    </script>



</head>
<body class="site <?php echo $option
    . ' view-' . $view
    . ($layout ? ' layout-' . $layout : ' no-layout')
    . ($task ? ' task-' . $task : ' no-task')
    . ($itemid ? ' itemid-' . $itemid : '')
    . ($params->get('fluidContainer') ? ' fluid' : '');
echo($this->direction == 'rtl' ? ' rtl' : '');
?>">
<!-- Body -->
<div class="body">
    <div class="container-fluid<?php echo($params->get('fluidContainer') ? '-fluid' : ''); ?>">
        <!-- top bar -->
        <div id="top-bar" style="width: 100%; background-color: #222222;">
            <div class="container"
                 style="padding-top: 10px !important; padding-bottom: 10px !important; padding-right: 10px !important; padding-left: 10px !important;">
                <div class="pull-left">
                    <jdoc:include type="modules" name="lang-pos" style="none"/>
                </div>
                <div>
                    <jdoc:include type="modules" name="social-pos" style="none"/>
                </div>
            </div>
        </div>

        <!-- Header -->
        <header class="header" role="banner">
            <div class="container">
                <div class="header-inner clearfix row">
                    <a class="brand pull-left col-xs-6 col-sm-12 col-md-2" href="<?php echo $this->baseurl; ?>/">
                        <?php echo $logo; ?>
                        <?php if ($this->params->get('sitedescription')) : ?>
                            <?php echo '<div class="site-description">' . htmlspecialchars($this->params->get('sitedescription'), ENT_COMPAT, 'UTF-8') . '</div>'; ?>
                        <?php endif; ?>
                    </a>
                    <div class="brand pull-right col-xs-6 col-sm-12 col-md-10">
                        <jdoc:include type="modules" name="position-0" style="none"/>
                    </div>
                </div>
            </div>
        </header>

        <a href="http://new.bmbc.co/index.php/en/en-contact/en-contact-us" class="free-quote hidden-xs"><i
                class="fa fa-paper-plane"></i>Free Quote</a>

        <?php if ($this->countModules('position-1')) : ?>
            <nav class="navigation" role="navigation">
                <div class="navbar pull-left">
                    <a class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                </div>
                <div class="nav-collapse">
                    <jdoc:include type="modules" name="position-1" style="none"/>
                </div>
            </nav>
        <?php endif; ?>
        <jdoc:include type="modules" name="banner" style="xhtml"/>
        <div class="row-fluid">
            <?php if ($this->countModules('position-8')) : ?>
                <!-- Begin Sidebar -->
                <div id="sidebar" class="span3">
                    <div class="sidebar-nav">
                        <jdoc:include type="modules" name="position-8" style="xhtml"/>
                    </div>
                </div>
                <!-- End Sidebar -->
            <?php endif; ?>
            <main id="content" role="main" class="<?php echo $span; ?>">
                <!-- Begin Content -->
                <jdoc:include type="modules" name="position-3" style="xhtml"/>
                <jdoc:include type="message"/>
                <jdoc:include type="component"/>
                <jdoc:include type="modules" name="position-2" style="none"/>
                <!-- End Content -->
            </main>
            <?php if ($this->countModules('position-7')) : ?>
                <div id="aside" class="span3">
                    <!-- Begin Right Sidebar -->
                    <jdoc:include type="modules" name="position-7" style="well"/>
                    <!-- End Right Sidebar -->
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Footer -->
<footer class="footer" role="contentinfo">
    <div class="container-fluid<?php echo($params->get('fluidContainer') ? '-fluid' : ''); ?>">

        <jdoc:include type="modules" name="footer" style="none"/>
        <p class="pull-right">
            <a href="#top" id="back-top">
                <?php echo JText::_('TPL_PROTOSTAR_BACKTOTOP'); ?>
            </a>
        </p>
        <hr/>
        <h4 style="color: #8e8e8e;" class="center"><span class="copy-text">
              &copy; Copyright <?php echo date('Y'); ?> <?php echo $sitename; ?> All rights reserved</span>
        </h4>
    </div>
</footer>
<jdoc:include type="modules" name="debug" style="none"/>
</body>
</html>
