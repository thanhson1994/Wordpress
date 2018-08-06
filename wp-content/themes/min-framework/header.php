<?php 
/**
 * header.php
 *
 * The header for the theme.
 */
?>

<?php 
	// Get the favicon.
	$favicon = IMAGES . '/icons/favicon.png';

	// Get the custom touch icon.
	$touch_icon = IMAGES . '/icons/apple-touch-icon-152x152-precomposed.png';
?>

<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicon and Apple Icons -->
	<link rel="shortcut icon" href="<?php echo $favicon; ?>">
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo $touch_icon; ?>">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<!-- HEADER -->
	<header>
  <div class="nk-header">
    <div class="nk-menu" >
      <div class="container">
        <div class="row menu-nav">

          <div class="col-12 ">
            <nav class="navbar navbar-expand-lg navbar-light">

              <div class="nav logo-img">
                <a href="#">
                  <img src="images/logo-light.svg" alt="logo.svg">
                </a>
              </div>



              <button class="navbar-toggler slide-nav " type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>


              <div class="collapse navbar-collapse menu-right" id="navbarNav">
                <ul class="navbar-nav nav" id="navbarNav">
                  <li class="nav-item">
                    <a pageScroll href="#about">About</a>
                  </li>
                  <li class="nav-item">
                    <a pageScroll href="#contact">Contact</a>
                  </li>
                  <li class="nav-item">
                    <a href="#blog" pageScroll>Blog</a>
                  </li>
                 
                </ul>
              </div>
            </nav>

          </div>

        </div>
      </div>
    </div>
  </div>

  <section class="header-background">
    <div class="header-background-color">
      <div class="container ">
        <div class="row title-t justify-content-center text-center">
          <div class="col-8 text-subtitle">
            <h2 class="clorWhite">New Branding Agency</h2>
            <h1 class="clorWhite">We are about to change the way
              <br>
              <em class="tutu clorWhite">you publish on the web</em>
            </h1>

            <br>
            <a href="#" class="dowload">
              <button type="button" class="btn btn-dark">Free Download</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

</header>

	<!-- MAIN CONTENT AREA -->
	