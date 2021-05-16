var catPrice = 4686000;

function cleaner() {

    localStorage.removeItem("isBuyable");

    var valuesHTMLcollection = document.getElementsByClassName("listEntryInput");
    for(i = 0; i < Array.from(valuesHTMLcollection).length; i++) {

        valuesHTMLcollection[i].value = undefined;

    }
}

function drawElements() {
    var contentWrapperElement = document.getElementById("contentWrapper");

    var resultWrapperElement = document.createElement("div");
    resultWrapperElement.setAttribute("id", "resultWrapper");

    var textHeader = document.createElement("span");
    textHeader.textContent = "Is it enough for a Caterpillar?";
    textHeader.setAttribute("class", "smallHeader isEnough");

    var resultPrintElement = document.createElement("div");
    resultPrintElement.setAttribute("id", "resultPrint");

    var restAmountElement = document.createElement("span");
    restAmountElement.setAttribute("id", "restAmount");
    restAmountElement.setAttribute("class", "smallHeader");

    var btnElement = document.createElement("button");
    btnElement.setAttribute("class", "btn btn-primary");
    btnElement.setAttribute("onclick", "back();")
    btnElement.textContent = "back";

    resultWrapperElement.appendChild(textHeader);
    resultWrapperElement.appendChild(resultPrintElement);
    resultWrapperElement.appendChild(restAmountElement);
    resultWrapperElement.appendChild(btnElement);

    contentWrapperElement.prepend(resultWrapperElement);
}

function nextExec() {

    var valuesHTMLcollection = document.getElementsByClassName("listEntryInput");

    var playerAmount = 0;

    for(i = 0; i < Array.from(valuesHTMLcollection).length; i++) {

        let tempAmount = parseInt(valuesHTMLcollection[i].value.match(/\d/g).join(''), 10)

        playerAmount = playerAmount + tempAmount;
    }
    
    if(playerAmount >= catPrice) {
        drawElements();
        document.getElementById("resultPrint").textContent = "Yes";

    } else {
        drawElements();
        document.getElementById("resultPrint").textContent = "No";
        document.getElementById("restAmount").textContent = "Rest amount needed: " + (catPrice - playerAmount) + " aUEC";

    }

}

function back() {
    cleaner();
    document.getElementById("resultWrapper").remove();
}