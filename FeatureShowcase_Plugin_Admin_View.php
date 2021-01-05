<?php
/**
 * File: FeatureShowcase_Plugin_Admin_View.php
 *
 * @since X.X.X
 *
 * @package W3TC
 *
 * @uses array $config W3TC configuration.
 * @uses array $cards {
 *     Feature configuration.
 *
 *     @type string $title      Title.
 *     @type string $icon       Dashicon icon class.
 *     @type string $text       Description.
 *     @type string $button     Button markup.
 *     @type string $link       Link URL address.
 *     @type bool   $is_premium Is it a premium feature.
 * }
 *
 * @see Util_Environment::is_w3tc_pro()
 *
 * phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
 */

namespace W3TC;

$is_pro = Util_Environment::is_w3tc_pro( $config );

?>

<div class="w3tc-page-container">
	<div class="w3tc-card-container">
<?php
foreach ( $cards as $key => $card ) {
	$classes    = 'w3tc-card';
	$is_premium = ! empty( $card['is_premium'] );

	if ( $is_premium ) {
		$classes .= ' w3tc-card-premium';
	}

	if ( $is_premium && ! $is_pro ) {
		$classes .= ' w3tc-card-upgrade';
	}

	?>
		<div class="<?php echo $classes; ?>" id="<?php echo esc_html( $key ); ?>">
	<?php
	if ( $is_premium ) {
		?>
			<div class="w3tc-card-ribbon"><span>Premium</span></div>
		<?php
	}
	?>
			<div class="w3tc-card-title"><p><?php echo $card['title']; ?></p></div>
			<div class="w3tc-card-icon"><span class="dashicons <?php echo $card['icon']; ?>"></span></div>
			<div class="w3tc-card-footer"><p><?php echo $card['text']; ?></p></div>
			<div class="w3tc-card-links"><?php echo $card['link']; ?></div>
		</div>
	<?php
}
?>
	</div>
</div>