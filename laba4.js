

function addRow() {
 var tbodyRef = document.getElementsByTagName("tbody")[0];
 console.log(tbodyRef)
 var newRow = tbodyRef.insertRow();
 newRow.className = "AddTable";
 for (let i = 0; i < document.getElementsByTagName("th").length; i++) {
    var newCell = newRow.insertCell();
    var newText = document.createTextNode(document.getElementsByTagName("input")[i].value);
    newCell.appendChild(newText);
    }

 for (let i = 0; i < document.getElementsByTagName("th").length; i++) {
    document.getElementsByTagName("input")[i].value = "";
 }
}


function eraseRowAll() {
 var row = document.getElementsByClassName("AddTable");
 for (let i = row.length - 1; i >= 0; i--) {
    row[i].remove();
 }

}
function eraseRow() {
 var row = document.getElementsByClassName("AddTable");
     if (row.length > 0){
      return row[row.length -1].remove();
     }
     else{
        alert("Все элементы удалены")
        console.log("Все элементы удалены")
     }
}

function changeColor(tagname, color) {
 for (let i = 0; i < document.getElementsByTagName(tagname).length; i++) {
       document.getElementsByTagName(tagname)[i].style.color = color
 }
}

function changeSize(max,min) {
 var elem = document.getElementById("clock");
 elem.style.fontSize = Math.floor(Math.random() * (max - min) + min) +"px";
}

function addEvents(tagname, color, max, min) {
 var btn = document.getElementById("footer_button");
 btn.addEventListener("click", changeColor(tagname, color));
 btn.addEventListener("click", changeSize(max, min));
}

