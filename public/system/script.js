const textConfirmSignOff = 'Press a Button!\nEither OK or Cancel.';
function singOff(){
    method = 'POST';
    url = URI_LOGIN + 'singOff';
    data = "";
    if (confirm(textConfirmSignOff)== true){
        resultFetch = getData(data, method,url);
        resultFetch.then(response => response.json())
            .then(data => {
                location.assign('/login');
            })
            .catch(error=>{
                console.error(error);
            })
            .finally();
    }

    async function getData(data, method, url){
        var parameters;
        if(method == "GET"){
            parameters = {
                method: method,
                headers:{
                    "content-type": "application/json",
                    "X-Requested-With":"XMLHttpRequest"
                }
            }
        }else{
            parameters = {
                method: method,
                body: JSON.stringify(data),
                headers:{
                    "content-type": "application/json",
                    "X-Requested-With":"XMLHttpRequest"
                }                
            }
        }
        return await fetch(url, parameters);
    }
}

