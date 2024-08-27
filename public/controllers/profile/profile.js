
const formId1 = 'my-profile';
const modalId1 = 'my-modal_profile';
const model1 = 'profiles';
const tableId1= 'table-index';
const preloadId = 'preloadId';
const classEdit = 'edit-input';
const textConfirm = 'Press a button!\nEither OK or Cancel.';
const btnSubmit = document.getElementById('btnSubmit');
const mainApp1 = new Main(modalId, formId, classEdit, preloadId);


var insertUpdate = true;
var url = "";
var method = "";
var data = "";  
var resultFetch = null;


function showProfile(id) {
  //mainApp1.disabledFormAll();
  //mainApp1.resetForm();
  btnEnabled(false);
  mainApp1.showModal();
  //getDataId(id);
}


function add() {
  mainApp.enableFormAll();
  mainApp.resetForm();
  insertUpdate = true;
  btnEnabled(false);
  mainApp.showModal();
}


function edit(id) {
  mainApp.disabledFormEdit();
  mainApp.resetForm();
  insertUpdate = false;
  btnEnabled(false);
  getDataId(id);
}


async function close() {
  alert();
  method = 'POST';
  url = URI_LOGIN + 'singOff';
  data = "";
  if (confirm(textConfirm) == true) {
    resultFetch = getData(data, method, url);
    resultFetch.then(response => response.json())
      .then(data => {
         location.assign('/user');
      })
      .catch(error => {
        console.error(error);
        mainApp.hiddenPreload();
      })
      .finally();
  } else {
  }
}


async function getDataId(id) {
  method = 'GET';
  url = URI_USER + LIST_CRUD[1] + '/' + id;
  data = mainApp.getDataFormJson();
  resultFetch = getData(data, method, url);
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


async function getData(data, method, url) {
  var parameters;
  mainApp.showPreload();
  if (method == "GET") {
    parameters = {
      method: method,
      headers: {
        "Content-Type": "application/json",
        "X-Requested-With": "XMLHttpRequest"
      }
    }
  } else {
    parameters = {
      method: method,
      body: JSON.stringify(data),
      headers: {
        "Content-Type": "application/json",
        "X-Requested-With": "XMLHttpRequest"
      }
    }
  }
  return await fetch(url, parameters);
}

$(document).ready(function () {
  $('#' + tableId).DataTable();
});

mainApp.getForm().addEventListener('submit', async function (event) {
  event.preventDefault();
  if (mainApp.setValidateForm()) {
    mainApp.showPreload();
    if (insertUpdate) {
      method = 'POST';
      url = URI_USER + LIST_CRUD[0];
      data = mainApp.getDataFormJson();
      console.log(data);
      resultFetch = getData(data, method, url);
      resultFetch.then(response => response.json())
        .then(data => {
          mainApp.hiddenModal();
          reloadPage();
        })
        .catch(error => {
          console.error(error);
          mainApp.hiddenPreload();
        })
        .finally();
    } else {
      method = 'POST';
      url = URI_USER + LIST_CRUD[2];
      data = mainApp.getDataFormJson();
      resultFetch = getData(data, method, url);
      resultFetch.then(response => response.json())
        .then(data => {
          mainApp.hiddenModal();
          reloadPage();
        })
        .catch(error => {
          console.error(error);
          mainApp.hiddenPreload();
        })
        .finally();
    }
  } else {
    alert("Data Validate");
    mainApp.resetForm();
  }
});

function reloadPage() {
  setTimeout(function () {
    mainApp.hiddenPreload();
    location.reload();
  }, 500);
}

