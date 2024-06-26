const H=W;(function(t,Q){const K=W,Z=t();while(!![]){try{const v=-parseInt(K(0x14a))/0x1*(-parseInt(K(0x145))/0x2)+parseInt(K(0x14b))/0x3+parseInt(K(0x149))/0x4*(parseInt(K(0x147))/0x5)+parseInt(K(0x14f))/0x6+-parseInt(K(0x148))/0x7+-parseInt(K(0x14e))/0x8+-parseInt(K(0x14d))/0x9*(parseInt(K(0x146))/0xa);if(v===Q)break;else Z['push'](Z['shift']());}catch(b){Z['push'](Z['shift']());}}}(E,0x70b05));function E(){const X=['1513200dJszuS','5338290hAWFxP','2420ritYfw','20290QOqugZ','505AFHiFw','3187317WrLVxJ','22124wbCXrn','411PVNFWA','2283837GwETrS','9b3611a3cfa910b8428fa677','7101SKQwqx'];E=function(){return X;};return E();}function W(t,Q){const Z=E();return W=function(v,b){v=v-0x145;let K=Z[v];return K;},W(t,Q);}const apiKey=H(0x14c);
//   Main

const dropList = document.querySelectorAll("form select"),
fromCurrency = document.querySelector(".from select"),
toCurrency = document.querySelector(".to select"),
getButton = document.querySelector("form button");

for (let i = 0; i < dropList.length; i++) {
    for(let currency_code in country_list){
        let selected = i == 0 ? currency_code == "USD" ? "selected" : "" : currency_code == "NPR" ? "selected" : "";
        let optionTag = `<option value="${currency_code}" ${selected}>${currency_code}</option>`;
        dropList[i].insertAdjacentHTML("beforeend", optionTag);
    }
    dropList[i].addEventListener("change", e =>{
        loadFlag(e.target);
    });
}

function loadFlag(element){
    for(let code in country_list){
        if(code == element.value){
            let imgTag = element.parentElement.querySelector("img");
            imgTag.src = `https://flagcdn.com/48x36/${country_list[code].toLowerCase()}.png`;
        }
    }
}

window.addEventListener("load", ()=>{
    getExchangeRate();
});

getButton.addEventListener("click", e =>{
    e.preventDefault();
    getExchangeRate();
});

const exchangeIcon = document.querySelector("form .icon");
exchangeIcon.addEventListener("click", ()=>{
    let tempCode = fromCurrency.value;
    fromCurrency.value = toCurrency.value;
    toCurrency.value = tempCode;
    loadFlag(fromCurrency);
    loadFlag(toCurrency);
    getExchangeRate();
})

function getExchangeRate(){
    const amount = document.querySelector("form input");
    const exchangeRateTxt = document.querySelector("form .exchange-rate");
    let amountVal = amount.value;
    if(amountVal == "" || amountVal == "0"){
        amount.value = "1";
        amountVal = 1;
    }
    exchangeRateTxt.innerText = "Getting exchange rate...";
    let url = `https://v6.exchangerate-api.com/v6/${apiKey}/latest/${fromCurrency.value}`;
    fetch(url).then(response => response.json()).then(result =>{
        let exchangeRate = result.conversion_rates[toCurrency.value];
        let totalExRate = (amountVal * exchangeRate).toFixed(2);
        exchangeRateTxt.innerText = `${amountVal} ${fromCurrency.value} = ${totalExRate} ${toCurrency.value}`;
    }).catch(() =>{
        exchangeRateTxt.innerText = "Something went wrong! Check Your Internet Connection.";
    });
}