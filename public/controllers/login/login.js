
const formId = ['my-form', 'my-form-login'];
const alertId = ['my-alert'];
const modalId = 'my-modal';
const model = 'roleModules';
const preloadId = 'preloadId';
const classEdit = 'edit-input';
const mainApp = new Main(modalId, formId, classEdit, preloadId);
const mainAlert = new Alert(alertId);

var url = "";
var method = "";
var data = "";
var resultFetch = null;


function showForget() {
  mainApp.resetForm();
  mainApp.enableFormAll();
  mainApp.showModal();
}


mainApp.getForm().addEventListener('submit', async function (event) {
  event.preventDefault();

  if (mainApp.setValidateForm()) {
    mainApp.showPreload();
    method = 'POST';
    url = URI_LOGIN + 'forgerPassword';
    data = mainApp.getDataFormJson();
    resultFetch = getData(data, method, url);
    resultFetch.then(response => response.json())
      .then(data => {
        if (data['response'] == 200) {
          alert("Send message change password");
        } else {
          alert("Error Send message change password");
        }
        mainApp.hiddenModal();
        mainApp.hiddenPreload();
      })
      .catch(error => {
        console.error(error);
        mainApp.hiddenPreload();
      })
      .finally();
  } else {
    alert("Data Validate");
    mainApp.resetForm();
  }
});

mainApp.getForm(1).addEventListener('submit', async function (event) {
  event.preventDefault();
  if (mainApp.setValidateForm(1)) {
    mainApp.showPreload();
    method = 'POST';
    url = URI_LOGIN + 'logIn';
    data = mainApp.getDataFormJson(1);
    resultFetch = getData(data, method, url);
    resultFetch.then(response => response.json())
      .then(data => {
        if (data['response'] == 200) {
          alert("Ok: " + data['message']);
          location.assign('/dashboard');
        } else {
          alert("Error: " + data['message']);
          mainApp.hiddenPreload();
        }
      })
      .catch(error => {
        console.error(error);
        mainApp.hiddenPreload();
      })
      .finally();
  } else {
    alert("Data Validate");
    mainApp.resetForm(1);
  }
});


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

function reloadPage() {
  setTimeout(function () {
    mainApp.hiddenPreload();
    location.reload();
  }, 500);
}