
//CONSTANTES
const formId = 'my-form';
const modalId = 'my-modal';
const model = 'Category';
const tableId = 'table-index';
const preloadId = 'preloadId';
const classEdit = 'edit-input';
const textConfirm = 'Press a button!\nEither OK or Cancel'
const btnSubmit = document.getElementById('btnSubmit');
const mainApp = new Main(modalId, formId, classEdit, preloadId);

//VARIABLES
var insertUpdate = true;
var url = "";
var method = "";
var data = "";
var resultFetch = null;


//FUNCIONES
function show(id){
    mainApp.disabledFormAll();
    mainApp.resetForm();
    btnEnabled(true);
    getDataId(id);
}

function add(){
    mainApp.enableFormAll();
    mainApp.resetForm();
    insertUpdate = true;
    btnEnabled(false);
    mainApp.showModal();
}

function edit(id){
    mainApp.disabledFormEdit();
    mainApp.resetForm();
    insertUpdate = false;
    btnEnabled(false);
    getDataId(id);
}

//FUNCIONES ASINCRONICAS
async function delete_(id){
    method = 'GET';
    url = URI_CATEGORY + LIST_CRUD[3] + '/' + id;
    data = "";
    if(confirm(textConfirm) == true){
        resultFetch = getData(data , method, url);
        resultFetch.then(response => response.json())
        .then(data => {
            //console.log(data);
            reloadPage();
        })
        .catch(error => {
            console.log(error);
            mainApp.hiddenPreload();
        })
        .finally();
    }else{
    }
}

async function getDataId(id){
    method = 'GET';
    url = URI_CATEGORY + LIST_CRUD[1] + '/' + id;
    data = mainApp.getDataFormJson();
    resultFetch = getData(data , method, url);
    resultFetch.then(response => response.json())
        .then(data => {
            mainApp.setDataFormJson(data[model]);
            mainApp.showModal();
            mainApp.hiddenPreload();
        })
        .catch(error => {
            console.error(error);
            mainApp.hiddenPreload();
        })
        .finally();
}


function btnEnabled(type) {
     btnSubmit.disabled = type; 
    }


async function getData(data, method, url){
    var parameters;
    mainApp.showPreload();
    if(method == "GET"){
        parameters = {
            method: method,
            headers: {
                "Content-Type": "application/json",
                "X-Requested-With": "XMLHttpRequest"
            }
        }
    }else{
        parameters ={
            method: method,
            body: JSON.stringify(data),
            headers: {
                "Content-Type": "application/json",
                "X-Requested-With": "XMLHttpRequest"
            },
        }
    }
 
    return await fetch(url, parameters);
}


$(document).ready(function(){
    $('#'+tableId).DataTable();
});



mainApp.getForm().addEventListener('submit', async function (event){
    event.preventDefault();
    if(mainApp.setValidateForm()){
        mainApp.showPreload();
        if(insertUpdate){
            method = 'POST';
            url = URI_CATEGORY + LIST_CRUD[0];
            data = mainApp.getDataFormJson();
            resultFetch = getData(data, method, url);
            resultFetch.then(response => response.json())
           .then(data => {
                mainApp.hiddenModal();
                reloadPage();
           })
           .catch(error => {
                console.log(error);
                mainApp.hiddenPreload();
            })
            .finally();
        }else{
            method = 'POST';
            url = URI_CATEGORY + LIST_CRUD[2];
            data = mainApp.getDataFormJson();
            resultFetch = getData(data, method, url);
            resultFetch.then(response => response.json())
            .then(data => {
                console.log(data);
                mainApp.hiddenModal();
                reloadPage();
           })
           .catch(error => {
                console.log(error);
                mainApp.hiddenPreload();
            })
            .finally();
        }
    }else{
        alert("Data Validate");
        //mainApp.resetForm();
    }
});


function reloadPage(){
  setTimeout(function (){
    mainApp.hiddenPreload();
    location.reload();
  },500)
}

function action() {
    mainApp.hiddenPreload();
  };

document.addEventListener("DOMContentLoaded", action); 