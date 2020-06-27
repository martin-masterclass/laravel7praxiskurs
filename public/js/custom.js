
function confirm_delete(what, name, model, id) {

    var question = "Bist du sicher, daß du " + what + "\n"
    + name + "\n" + "löschen möchtest?";

    if (confirm(question)) {
        var form_action = "/" + model + "/" + id;
        $('#loeschen_formular').attr('action', form_action).submit();
    }


}