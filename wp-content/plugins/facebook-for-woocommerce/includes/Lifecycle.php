<?php
/**
 * Copyright (c) Facebook, Inc. and its affiliates. All Rights Reserved
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory of this source tree.
 *
 * @package FacebookCommerce
 */

namespace SkyVerge\WooCommerce\Facebook;

use SkyVerge\WooCommerce\PluginFramework\v5_5_4 as Framework;

defined( 'ABSPATH' ) or exit;

/**
 * The Facebook for WooCommerce plugin lifecycle handler.
 *
 * @since 1.10.0
 *
 * @method \WC_Facebookcommerce get_plugin()
 */
class Lifecycle extends Framework\Plugin\Lifecycle {


	/**
	 * Lifecycle constructor.
	 *
	 * @since 1.10.0
	 *
	 * @param Framework\SV_WC_Plugin $plugin
	 */
	public function __construct( $plugin ) {

		parent::__construct( $plugin );

		$this->upgrade_versions = [
			'1.10.0',
		];
	}


	/**
	 * Migrates options from previous versions of the plugin, which did not use the Framework.
	 *
	 * @since 1.10.0
	 */
	protected function install() {

		/**
		 * Versions prior to 1.10.0 did not set a version option, so the upgrade method needs to be called manually.
		 * We do this by checking first if an old option exists, but a new one doesn't.
		 */
		if ( get_option( 'woocommerce_facebookcommerce_settings' ) && ! get_option( 'wc_facebook_page_access_token' ) ) {

			$this->upgrade( '1.9.15' );
		}
	}


	/**
	 * Upgrades to version 1.10.0.
	 *
	 * @since 1.10.0
	 */
	protected function upgrade_to_1_10_0() {

		// preserve legacy values
		$values = get_option( 'woocommerce_facebookcommerce_settings', [] );
		update_option( 'woocommerce_facebookcommerce_legacy_settings', $values );

		// migrate options from woocommerce_facebookcommerce_settings
		$options = [
			'fb_api_key'                       => \WC_Facebookcommerce_Integration::OPTION_PAGE_ACCESS_TOKEN,
			'fb_product_catalog_id'            => \WC_Facebookcommerce_Integration::OPTION_PRODUCT_CATALOG_ID,
			'fb_external_merchant_settings_id' => \WC_Facebookcommerce_Integration::OPTION_EXTERNAL_MERCHANT_SETTINGS_ID,
			'fb_feed_id'                       => \WC_Facebookcommerce_Integration::OPTION_FEED_ID,
			'facebook_jssdk_version'           => \WC_Facebookcommerce_Integration::OPTION_JS_SDK_VERSION,
			'pixel_install_time'               => \WC_Facebookcommerce_Integration::OPTION_PIXEL_INSTALL_TIME,
		];

		foreach ( $options as $old_index => $new_option_name ) {

			if ( isset( $values[ $old_index ] ) ) {

				$new_value = $values[ $old_index ];

				if ( 'pixel_install_time' === $old_index ) {

					// convert to UTC timestamp
					$pixel_install_time = \DateTime::createFromFormat( 'Y-m-d G:i:s', $new_value, new \DateTimeZone( wc_timezone_string() ) );
					$new_value          = $pixel_install_time->getTimestamp();
				}

				update_option( $new_option_name, $new_value );
			}
		}

		$new_settings = [];

		// migrate settings from woocommerce_facebookcommerce_settings
		$settings = [
			'fb_page_id'                                  => \WC_Facebookcommerce_Integration::SETTING_FACEBOOK_PAGE_ID,
			'fb_pixel_id'                                 => \WC_Facebookcommerce_Integration::SETTING_FACEBOOK_PIXEL_ID,
			'fb_pixel_use_pii'                            => \WC_Facebookcommerce_Integration::SETTING_ENABLE_ADVANCED_MATCHING,
			'is_messenger_chat_plugin_enabled'            => \WC_Facebookcommerce_Integration::SETTING_ENABLE_MESSENGER,
			'msger_chat_customization_locale'             => \WC_Facebookcommerce_Integration::SETTING_MESSENGER_LOCALE,
			'msger_chat_customization_greeting_text_code' => \WC_Facebookcommerce_Integration::SETTING_MESSENGER_GREETING,
			'msger_chat_customization_theme_color_code'   => \WC_Facebookcommerce_Integration::SETTING_MESSENGER_COLOR_HEX,
		];

		foreach ( $settings as $old_index => $new_index ) {

			if ( isset( $values[ $old_index ] ) ) {
				$new_settings[ $new_index ] = $values[ $old_index ];
			}
		}

		// migrate settings from standalone options
		$product_sync_enabled = empty( get_option( 'fb_disable_sync_on_dev_environment', 0 ) );

		$new_settings[ \WC_Facebookcommerce_Integration::SETTING_ENABLE_PRODUCT_SYNC ]      = $product_sync_enabled ? 'yes' : 'no';
		$new_settings[ \WC_Facebookcommerce_Integration::SETTING_PRODUCT_DESCRIPTION_MODE ] = ! empty( get_option( 'fb_sync_short_description', 0 ) ) ? \WC_Facebookcommerce_Integration::PRODUCT_DESCRIPTION_MODE_SHORT : \WC_Facebookcommerce_Integration::PRODUCT_DESCRIPTION_MODE_STANDARD;

		$autosync_time = get_option( 'woocommerce_fb_autosync_time' );

		if ( ! empty( $autosync_time ) ) {

			$parsed_time = strtotime( $autosync_time );

			if ( false !== $parsed_time ) {

				$midnight = ( new \DateTime() )->setTimestamp( $parsed_time )->setTime( 0, 0, 0 );

				$resync_offset = $parsed_time - $midnight->getTimestamp();

				$new_settings[ \WC_Facebookcommerce_Integration::SETTING_SCHEDULED_RESYNC_OFFSET ] = $resync_offset;
			}
		}

		update_option( 'woocommerce_' . \WC_Facebookcommerce::INTEGRATION_ID . '_settings', $new_settings );

		// schedule the next product resync action
		if ( isset( $resync_offset ) && $product_sync_enabled ) {

			$integration = $this->get_plugin()->get_integration();

			if ( ! $integration->is_resync_scheduled() ) {
				$integration->schedule_resync( $resync_offset );
			}
		}
	}


}
