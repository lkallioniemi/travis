<?php
/**
 * Template for displaying search forms in Frantic Theme
 */
?>
<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="text" class="field" name="s" placeholder="<?php esc_attr_e( 'Search', 'frantic' ); ?>" />
    <input type="submit" name="submit" value="<?php esc_attr_e( 'Search', 'frantic' ); ?>" />
</form>
