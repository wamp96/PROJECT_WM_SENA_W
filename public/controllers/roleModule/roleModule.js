/* Author:DIEGO CASALLAS
* Date:17/05/2024
* Descriptions:This is controller role - module - permission 
* **/


/* The code snippet you provided is setting up various constants and initializing the `mainApp` object
with specific parameters. Here is a breakdown of what each line is doing: */
const formId = ['my-form', 'my-formPermission'];
const modalId = ['my-modal', 'my-modalPermission'];
const model = 'roleModules';
const tableId = 'table-index';
const tableModuleId = 'table-module';
const tablePermissionsId = 'table-permissions';
const preloadId = 'preloadId';
const classEdit = 'edit-input';
const textConfirm = 'Press a button!\nEither OK or Cancel.';
const btnSubmit = document.getElementById('btnSubmit');
const mainApp = new Main(modalId, formId, classEdit, preloadId);


var insertUpdate = true;
var url = "";
var method = "";
var data = "";
var resultFetch = null;


function add() {
  mainApp.resetForm();
  mainApp.enableFormAll();
  insertUpdate = true;
  btnEnabled(false);
  mainApp.showModal();
}


function editModules(id, idRoleModule) {
  mainApp.resetForm();
  mainApp.disabledFormEdit();
  insertUpdate = false;
  btnEnabled(false);
  getDataModuleId(id, idRoleModule);
}


async function getDataModuleId(id, idRoleModule) {
  method = 'GET';
  url = URI_ROLE_MODULE + LIST_CRUD[1] + 'Modules' + '/' + id;
  data = "";
  resultFetch = getData(data, method, url);
  resultFetch.then(response => response.json())
    .then(data => {
      //console.log(data);
      ///Set data form 
      let newJson = convertJson(data[model]);
      newJson.Roles_id = id;
      newJson.RoleModules_id = idRoleModule;
      mainApp.setDataFormJson(newJson);
      //show Modal 
      mainApp.showModal();
      //hidden Preload 
      mainApp.hiddenPreload();
    })
    .catch(error => {
      console.error(error);
      //hidden Preload 
      mainApp.hiddenPreload();
    })
    .finally();
}


function editPermissions(id, idRoleModule) {
  mainApp.resetForm(1);
  mainApp.disabledFormEdit(1);
  insertUpdate = false;
  btnEnabled(false);
  getDataPermissionId(id, idRoleModule);
}

async function getDataPermissionId(id, idRoleModule) {
  method = 'GET';
  url = URI_ROLE_MODULE + LIST_CRUD[1] + 'Permission' + '/' + idRoleModule;
  data = "";
  resultFetch = getData(data, method, url);
  resultFetch.then(response => response.json())
    .then(data => {
      //console.log(data[model]);

      ///Set data form
      let newJson = convertJson(data[model]);
      newJson.Modules_id = id;
      newJson.RoleModules_id = idRoleModule;
      mainApp.setDataFormJson(newJson, 1);
      //show Modal 
      mainApp.showModal(1);
      //hidden Preload 
      mainApp.hiddenPreload();
    })
    .catch(error => {
      console.error(error);
      //hidden Preload 
      mainApp.hiddenPreload();
    })
    .finally();
}


mainApp.getForm().addEventListener('submit', async function (event) {
  event.preventDefault();
  if (mainApp.setValidateForm()) {
    //Show Preload 
    mainApp.showPreload();
    if (insertUpdate) {
      method = 'POST';
      url = URI_ROLE_MODULE + LIST_CRUD[0];
      data = mainApp.getDataFormJson();
      console.log(data);
    } else {
      method = 'POST';
      url = URI_ROLE_MODULE + LIST_CRUD[2];
      data = mainApp.getDataFormJson();
      console.log(data);
    }
  } else {
    alert("Data Validate");
    mainApp.resetForm();
  }
});

mainApp.getForm(1).addEventListener('submit', async function (event) {
  event.preventDefault();
  alert();
  if (mainApp.setValidateForm(1)) {
    //Show Preload 
    mainApp.showPreload();
    if (insertUpdate) {
      method = 'POST';
      url = URI_ROLE_MODULE + LIST_CRUD[0];
      data = mainApp.getDataFormJson(1);
      console.log(data);
    } else {
      method = 'POST';
      url = URI_ROLE_MODULE + LIST_CRUD[2];
      data = mainApp.getDataFormJson(1);
      console.log(data);

    }
  } else {
    alert("Data Validate");
    mainApp.resetForm(1);
  }
});


function convertJson(jsonData) {
  var newJson = {};
  for (let i = 0; i < jsonData.length; i++) {
    let elements = Object.values(jsonData[i]);
    newJson[elements[0]] = elements[1];
  }
  return newJson;
}

function getModels(value) {
  if (value != 0) {
    getDataModuleId(value);
  }
  mainApp.resetForm();
}


function btnEnabled(type) {
  btnSubmit.disabled = type;
}

async function getData(data, method, url) {
  var parameters;
  //Show Preload 
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
  $('#' + tableModuleId).DataTable();
  $('#' + tablePermissionsId).DataTable();
});


function reloadPage() {
  setTimeout(function () {
    //hidden Preload 
    mainApp.hiddenPreload();
    location.reload();
  }, 500);
}


