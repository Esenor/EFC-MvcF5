function toggleUser(id, component) {
    console.log('Toggle user');
    jQuery(component).hide();
    jQuery.ajax({
        url: '/utilisateur/toggle/' + id,
        success: function (result) {
            if(jQuery(component).html() == 'Actif') {
                jQuery(component).html('Inactif');
            } else {
                jQuery(component).html('Actif');
            }
            jQuery(component).show();
        }
    });
}
