var Inspector = function () {

    this.iac = 'wc-inspector-el-active';

    this.bind = function () {
        var instance = this;
        jQuery( '*' ).bind( 'click', function () {
            if ( jQuery( this ).is( 'a' ) && jQuery( this ).closest( '#wp-admin-bar-wc-inspector' ).length > 0 ) {
                window.location = jQuery( this ).attr( 'href' );
                return false;
            }
            instance.remove_inspect();
            instance.inspect( this );
            return false;
        } );
    };

    this.unbind = function () {
        jQuery( '*' ).unbind( 'click' );
    };

    this.remove_inspect = function () {
        jQuery( '.' + this.iac ).removeClass( this.iac );
        jQuery( '.wc-inspector-template' ).remove();
    };

    this.inspect = function ( el ) {
        var wrapper = jQuery( el ).closest( '.wc-inspector-el' );
        wrapper.addClass( this.iac ).append(
            jQuery( '<span>' ).addClass( 'wc-inspector-template' ).html(
                wrapper.attr( 'rel' )
            )
        );
    };

    /**
     * Setup elements
     */
    this.setup = function () {

        // Unbind all click events
        this.unbind();

        // Bind our click event
        this.bind();
    };

    this.setup();
};

jQuery( 'body' ).ready( function () {
    new Inspector;
} );