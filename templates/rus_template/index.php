<?php
defined('_JEXEC') or die;

/**
 * Template for Joomla! CMS, created with Artisteer.
 * See readme.txt for more details on how to use the template.
 */

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions.php';

// Create alias for $this object reference:
$document = $this;

// Shortcut for template base url:
$templateUrl = $document->baseurl . '/templates/' . $document->template;

Artx::load("Artx_Page");

// Initialize $view:
$view = $this->artx = new ArtxPage($this);

// Decorate component with Artisteer style:
$view->componentWrapper();

JHtml::_('behavior.framework', true);

?>
<!DOCTYPE html>
<html dir="ltr" lang="<?php echo $document->language; ?>">
<head>
    <jdoc:include type="head" />
    <link rel="stylesheet" href="<?php echo $document->baseurl; ?>/templates/system/css/system.css" />
    <link rel="stylesheet" href="<?php echo $document->baseurl; ?>/templates/system/css/general.css" />

    <!-- Created by Artisteer v4.0.0.58475 -->
    
    
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/template.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/template.ie7.css" media="screen" /><![endif]-->
<!--    <link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/template.responsive.css" media="all">-->


    <script>if ('undefined' != typeof jQuery) document._artxJQueryBackup = jQuery;</script>
    <script src="<?php echo $templateUrl; ?>/jquery.js"></script>
    <script>jQuery.noConflict();</script>
    
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    
    <script src="<?php echo $templateUrl; ?>/script.js"></script>
    <script>if (document._artxJQueryBackup) jQuery = document._artxJQueryBackup;</script>
    <script src="<?php echo $templateUrl; ?>/script.responsive.js"></script>

    <link rel="stylesheet" href="<?php echo $templateUrl; ?>/js/fancybox/jquery.fancybox.css" />
    <script src="<?php echo $templateUrl; ?>/js/fancybox/jquery.fancybox.js"></script>
</head>
<body>

<div id="art-main">
<header class="art-header clearfix">
  <div style="width: 1200px; margin: 0 auto; position: relative;">
    <div style="position: absolute; z-index: 1; left: 470px; top: 25px; font-size: 22px; font-weight: bold; width: 340px;">
<!--      tel-->
        <div>
          <img style="float: left;" width="80" src="/templates/rus_template/images/phone2.gif">
          <span style="float: left; margin: 20px 12px;">
            +38(098) 42 - 55 - <span style="color: #FAA528">888</span>
          <br> 
            +38(063) 43 - 55 - <span style="color: #FAA528">888</span>
          </span>
        </div>
    </div>
  </div>
    <?php echo $view->position('position-30', 'art-nostyle'); ?>


    <div class="art-shapes">
      <h1 class="art-headline" data-left="7.91%">
        <a href="<?php echo $document->baseurl; ?>/"><img src="/images/logo.png" width="350"></a>
      </h1>
    </div>
<div class="art-textblock art-object227400126" data-left="97.5%">
    <form class="art-search" name="Search" action="<?php echo $document->baseurl; ?>/index.php/component/search/">
    <input type="text" value="" name="keyword">
    <input type="hidden" value="0" name="limitstart">
    <input type="hidden" value="com_virtuemart" name="option">
    <input type="hidden" value="category" name="view">
    <input type="submit" value="Search" name="search" class="art-search-button">
</form>
</div>
<?php if ($view->containsModules('position-1', 'position-28', 'position-29')) : ?>
<nav class="art-nav clearfix">
    
<?php if ($view->containsModules('position-28')) : ?>
<div class="art-hmenu-extra1"><?php echo $view->position('position-28'); ?></div>
<?php endif; ?>
<?php if ($view->containsModules('position-29')) : ?>
<div class="art-hmenu-extra2"><?php echo $view->position('position-29'); ?></div>
<?php endif; ?>
<?php echo $view->position('position-1'); ?>
 
    </nav>
