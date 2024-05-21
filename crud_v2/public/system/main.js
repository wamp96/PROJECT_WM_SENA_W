//Funciones que se van a usar de manera generica

class Main{


    constructor(modalId, formId, classEdit,preloadId){
        this.myModal = new bootstrap.Modal(document.getElementById(modalId));
        this.myForm = document.getElementById(formId);
        this.classEdit = classEdit;
        this.elementJson = {};
        this.fromData = new FormData();
        this.preload = document.getElementById(preloadId);        
    }

    showPreload(){
        this.preload.style.display = "block";
    }

    hiddenPreload(){
        this.preload.style.display = "none";
    }

    showModal(){
        this.myModal.show();
    }

    hiddenModal(){
        this.myModal.hide();
    }

    getForm(){
        return this.myForm;
    }

    disabledFormAll(){
        var elementsInput =this.myForm.querySelectorAll('input');
        var elementsSelect =this.myForm.querySelectorAll('select');
        for(let i = 0; i < elementsInput.length; i++) {
            elementsInput[i].disabled = true;
        }
        for(let j = 0; j < elementsSelect.length; j++) {
            elementsSelect[j].disabled = true;
        }
    }

    disabledFormEdit(){
        var elementsInput =this.myForm.querySelectorAll('input');
        var elementsSelect =this.myForm.querySelectorAll('select');
        for(let i = 0; i < elementsInput.length; i++) {
            if(elementsInput[i].classList.contains(this.classEdit)){
                elementsInput[i].disabled = true;
            }else{
                elementsInput[i].disabled = false;
            }
        }

        for(let j = 0; j < elementsSelect.length; j++) {
              if(elementsSelect[j].classList.contains(this.classEdit)){
                elementsSelect[j].disabled = true;
            }else{
                elementsSelect[j].disabled = false;
            }
        }
    }
    
    enableFormAll(){
        var elementsInput =this.myForm.querySelectorAll('input');
        var elementsSelect =this.myForm.querySelectorAll('select');
        for(let i = 0; i < elementsInput.length; i++) {
            elementsInput[i].disabled = false;
        }
        for(let j = 0; j < elementsSelect.length; j++) {
            elementsSelect[j].disabled = false;
        }    
    }
    
    resetForm(){
      var elementsInput = document.querySelectorAll('input');
      var elementsSelect = document.querySelectorAll('select');
        for (let i = 0; i < elementsInput.length; i++) {
            elementsInput[i].value= "";
        }
        for (let j = 0; j < elementsSelect.length; j++) {
            elementsInput[j].value= "";
        }
        this.myForm.reset();
    }

    getDataFormJson(){
        var elementsForm = this.myForm.querySelectorAll('input, select');
        let getJson ={};
        elementsForm.forEach(function(element){
            if(element.id){
                if(element.tagName === 'INPUT'){
                    if(element.type === 'checkbox'){
                        getJson[element.id] = element.checked;
                    }else{
                        getJson[element.id] = element.value.trim();
                    }
                }else if(element.tagName === 'SELECT'){
                    getJson[element.id] = element.value.trim();
                }
            }
        });
        console.log(getJson);
        return getJson;    
    }

    getDataFormData(){
        var elementsForm = this.objForm.querySelectorAll('input, select');
        elementsForm.forEach(function(element){
            if(element.id){
                if(element.tagName === 'INPUT'){
                    if(element.type === 'checkbox'){
                        this.fromData.append(element.id, element.checked);
                    }else{
                        this.fromData.append(element.id, element.value.trim());
                    }
                }else if(element.tagName === 'SELECT'){
                    this.fromData.append(element.id, element.value.trim());
                }
            }
        });
        return this.fromData;
    }

    setDataFormJson(json){
        let elements = this.myForm.querySelectorAll("input, select");
        for(let i = 0 ; i < elements.length; i++){
            if(elements[i].type === 'checkbox'){
                document.getElementById(elements[i].id).checket = (json[elements[i].id]==0)?false:true;
            }
            else{
                document.getElementById(elements[i].id).value = json[elements[i].id];
            }
            
        }
    }

    setValidateForm(){
        const objForm = this.myForm;
        const inputs = objForm.querySelectorAll('input');
        const selects = objForm.querySelectorAll('select');
        let formValidate = true;
        for(const input of inputs){
            if(!this.validateInput(input)){
                formValidate = false;
                this.showMessageError(input);
            }
        }
        for(const select of selects){
            if(select.value == 0){
                formValidate = false;
                select.focus();
            }
        }
        if(formValidate){
            this.hiddenMessageError();
            return true;
        }else{
            return true;
        }
    }

    validateInput(input){
        const type = input.type;
        switch(type){
            case 'text':
                return this.validateText(input);
            case 'email':
                return this.validateEmail(input);
            case 'password':
                return this.validatePassword(input);
            case 'number':
                return this.validateNumber(input);
            default: 
            return true;
        }
    }

    validateText(input){
        if(input.value === '' || input.value.trim === '' || input.value.length < 4){
            return false;
        }
        return true;
    }

    validateEmail(input){
        const regex = /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/;
        return regex.test(input.value);
    }

    validatePassword(input){
        if(input.value.length < 8){
            return false;
        }
        return true;
    }

    validateNumber(input){
        if(isNaN(input.value)){
            return false;
        }
        return true;
    }


    showMessageError(input){
        input.classList.add('error');
        const messageError = document.createElement('span');
        messageError.classList.add('message-error');
        messageError.textContent = 'This field is invalid'
        input.parentNode.appendChild(messageError);
    }

    hiddenMessageError(){
        const message = document.querySelectorAll('.message-error');
        for(let data of message){
            data.innerHTML = "";
        }
    }


}