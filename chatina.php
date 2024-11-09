<?php

/**
 * Plugin Name: Chatina AI – Live Chat for WordPress
 * Plugin URI: https://chatina.ai/lab/wordpress/
 * Description: Add online chat to your website
 * Version: 1.0
 * Author: Chatina
 * Author URI: https://chatina.ai
 * License: GPLv2 or later
 * Text Domain: chatina
 * Domain Path: /languages
 */


namespace Chatina;

if (!defined('ABSPATH')) exit;

if (!defined('CHATINA_PLUGIN_FILE')) {
    define('CHATINA_PLUGIN_FILE', __FILE__);
}

class Chatina
{
    public function __construct()
    {
        load_plugin_textdomain('chatina', false, dirname(plugin_basename(__FILE__)) . '/languages/');

        add_action('admin_menu', [$this, 'add_admin_menu']);
        add_action('wp_enqueue_scripts', [$this, 'hooks']);
        add_action('admin_enqueue_scripts', [$this, 'admin_assets']);
    }

    public function add_admin_menu()
    {
        add_submenu_page('options-general.php', __('Chatina', 'chatina'), __('Chatina', 'chatina'), 'manage_options', 'chatina', [$this, 'chatina_page']);
    }

    public function chatina_page()
    {
        include plugin_dir_path(__FILE__) . 'views/setting.php';
    }

    function admin_assets()
    {
        $screen = get_current_screen();
        if ($screen->id === 'settings_page_chatina') {
            wp_enqueue_style('chatina-admin', plugin_dir_url(__FILE__) . 'assets/chatina.css', [], '1.0.0');
        }
    }

    public function hooks()
    {
        add_action('wp_footer', function () {
            $api_key = sanitize_text_field(get_option('chatina_api_key'));
            if (!$api_key) return;
            echo '<script id="chatinaw-script" data-bId="' . esc_html($api_key) . '">
window.addEventListener("load",(function(){const t=document.getElementById("chatinaw-script").getAttribute("data-bId");window.chatina={bId:t};var e=document.createElement("div");e.id="chatina-root",document.body.appendChild(e);var n=document.createElement("link");n.rel="stylesheet",n.href="https://cdn.chatina.ai/static/widget.css",n.crossOrigin="anonymous",document.head.appendChild(n);var a=document.createElement("script");a.src="https://cdn.chatina.ai/static/widget.js",a.crossOrigin="anonymous",document.head.appendChild(a)}));
</script>';
        });
    }
}

new Chatina();
