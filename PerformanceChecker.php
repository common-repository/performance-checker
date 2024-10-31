<?php
/*
Plugin Name: Performance Checker
Plugin URI: https://www.tecsys.in/
Description: Fully responsive and mobile ready Performance checker used gt-metrix,pagespeed insights tools to check your site issues and also do the analysis and recommendation for improve performance.
Version: 1.0.0
Author: Tecsys Solutions Pvt Ltd
Author URI: https://www.tecsys.in/
Text Domain: PerformanceChecker
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

*/
defined( 'ABSPATH' ) or die('Hey, I am unable to help you if you called me directly');

class PerformanceChecker {
    
	public $plugin_name;
	
	function __construct(){
	    
        $this->plugin_name = plugin_basename(__FILE__);	
		add_action('admin_menu',array($this,'add_admin_pages'));
		add_action('admin_enqueue_scripts',array($this,'enqueue'));
		
		
	//	add_filter("plugin_action_links_$this->plugin_name",array($this,'settings_link'));
		
	}
	
/*	function settings_link($link)
	{
	 $settings_link='<a href="index.php?page=performance_checker">Settings</a>';
	 array_push($link,$settings_link);
	 return $link;
	}
*/	
	function add_admin_pages(){
	    $page_title='Performance Checker Plugin';
	    $menu_title='Performance Checker';
	    $capability='manage_options';
	    $menu_slug='performance_checker';
	    add_menu_page($page_title,$menu_title,$capability,$menu_slug,array($this,'performance_checker'),'dashicons-media-document',4);
	
	    add_submenu_page( $menu_slug, 'GT-Metrix Report', 'GT-Metrix','manage_options', 'gt_metrix',array($this,'gt_metrix'));
	    
	    add_submenu_page( $menu_slug, 'PageSpeed Insights Report', 'PageSpeed Insights','manage_options', 'pagespeed_insights',array($this,'pagespeed_insights'));
	}
	
	function gt_metrix()
	{
	    require_once plugin_dir_path(__FILE__).'template/Services_WTF_Test.php';
	    require_once plugin_dir_path(__FILE__).'template/gtmetrix.php';
	}
	
    function pagespeed_insights()
    {
        require_once plugin_dir_path(__FILE__).'template/pagespeed.php';
    }
    
	function performance_checker(){
	    // required template
	    require_once plugin_dir_path(__FILE__).'template/admin.php';
	}
	
	function enqueue()
	{
	     wp_enqueue_style( 'bootstrapCss', plugins_url('/assets/css/bootstrap.min.css', __FILE__) );
	     wp_enqueue_script('bootstrapJs', plugins_url('/assets/js/bootstrap.min.js', __FILE__));
	     wp_enqueue_script('performanceScript', plugins_url('/assets/js/performanceScript.js', __FILE__));
	     wp_enqueue_style('performanceStyle', plugins_url('/assets/css/performanceStyle.css', __FILE__) );
	}
	
} 
if(class_exists('PerformanceChecker')){
    
$PerformanceChecker= new PerformanceChecker();	

}




