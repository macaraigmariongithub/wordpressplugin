<?php
/**
* @package MMwordpressplugin
* @version 1.0.0
*/
/*
Plugin Name: MM Plugin
Plugin URI: 
Description: This is a sample of MMwordpress plugin
Author: Marion Macaraig
Author URI: https://marionmacaraig.vercel.app/
Version: 1.0.0
License: GPLv2 or later
Text Domain: MMwordpress-plugin
*/
/*
 This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.
*/

defined('ABSPATH') or die('You are not in wordpress directory.');

class MMwordpressplugin
{
    function __construct(){
        add_action('init', array($this, 'custom_post_type'));
    }

    function register(){
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
        // add_action('wp_enqueue_scripts', array($this, 'enqueue')); wp kung gusto mo i add sa website mo. yung admin kasi is sa admin lang ma aaadd
    }

    function activate(){

    $this->custom_post_type();
    flush_rewrite_rules();

    }

    function deactive(){
    flush_rewrite_rules();
    }

    function custom_post_type(){
    
    register_post_type('Movie', ['public' => true, 'labels' => array('name' => __('Movies'), 
    'singular_name' => __('Movie'), 'add_new_item' => __('Add new movie'), 'add_new' => __('Add Movie'))]);

    }

    function enqueue(){
        wp_enqueue_style('MMstyle', plugins_url('/assets/custommain.css',__FILE__));
        wp_enqueue_script('MMscript', plugins_url('/assets/custommain.js',__FILE__));
    }

}

if(class_exists('MMwordpressplugin')){

    $MMPlugin = new MMwordpressplugin();
    $MMPlugin ->register();

}

//activate
register_activation_hook(__FILE__, array($MMPlugin, 'activate'));
//dactivate
register_deactivation_hook(__FILE__, array($MMPlugin, 'deactivate'));
//uninstall
//register_uninstall_hook(__FILE__, array($MMPlugin, 'uninstall'));

