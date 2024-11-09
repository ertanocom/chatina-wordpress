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

$apiKey = get_option('chatina_api_key');
?>

<div class="wrap chatina">
    <?php if ($apiKey): ?>
        <p class="chatina__connected"></p>
        <?php esc_html_e('You are connected to Chatina', 'chatina') ?>
        </p>
    <?php endif; ?>
    <a href="https://app.chatina.ai/connect/?callback=<?php echo urlencode(admin_url('admin.php?page=chatina&_wpnonce=' . wp_create_nonce('chatina_save_api_key'))) ?>" class="chatina__connect" target="_blank">
        <img src="<?php echo esc_url(plugins_url('assets/logo-white.svg', CHATINA_PLUGIN_FILE)) ?>" alt="<?php esc_attr_e('Chatina Logo', 'chatina') ?>" class="chatina__connect-logo" width="20" height="20">
        <?php esc_html_e('Connect Chatina', 'chatina') ?>
    </a>
</div></a>