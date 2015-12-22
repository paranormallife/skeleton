<?php $navmenu = array(
	'theme_location'  => 'nav1',
	'menu'            => '', 
	'container'       => 'false', 
	'container_class' => '', 
	'container_id'    => '',
	'menu_class'      => '', 
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'false',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => /* Don't wrap in a UL */ '%3$s',
	'depth'           => 1,
	'walker'          => ''
); ?>

<nav id="menu">
	<span class="menu-open"><a href="#menu">Menu</a></span>
	<span class="menu-close"><a href="#">X</a></span>
	<ul>
		<?php wp_nav_menu( $navmenu ); ?>        
	</ul>
</nav>