window.addEventListener("load", init);

var ptag, dName, cupsDay, foodPrice, foodWeight, txtBox, navBox, navItem, numberForms;

function init(e){
    
    
    txtBox = document.querySelectorAll("input");
    
    numberForms = ["foodAmt", "foodCost", "foodPound"];
    
}



function checkData(e)
{
    console.log(txtBox);
    var errCheck = 0;
    for (var i=0; i<txtBox.length;i++){
        if (isFilled(txtBox[i])== false){
            txtBox[i].className = "form-control is-invalid";
            console.log("new false");
            errCheck++;
        }
        else if (numberForms.includes(txtBox[i].id)){
            console.log("entered the numbers check")
            if (isPositive(txtBox[i])==true){
                txtBox[i].className="form-control is-valid"
            }
            else{
                txtBox[i].className = "form-control is-invalid";
                errCheck++;
            }
        }
        else{
            txtBox[i].className="form-control is-valid";
        }
    }
    if(errCheck>0){
        return false;
    }
    else{ return true; }
}


function isFilled(something){
    if(something.value===""){
        return false;
    }
    else{ return true;}
}

function isPositive(something){
    if (isNaN(something.value) || something.value<0){
        return false;
    }
    else{ return true; }
}
