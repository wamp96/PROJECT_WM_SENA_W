const formId =['my-form', 'my-formPermission'];
const modalId =['my-modal', 'my-modalPermission'];
const model = 'roleModules';
const tableId = 'table-index';
const tableModuleId = 'table-module';
const tablePermissionId = 'table-permissions';
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

function add(){
    mainApp.resetform();
    mainApp.enableFormAll();
    insertUpdate = true;
    btnEnabled(false);
    mainApp.showModal();
}

function editModules(id, idRoleModule){
    mainApp.resetForm();
    mainApp.disabledFormEdit();
    insertUpdate = false;
    btnEnabled(false);
    getDataModuleId(id, idRoleModule);
}

async function getDataModuleId(id, idRoleModule){
    method = 'GET';
    url = URI_ROLE_MODULE + LIST_CRUD[1] + 'Modules' + '/' + id;
    data = "";
    resultFetch = getData(data,method,url);
    resultFetch.then(response => response.json())
        .then(data => {
            let newJson = convertJson(data[model]);
            newJson.Roles_id = id;
            newJson.Modules_id = idRoleModule;
            mainApp.setDataFormJson(newJson);
            mainApp.showModal();
            mainApp.hiddenPreload();
        })
        .catch(error => {
            console.error(error);
            mainApp.hiddenPreload();
        })
        .finally();

}

function editPermissions(id, idRoleModule){
    mainApp.resetForm(1);
    mainApp.disabledFormEdit();
    insertUpdate = false;
    btnEnabled(false);
    getDataPermissionId(id, idRoleModule);
}

async function getDataPermissionId(id, idRoleModule){
    method = 'GET';
    url = URI_ROLE_MODULE + LIST_CRUD[1] + 'Permissions' + '/' + idRoleModule;
    data = "";
    resultFetch = getData(data,method,url);
    resultFetch.then(response => response.json())
    .then(data => {
        let newJson = convertJson(data[model]);
        newJson.Modules_id = id;
        newJson.RoleModules_id = idRoleModule;
        mainApp.setDataFormJson(newJson,1);
        mainApp.showModal(1);
        mainApp.hiddenPreload();        
    })
    .catch(error => {
        console.error(error);
        mainApp.hiddenPreload();
    })
    .finally();
}


mainApp.getForm().addEventListener('submit', async function(event){
    event.preventDefault();
    if(mainApp.setValidateForm()){
        mainApp.showPreload();
        method = 'POST';
        url = URI_ROLE_MODULE + LIST_CRUD[0];
        data = mainApp.getDataForm();
        resultFetch = getData(data,method,url);
        resultFetch.then(response => response.json())
       .then(data => {
            mainApp.hiddenModal();
            mainApp.hiddenPreload();
        })
       .catch(error => {
            console.error(error);
            mainApp.hiddenPreload();
        })
       .finally();
    }else{
        alert("Data Validate");
        mainApp.resetForm();
    }




})