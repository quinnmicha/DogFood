// JavaScript Document

//change p tag red
window.addEventListener("load", init);


var people, ptag, spans, output, input, errors = true, str, form, emailError, conf, confText, fName, lName, email, conEmail, phone;

function init(e)
{
    form = document.getElementById("form");
    conf = document.getElementById("confirmation");
    confText = document.getElementById("info");
    spans = document.querySelectorAll("span");
    ptag = document.querySelectorAll("p");
    people = document.querySelectorAll("input[type=text]");
    submit = document.querySelector("input[type=button]");
    email = document.getElementById("email");
    conEmail = document.getElementById("conEmail");
    fName = document.getElementById("first-name");
    lName = document.getElementById("last-name");
    phone = document.getElementById("phone");
    
    submit.addEventListener("click", addData);
    
    
}
//----------------------------------------------------------------

function addData(e)
{
    str = "";
    errors = false
    for(var i = 0; i < people.length; i++)
        {
            if (people[i].value == "")
                {
                    ptag[i].style.color = "red";
                    spans[i].innerHTML = "*";
                    errors = true;
                }
           
            else
                {
                    //alert(people[i].value);
                    ptag[i].style.color = "black";
                    spans[i].innerHTML = "";
                    
                }
        }
    emailConf();
    display();
    
}

function emailConf()
{
    if (email.value !== conEmail.value)
        {
            ptag[3].style.color="red";
            spans[3].style.color="*";
            emailError = true;
        }
    else
        {emailError = false;}
}

function display()
{
    if (errors == false && emailError == false)
        {
            form.style.display = "none";
            confPage();
        }
}

function confPage()
{
    var str = "";
    str+= fName.value + " ";
    str+= lName.value + "<br>";
    str+= email.value + "<br>";
    str+= phone.value;
   
    confText.innerHTML += str;
    conf.style.display = "block";
}
