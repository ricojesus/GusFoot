$(function () {
    $('#tbConsulta').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
        }
    });
});

$(function () {
    $('#tbConsulta2').DataTable({
        "paging": false,
        "lengthChange": true,
        "searching": false,
        "ordering": false,
        "info": false,
        "autoWidth": false,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
        }
    });
});

$(function () {
    $('#tbConsultaSemOrdenacao').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
        }
    });
});
$(function () {
    $('#tbRotas').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
        }
    });
});
$(function () {
    $('#tbFleets').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
        }
    });

});
$(function () {
    $('#tbTours').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
        }
    });

});
$(function () {
    $('#tbMnt').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
        }
    });

});
$(function () {
    $('#tbEventos').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
        }
    });

});

form1.cboStaff.focus();
jQuery(function() {
    jQuery('form').bind('submit', function() {
        jQuery(this).find(':disabled').removeAttr('disabled');
    });
});
function validaStaff(){
    if (form1.cboStaff.value == 0){
        form1.cboUserType.disabled = true;
        form1.cboUserType.selectedIndex = 0;
    } else {
        form1.cboUserType.disabled = false;
    }
}
function ConfirmaDemissao(){
    if (form1.txtRazaoDemissao.value == ""){
        alert('O Campo Razão da Demissão deve ser preenchido');
        return false;
    }
}
function validaRecusa(){
    if (form1.txtObservations.value == ""){
        alert('Preencher no campo de Observações a razão para a recusa');
        return false;
    }
    if (confirm('Confirma a recusa do candidato?'))
        form1.submit();
    else
        return false;
}