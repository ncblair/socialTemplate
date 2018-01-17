$(document).ready(function(){
    console.log("page loaded, javascript connected");
	$(".butt").click(function(){
	    console.log("a button has been clicked");
		if ($(this).hasClass("selected")){
			$(this).removeClass("selected");
			$(this).css("border", "1px solid #FFFFFF");
			$(".gender").val("");
		}
		else{
			$(".butt").removeClass("selected");
			$(".butt").css("border", "1px solid #FFFFFF");
			$(this).addClass("selected");
			$(this).css("border", "1px solid #57BC90");
			$(".gender").val($(this).text());
		}
	});
});

function onChange(elem) {
    //compare the input to an appropriate regex to check whether input is good
    var isGoodInput = false;
    elem.value = elem.value.trim();
    if (containsClassName(elem, "first-name") || containsClassName(elem, "last-name")){
        isGoodInput = /^([A-Za-z]+)$/.test(elem.value);
    }
    if (containsClassName(elem, "email")){
        isGoodInput = /^(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/.test(elem.value);
    }
    if (containsClassName(elem, "password")){
        isGoodInput = /^(.{6,})$/.test(elem.value);
        if ($(".confirm-password").hasClass("goodInput")){
            if (elem.value != $(".confirm-password").val()){
                $(".confirm-password").removeClass("goodInput");
                $(".confirm-password").addClass("badInput");
            }
        }
    }
    if (containsClassName(elem, "confirm-password")){
        isGoodInput = /^(.{6,})$/.test(elem.value) && elem.value == $(".password").val();
    }
    if (containsClassName(elem, "birthmonth") || containsClassName(elem, "birthday") || containsClassName(elem, "birthyear")){
        isGoodInput = elem.value != "none";
    }
    
    
    //designate the input as either good or bad, based off of the 
    //regex. This is what makes the border change to red, and 
    //also is what allows for form submission only with good input
    if (isGoodInput) {
		if (containsClassName(elem, "badInput")) {
			elem.classList.remove("badInput");
		}
		elem.className += " goodInput";
	}
	else {
		if (containsClassName(elem, "goodInput")) {
			elem.classList.remove("goodInput");
		}
		elem.className += " badInput";
	}
}

function validateMySignUp(){
    var shouldSubmit = true;
    if (!$(".first-name").hasClass("goodInput")){
		shouldSubmit = false;
	}
	if (!$(".last-name").hasClass("goodInput")){
		shouldSubmit = false;
	}
	if (!$(".email").hasClass("goodInput")){
		shouldSubmit = false;
	}
	if (!$(".password").hasClass("goodInput")){
		shouldSubmit = false;
	}
	if (!$(".confirm-password").hasClass("goodInput")){
		shouldSubmit = false;
	}
	if (!$(".birthmonth").hasClass("goodInput")){
		shouldSubmit = false;
	}
	if (!$(".birthday").hasClass("goodInput")){
		shouldSubmit = false;
	}
	if (!$(".birthyear").hasClass("goodInput")){
		shouldSubmit = false;
	}
	var genders = document.getElementsByClassName("gend");
	var atleastOne = false;
	for (var i = 0; i < genders.length; i++) {
		if ($(genders[i]).hasClass("goodInput")) {
			atleastOne = true;
		}
	}
	if (!atleastOne) {
		shouldSubmit = false;
	}
	return shouldSubmit;
}



function containsClassName(elem, name) {
	for (var i = 0; i < elem.classList.length; i++) {
		if (elem.classList[i] == name) {
			return true;
		}
	}
	return false;
}