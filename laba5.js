

function radio_check(){
var class_radio =  document.getElementsByClassName("inputChoiceRadio");
for (let i = 0; i < class_radio.length; i++) {
    console.log(class_radio[i].checked)
    if (class_radio[i].checked == true){
        return true
    }
 }
 return false
}

function checkbox_check(){
var class_radio =  document.getElementsByClassName("inputChoice");
for (let i = 0; i < class_radio.length; i++) {
    if (class_radio[i].checked == true){
        return true;
    }
 }
 return false;
}

function formValidation(form) {

    if ( form.group.selectedIndex == 0 )
        {
                alert ( "Пожалуйста, выберите классификацию" );
                return false;
        }
    if (radio_check() == false)
        {
                alert ( "Пожалуйста, выберите вариант ответа" );
                return false;
        }
    if (checkbox_check() == false){
        alert ( "Пожалуйста, выберите вариант ответа/ответов" );
        return false;
    }
    return true;
    }