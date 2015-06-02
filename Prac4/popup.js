// Validating Empty Field
function check_empty() {
if (document.getElementById('name').value == "" || document.getElementById('name').value.length < 4) {
alert("Fill Name Fields and at Least 4 Character !");
return false;
} else {
document.getElementById('form').submit();
alert("Form Submitted Successfully...");
}
}
//Function To Display Popup
function div_show() {
document.getElementById('restoo').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
document.getElementById('restoo').style.display = "none";
}

function check_empty1() {
if (document.getElementById('name1').value == "" || document.getElementById('name1').value.length < 4) {
alert("Fill Name Fields and at Least 4 Character !");
return false;
} else {
document.getElementById('form1').submit();
alert("Form Submitted Successfully...");
}
}

//Function To Display Popup
function div_show1() {
document.getElementById('restoo1').style.display = "block";
}
//Function to Hide Popup
function div_hide1(){
document.getElementById('restoo1').style.display = "none";
}

function check_empty2() {
if (document.getElementById('name2').value == "" || document.getElementById('name2').value.length < 4) {
alert("Fill Name Fields and at Least 4 Character !");
return false;
} else {
document.getElementById('form2').submit();
alert("Form Submitted Successfully...");
}
}

//Function To Display Popup
function div_show2() {
document.getElementById('restoo2').style.display = "block";
}
//Function to Hide Popup
function div_hide2(){
document.getElementById('restoo2').style.display = "none";
}

function resetForm(form) {
    // clearing inputs
    var inputs = form.getElementsByTagName('input');
    for (var i = 0; i<inputs.length; i++) {
        switch (inputs[i].type) {
            // case 'hidden':
            case 'text':
                inputs[i].value = '';
                break;
            case 'radio':
            case 'checkbox':
                inputs[i].checked = false;   
        }
    }

    // clearing selects
    var selects = form.getElementsByTagName('select');
    for (var i = 0; i<selects.length; i++)
        selects[i].selectedIndex = 0;

    // clearing textarea
    var text= form.getElementsByTagName('textarea');
    for (var i = 0; i<text.length; i++)
        text[i].innerHTML= '';

    return false;
}