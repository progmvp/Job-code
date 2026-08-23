<?php
/**
 * PMR Audio
 *
 * Логика вывода аудио PMR
 *
 * @package Betheme Child
 */

if (!defined('ABSPATH')) {
    exit;
}


/**
 * Получение ссылки на аудио PMR
 *
 * Администратор:
 *   dzsap_audio_link-first
 *
 * Подписчик:
 *   dzsap_audio_link-first
 *
 * Гость:
 *   dzsap_audio_link_guest
 *
 * @param int|null $post_id
 *
 * @return string
 */

function pmr_get_audio($post_id = null)
{

    if (!$post_id) {
        $post_id = get_the_ID();
    }


    if (pmr_is_subscriber()) {

        return get_post_meta(
            $post_id,
            'dzsap_audio_link-first',
            true
        );

    }


    $audio = get_post_meta(
        $post_id,
        'dzsap_audio_link_guest',
        true
    );

    if (!empty($audio)) {
        return $audio;
    }


    return get_post_meta(
        $post_id,
        'dzsap_audio_link-first',
        true
    );
}