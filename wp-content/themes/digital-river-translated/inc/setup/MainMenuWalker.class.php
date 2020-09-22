<?php

class MainMenuWalker extends Walker_Nav_Menu {
 function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0) {
        global $wp_query;

        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
        $class_names = $value = '';
 
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
 
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="'. esc_attr( $class_names ) . '"';
 
        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
 
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';
 
        if($depth != 0) {
            $description = $append = $prepend = "";
        }
	
		$item_output = $args->before;


		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before .__(apply_filters( 'the_title', $item->title, $item->ID ));
		$item_output .= $description.$args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;


        if($depth == 0 && $args->theme_location == "main-menu"):
            $arrows = '<div class="menu-expand"><i class="fa fa-caret-right"></i><i class="fa fa-caret-down"></i></div>';
        else:
            $arrows = "";
        endif;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args ).$arrows;
    }
}