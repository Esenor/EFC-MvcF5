function toggleUser(id, component) {
    console.log('Toggle user');
    jQuery(component).hide();
    jQuery.ajax({
        url: window.location.origin + '/utilisateur/toggle/' + id,
        success: function (result) {
            if (jQuery(component).html() == 'Actif') {
                jQuery(component).html('Inactif');
            } else {
                jQuery(component).html('Actif');
            }
            jQuery(component).show();
        }
    });
}

function loadSkill(id) {
    console.log('load skill');
    jQuery.ajax({
        url: window.location.origin + '/skill/list',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            jQuery('#' + id + ' .modal-body').html('<ul></ul>');
            jQuery.each(data, function (key) {
                var skill = data[key];
                jQuery('#' + id + ' .modal-body ul').append('<li>' + skill.name + ' : lvl(' + skill.lvl + ')</li>');
            });
            jQuery('#' + id).modal('show');
        }
    });
}
