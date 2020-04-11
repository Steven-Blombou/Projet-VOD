'use strict';
$(function () {
    $('#mail_contact-form').submit(function (event) {
        // Annule l'action par défaut (on ne veut pas que la page se recharge)
        event.preventDefault();
        // Envoi de la requête XHR
        $.post($(this).attr('action'), $(this).serializeArray(), function (data) {
            let $aside = $('#mail_contact-form aside');
            // Notifications
            if (data.result) {
                $aside.addClass('alert-success').text('Le message a bien été envoyé !').removeClass('d-none');
            } else {
                $aside.addClass('alert-danger').text('Erreur lors de l\'envoi du message !').removeClass('d-none');
            }
        });
    });
});
