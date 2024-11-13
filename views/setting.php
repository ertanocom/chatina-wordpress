<?php

if (!defined('ABSPATH')) {
    exit;
}

if (isset($_GET['apiKey']) && isset($_GET['_wpnonce'])) {
    $_nonce = sanitize_text_field(wp_unslash($_GET['_wpnonce']));
    $api_key = sanitize_text_field(wp_unslash($_GET['apiKey']));
    if (!wp_verify_nonce($_nonce, 'chatina_save_api_key')) {
        wp_die('Security check');
    }

    $api_key = sanitize_text_field(wp_unslash($_GET['apiKey']));
    update_option('chatina_api_key', $api_key);

    header('Location: ' . admin_url('admin.php?page=chatina&message=success'));
    exit;
}

if (isset($_GET['disconnect']) && isset($_GET['_wpnonce'])) {
    $_nonce = sanitize_text_field(wp_unslash($_GET['_wpnonce']));
    if (!wp_verify_nonce($_nonce, 'chatina_disconnect')) {
        wp_die('Security check');
    }

    delete_option('chatina_api_key');

    header('Location: ' . admin_url('admin.php?page=chatina&message=success'));
    exit;
}
$apiKey = get_option('chatina_api_key');
?>

<div class="chatina mwtc_admin_settings_wrapper <?php echo esc_attr(is_rtl() ? 'mwtc-rtl' : 'mwtc-ltr'); ?>">
    <div class="chatina mwtc_sidebar_wrapper">
        <div class="sidebar">
            <div class="chatina mw_logo_section">
                <div class="chatina mw_logo">
                    <img src="<?php echo esc_url(CHATINA_PLUGIN_URL . 'assets/img/logo.svg'); ?>" width="100" height="100" alt="<?php esc_attr_e('Logo', 'chatina'); ?>">
                </div>
                <div class="chatina mw_hello">
                    <span><?php printf('%s %s', esc_html__('Welcome to Chatina', 'chatina'), '👋'); ?></span>
                </div>
            </div>
            <div class="chatina mw_menu_section">
                <ul>
                    <li class="active">
                        <a href="#">
                            <span class="menu-icon" tab="note"></span>
                            <span class="menu-name"><?php esc_html_e('General', 'chatina'); ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="chatina content_wrapper">
        <div class="content">
            <div class="option_section">
                <h3 class="chatina option_section_title"><?php esc_html_e('Settings', 'chatina'); ?></h3>
                <div class="chatina option_field option_row_field">
                    <div class="wrap chatina">
                        <?php if ($apiKey): ?>
                            <p class="chatina__connected">
                                <?php esc_html_e('You are connected to Chatina', 'chatina') ?>
                            </p>
                        <?php endif; ?>
                        <?php if (!$apiKey): ?>
                            <p class="chatina__connect-text">
                                <?php esc_html_e('To connect Chatina, click the button below.', 'chatina') ?>
                            </p>
                            <a href="https://app.chatina.ai/connect/?callback=<?php echo urlencode(admin_url('admin.php?page=chatina&_wpnonce=' . wp_create_nonce('chatina_save_api_key'))) ?>" class="chatina__connect">
                                <img src="<?php echo esc_url(plugins_url('assets/img/logo-white.svg', CHATINA_PLUGIN_FILE)) ?>" alt="<?php esc_attr_e('Chatina Logo', 'chatina') ?>" class="chatina__connect-logo" width="20" height="20">
                                <?php esc_html_e('Connect Chatina', 'chatina') ?>
                            </a>
                        <?php else: ?>
                            <p class="chatina__disconnect-text">
                                <?php esc_html_e('To disconnect Chatina, click the button below.', 'chatina') ?>
                            </p>
                            <a href="<?php echo esc_url(admin_url('admin.php?page=chatina&disconnect=1&_wpnonce=' . wp_create_nonce('chatina_disconnect'))) ?>" class="chatina__disconnect-link">
                                <?php esc_html_e('Disconnect Chatina', 'chatina') ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>