<?php endif; ?>

                    
</header>
  
<div class="header_helper" style="display: none;"></div>

<div>
   <?php echo $view->position('position-15', 'art-nostyle'); ?>
</div>

<div class="art-sheet clearfix">
           
<?php echo $view->positions(array('position-16' => 33, 'position-17' => 33, 'position-18' => 34), 'art-block'); ?>
<div class="art-layout-wrapper clearfix">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <?php if ($view->containsModules('position-7', 'position-4', 'position-5')) : ?>
<div class="art-layout-cell art-sidebar1 clearfix">
<?php echo $view->position('position-7', 'art-block'); ?>
<?php echo $view->position('position-4', 'art-block'); ?>
<?php echo $view->position('position-5', 'art-block'); ?>




                        </div>
<?php endif; ?>

                        <div class="art-layout-cell art-content clearfix">
<?php
  echo $view->position('position-19', 'art-nostyle');
  if ($view->containsModules('position-2'))
    echo artxPost($view->position('position-2'));
  echo $view->positions(array('position-20' => 50, 'position-21' => 50), 'art-article');
  echo $view->position('position-12', 'art-nostyle');
  echo artxPost(array('content' => '<jdoc:include type="message" />', 'classes' => ' art-messages'));
  echo '<jdoc:include type="component" />';
  echo $view->position('position-22', 'art-nostyle');
  echo $view->positions(array('position-23' => 50, 'position-24' => 50), 'art-article');
  echo $view->position('position-25', 'art-nostyle');
?>



                        </div>
                    </div>
                </div>
            </div>
<?php echo $view->positions(array('position-9' => 33, 'position-10' => 33, 'position-11' => 34), 'art-block'); ?>
<?php echo $view->position('position-26', 'art-nostyle'); ?>
    </div>

<footer class="art-footer clearfix">
  <div class="footer-content clearfix">
    <div class="row">
      <div class="floatleft width30">
        <a href="/">
          <img width="200" src="/images/logo.png" style="width: 100%; max-width: 200px; height: auto; background-color: #fff; border: 2px solid #000;">
        </a><br>
        <address class="copy" style="font-style: normal;">&copy;&nbsp;Интернет-магазин<br> «Юникомф&trade;»&nbsp;2013&ndash;<?php echo date('Y');?></address>
        <div class="info">
          График работы <br>
          Пн-Пт: с 9:00 до 19:00<br>
          Суббота: с 9:00 до 19:00<br>
          Воскресенье: с 10:00 до 19:00<br>

        </div>
      </div>
      <div class="floatleft width10" style="padding-right: 10px;">
        <img src="/templates/rus_template/images/qr.png" width="120" style="border: 2px solid #000;">
      </div>
      <div class="floatleft width30">
         Контактная информация <br>
         Телефон: +38(098)42-55-888, +38(063)43-55-888<br>
         email: email@mail.com<br>
         Адресс: г. Черкассы ул. Смелянская, 33<br>
      </div>
      <div class="floatleft width20">
        <ul class="body-footer-social">
					<li class="body-footer-social-title">Следите за нами:</li>
          <li class="body-footer-social-i"><a target="_blank" class="vk" href="/http://vk.com/club20877147"></a></li>
          <li class="body-footer-social-i"><a target="_blank" class="fb" href="http://facebook.com/rozetka.ua"></a></li>
          <li class="body-footer-social-i"><a target="_blank" class="twitter" href="http://twitter.com/rozetka_news"></a></li>
          <li class="body-footer-social-i"><a target="_blank" class="youtube" href="http://www.youtube.com/subscription_center?add_user=rozetkaua"></a></li>
        </ul>
      </div>
      
    </div>
    <div class="row">
      <?php echo $view->position('position-27', 'art-nostyle'); ?>
    </div>
  </div>
</footer>
    
</div>



<?php echo $view->position('debug'); ?>
</body>
</html>