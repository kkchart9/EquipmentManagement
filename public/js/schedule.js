function sortEquipmentsSubmit() {
    document.sortEquipmentsForm.submit();
}

function changeValue() {
    document.getElementById("equipment_sort").value = select.value;
    document.getElementById("search_equipments").value = search.value;
}

var select = document.getElementById('equipmentsSort');
var search = document.getElementById('equipment_search');

select.addEventListener('change', function () {
    changeValue();
    sortEquipmentsSubmit();
},false)

function searchSubmit() {
    changeValue();
    sortEquipmentsSubmit();
}

var form_check_id = document.getElementById('form_check_id');
var form_check_value = document.getElementById('form_check_value');

function checkboxChange(a,b) {
    
    if (b == 0) {
        form_check_value.value = 1;
    } else if (b == 1) {
        form_check_value.value = 0;
    }

    form_check_id.value = a;

    document.equipmentCheckForm.submit();
}

// var form_check_id_edit = document.getElementById('');

function checkboxChangeEdit(a) {
    form_check_id.value = a;
    document.equipmentCheckForm.submit();
}







