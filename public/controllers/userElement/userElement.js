const formId = 'my-form';
const modalId = 'my-modal';
const model = 'user_elements'; // Modelo específico para la asignación
const tableId = 'table-index';
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

// Mostrar detalles del elemento
function show(id) {
  mainApp.disabledFormAll();
  mainApp.resetForm();
  btnEnabled(true);
  getUserElementData(id);
}

// Función para agregar un nuevo elemento
function add() {
  mainApp.enableFormAll();
  mainApp.resetForm();
  insertUpdate = true;
  btnEnabled(false);
  mainApp.showModal();
}

// Función para editar un elemento existente
function edit(id) {
  mainApp.disabledFormEdit();
  mainApp.resetForm();
  insertUpdate = false;
  btnEnabled(false);
  getUserElementData(id);
}

// Función para eliminar un elemento
async function delete_(id) {
  if (confirm(textConfirm)) {
    url = `${URI_USER_ELEMENT}${LIST_CRUD[3]}/${id}`;
    method = 'GET';
    data = "";

    try {
      const response = await getData(data, method, url);
      const result = await response.json();
      reloadPage();
    } catch (error) {
      console.error(error);
      mainApp.hiddenPreload();
    }
  }
}

// Obtener datos del elemento de usuario
async function getUserElementData(id) {
  url = `${URI_USER_ELEMENT}/getElementDetails/${id}`;
  method = 'GET';
  data = "";

  try {
    const response = await getData(data, method, url);
    const result = await response.json();
    if (result.success) {
      mainApp.setDataFormJson(result.userElement);
      mainApp.showModal();
      mainApp.hiddenPreload();
    }
  } catch (error) {
    console.error(error);
    mainApp.hiddenPreload();
  }
}

// Función para habilitar/deshabilitar el botón de envío
function btnEnabled(type) {
  btnSubmit.disabled = type;
}

// Función para obtener datos usando fetch
async function getData(data, method, url) {
  let parameters = {
    method: method,
    headers: {
      "Content-Type": "application/json",
      "X-Requested-With": "XMLHttpRequest"
    }
  };

  if (method !== 'GET') {
    parameters.body = JSON.stringify(data);
  }

  mainApp.showPreload();
  try {
    return await fetch(url, parameters);
  } catch (error) {
    console.error(error);
    mainApp.hiddenPreload();
    throw error;
  }
}

// Recargar la página después de la operación
function reloadPage() {
  setTimeout(function () {
    mainApp.hiddenPreload();
    location.reload();
  }, 500);
}

// Enviar el formulario (Crear o Editar)
async function submitForm(data, isEdit) {
  const method = 'POST';
  const url = isEdit ? `${URI_USER_ELEMENT}/update` : `${URI_USER_ELEMENT}/assign`;

  try {
    const response = await getData(data, method, url);
    const result = await response.json();
    if (result.success) {
      alert('Operation successful!');
      reloadPage();
    } else {
      alert(result.message || 'An error occurred.');
    }
  } catch (error) {
    alert('An error occurred while processing the request.');
    console.error(error);
  }
}




// Manejo del envío del formulario
mainApp.getForm().addEventListener('submit', async function (event) {
  event.preventDefault();
  if (mainApp.setValidateForm()) {
      const formData = mainApp.getDataFormJson();
      console.log('Form data:', formData);  // Asegúrate de que los valores estén presentes

      const isEdit = !insertUpdate;

      await submitForm(formData, isEdit);
  } else {
      alert('Please complete all required fields.');
  }
});



