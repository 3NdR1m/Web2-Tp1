const listMaker = document.getElementById("select_maker");
const listModel = document.getElementById("select_models");
const btnConfirm = document.getElementById("btn_confirm");
const initSelectedMaker = listMaker.value;

function updateList() {
    if(listMaker.value != initSelectedMaker) {
        listModel.disabled = true;
        btnConfirm.disabled = true;
    }
    else {
        listModel.disabled = false;
        btnConfirm.disabled = false;
    }
}