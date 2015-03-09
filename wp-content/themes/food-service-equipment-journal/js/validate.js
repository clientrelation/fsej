// form validation
function validateForm(wForm) {
	wError = wForm.getAttribute("lastError")
	formItems = wForm.length
	for(i = 1; i <= formItems; i++) {
		wElement = wForm.elements[i - 1]
		setValType = ''
		setValType = wElement.getAttribute("valtype")
		if(wError != null && wError != '') {
			rsetObj = eval('wForm.' + wError)
			if(rsetObj.length > 1 && rsetObj[0].value != "") rsetObj = eval('wForm.' + wError + '[0]')
			rsetObj.style.color = "#000000"
			rsetObj.style.backgroundColor = "#FFFFFF"
		}
		switch(setValType) {
			case "valText":
				if(validateText(wElement,wForm) == false) {
					return (false)
				}	
				break
			case "valNumber":
				if(validateNumber(wElement,wForm) == false) {
					return (false)
				}	
				break
			case "valPrice":
				if(wElement.value.indexOf(".") != -1) {
					if(validatePrice(wElement,wForm) == false) {
						return (false)
					}
				} else {
					if(validateNumber(wElement,wForm) == false) {
						return (false)
					}						
				}
				break
			case "valPhone":
				if(validatePhone(wElement,wForm) == false) {
					return (false)
				}	
				break
			case "valEmail":
				if(validateEmail(wElement,wForm) == false) {
					return (false)
				}	
				break
			case "valEmail2":
				if(validateEmail2(wElement,wForm) == false) {
					return (false)
				}	
				break
			case "valSelect":
				if(validateSelect(wElement,wForm) == false) {
					return (false)
				}	
				break
			case "valChkBox":
				if(validateChkBox(wElement,wForm) == false) {
					return (false)
				}	
				break
			case "valRadio":
				if(validateRadio(wElement,wForm) == false) {
					return (false)
				}	
				break
			case "compareText":
				if(compareText(wElement,wForm) == false) {
					return (false)
				}	
				break
			case "compareText2":
				if(compareText2(wElement,wForm) == false) {
					return (false)
				}	
				break
			case "submitDisabled":
				setSubmitBtn = wElement
		}
	}
	if(typeof setSubmitBtn != "undefined") {
		setSubmitBtn.disabled = true
	}
	return (true)
}

function isdefined(object) {
	return (typeof(eval(object)) != "undefined");
}

function validateText(wObj,wForm) {
	if((wObj.getAttribute("allowotherchk") && chkOther(wObj,wForm) == true) || (wObj.getAttribute("allowvalchk") && chkAllowType(wObj,wForm) == true) || (!wObj.getAttribute("allowvalchk") && wObj.getAttribute("valrequired") == 1)) {
		var retValue = wObj.value;
		var ch = retValue.substring(0, 1);
		while (ch == " ") {
			retValue = retValue.substring(1, retValue.length);
			ch = retValue.substring(0, 1);
		}
		if(retValue == '') {
			alert("Please complete all the required fields before submitting")
			wObj.style.color = "#FFFFFF"
			wObj.style.backgroundColor = "#CC0000"
			wObj.focus()
			wForm.setAttribute("lastError",wObj.name)	
			return (false)
		}
	}
}

function validateNumber(wObj,wForm) {
	if((wObj.getAttribute("allowotherchk") && chkOther(wObj,wForm) == true) || (wObj.getAttribute("allowvalchk") && chkAllowType(wObj,wForm) == true) || (!wObj.getAttribute("allowvalchk") && wObj.getAttribute("valrequired") == 1)) {
		if(validateText(wObj,wForm) == false) return (false)
	}
	var numChk = /(^\d+$)/
	if(wObj.value!='') {
		if((!numChk.test(wObj.value) && wObj.getAttribute("allowvalchk") && chkAllowType(wObj,wForm) == true) || (!numChk.test(wObj.value) && !wObj.getAttribute("allowvalchk"))) {
			alert("Please input only numeric characters")
			wObj.style.color = "#FFFFFF"
			wObj.style.backgroundColor = "#CC0000"
			wObj.focus()
			wForm.setAttribute("lastError",wObj.name)	
			return (false)
		}
	}
}

function validatePrice(wObj,wForm) {
	if((wObj.getAttribute("allowotherchk") && chkOther(wObj,wForm) == true) || (wObj.getAttribute("allowvalchk") && chkAllowType(wObj,wForm) == true) || (!wObj.getAttribute("allowvalchk") && wObj.getAttribute("valrequired") == 1)) {
		if(validateText(wObj,wForm) == false) return (false)
	}
	var numChk = /(^\d+$)/
	if(wObj.value!='') {
		var priceArray = new Array()
		priceArray = wObj.value.split(".")
		if(priceArray.length != 2 || ((!numChk.test(priceArray[0]) || !numChk.test(priceArray[1]) || priceArray[1].length > 2) && wObj.getAttribute("allowvalchk") && chkAllowType(wObj,wForm) == true) || ((!numChk.test(priceArray[0]) || !numChk.test(priceArray[1]) || priceArray[1].length > 2) && !wObj.getAttribute("allowvalchk"))) {
			alert("Please input a valid price")
			wObj.style.color = "#FFFFFF"
			wObj.style.backgroundColor = "#CC0000"
			wObj.focus()
			wForm.setAttribute("lastError",wObj.name)	
			return (false)
		}
	}
}

function validatePhone(wObj,wForm) {
	numFull = eval('wForm.' + wObj.getAttribute("hiddenname") + '3.value')
	numArea = eval('wForm.' + wObj.getAttribute("hiddenname") + '2.value')
	numInt = eval('wForm.' + wObj.getAttribute("hiddenname") + '1.value')
	if(numFull == '' && numArea.length <= 3 && numInt.length <= 3) {
		wObj.value = '';
	} 
	else {
		wObj.value = numInt + '' + numArea + '' + numFull
		if(wObj.value.length < 7) {
			alert("Please input a valid contact number")
			wCnum = eval('wForm.' + wObj.getAttribute("hiddenname") + '3')
			wCnum.style.color = "#FFFFFF"
			wCnum.style.backgroundColor = "#CC0000"
			wCnum.focus()
			wForm.setAttribute("lastError",wCnum.name)	
			return (false)			
		} 
		else {
			wObj.value = numInt + ' ' + numArea + ' ' + numFull
		}
	}
}

function validateEmail(wObj,wForm) {
	if((wObj.getAttribute("allowvalchk") && chkAllowType(wObj,wForm) == true) || (!wObj.getAttribute("allowvalchk") && wObj.getAttribute("valrequired") == 1)) {
		if(validateText(wObj,wForm) == false) return (false)
	}
	if((wObj.value && wObj.getAttribute("allowvalchk") && chkAllowType(wObj,wForm) == true) || (wObj.value && !wObj.getAttribute("allowvalchk"))) {
		var valExpression = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!valExpression.test(wObj.value)) {
			alert("Please input a valid email address")
			wObj.style.color = "#FFFFFF"
			wObj.style.backgroundColor = "#CC0000"
			wObj.focus()
			wForm.setAttribute("lastError",wObj.name)	
			return (false)
		}
	}
}

function validateEmail2(wObj,wForm) {
	if((wObj.getAttribute("allowvalchk") && chkAllowType(wObj,wForm) == true) || (!wObj.getAttribute("allowvalchk") && wObj.getAttribute("valrequired") == 1)) {
		if(validateText(wObj,wForm) == false) return (false)
	}
	if((wObj.value && wObj.getAttribute("allowvalchk") && chkAllowType(wObj,wForm) == true) || (wObj.value && !wObj.getAttribute("allowvalchk"))) {
				var valExpression = /^(([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})([,;]\W?(?!$))?)+$/;
				if(!valExpression.test(wObj.value)) {
					alert("Please input valid email addresses and ensure each address is separated by either a comma or semi-colon")
					wObj.style.color = "#FFFFFF"
					wObj.style.backgroundColor = "#CC0000"
					wObj.focus()
					wForm.setAttribute("lastError",wObj.name)	
					return (false)
				}
	}
}

function validateSelect(wObj,wForm) {
	if((wObj.getAttribute("allowvalchk") && chkAllowType(wObj,wForm) == true) || (!wObj.getAttribute("allowvalchk") && wObj.getAttribute("valrequired") == 1)) {
		if((wObj.getAttribute("nselect") == 1 && wObj.selectedIndex == -1) || (!wObj.multiple && wObj.options[wObj.selectedIndex].value == '') || (wObj.multiple && wObj.options.length == 0)) {
			alert("Please complete all the required fields before submitting")
			wObj.style.color = "#FFFFFF"
			wObj.style.backgroundColor = "#CC0000"
			wObj.focus()
			wForm.setAttribute("lastError",wObj.name)	
			return (false)
		}
	}
}

function validateChkBox(wObj,wForm) {
	chkVal = 0
	if((wObj.getAttribute("allowvalchk") && chkAllowType(wObj,wForm) == true) || !wObj.getAttribute("allowvalchk")) {
		if(wObj.getAttribute("chkboxlength") != 0) {
			for(j = 1; j <= wObj.getAttribute("chkboxlength"); j++) {
				if(eval('wForm.' + wObj.getAttribute("chkboxname") + j)) {
					if(eval('wForm.' + wObj.getAttribute("chkboxname") + j + '.checked')) {
						chkVal = 1
					}
				} else if(eval('wForm.' + wObj.getAttribute("chkboxname") + '_' + j)) {
					if(eval('wForm.' + wObj.getAttribute("chkboxname") + '_' + j + '.checked')) {
						chkVal = 1
					}
				}
			}
		}
		else {
			if(eval('wForm.' + wObj.getAttribute("chkboxname") + '.checked')) {
				chkVal = 1
			}
		}
	}
	else {
		chkVal = 1
	}
	if(chkVal == 0) {
		alert("Please complete all the required fields before submitting")
		wObj.style.color = "#FFFFFF"
		wObj.style.backgroundColor = "#CC0000"
		wObj.focus()
		wForm.setAttribute("lastError",wObj.name)	
		return (false)
	}
}

function validateRadio(wObj,wForm) {
	chkVal = 0
	if((wObj.getAttribute("allowvalchk") && chkAllowType(wObj,wForm) == true) || !wObj.getAttribute("allowvalchk")) {
		for(j = 0; j < wObj.getAttribute("radiolength"); j++) {
			if(eval('wForm.' + wObj.getAttribute("radioname") + '[' + j + '].checked')) {
				chkVal = 1
			}
		}
	}
	else {
		chkVal = 1
	}
	if(chkVal == 0) {
		alert("Please complete all the required fields before submitting")
		wObj.style.color = "#FFFFFF"
		wObj.style.backgroundColor = "#CC0000"
		wObj.focus()
		wForm.setAttribute("lastError",wObj.name)	
		return (false)
	}
}

function compareText(wObj,wForm) {
	if((wObj.getAttribute("allowvalchk") && chkAllowType(wObj,wForm) == true) || (!wObj.getAttribute("allowvalchk") && wObj.getAttribute("valrequired") == 1)) {
		if(validateText(wObj,wForm) == false) return (false)
	}
	if((wObj.value && wObj.getAttribute("allowvalchk") && chkAllowType(wObj,wForm) == true) || (wObj.value && !wObj.getAttribute("allowvalchk"))) {
		if(wObj.value != eval("wForm." + wObj.getAttribute("compareto") + ".value")) {
			alert("Please make sure both the " + wObj.getAttribute("errortext") + " and Confirm " + wObj.getAttribute("errortext") + " fields match before submitting")
			wObj.style.color = "#FFFFFF"
			wObj.style.backgroundColor = "#CC0000"
			wObj.focus()
			wForm.setAttribute("lastError",wObj.name)	
			return (false)
		}
	}
}

function compareText2(wObj,wForm) {
	if((wObj.value && wObj.getAttribute("allowvalchk") && chkAllowType(wObj,wForm) == true) || (wObj.value && !wObj.getAttribute("allowvalchk"))) {
		if(wObj.value != eval("wForm." + wObj.getAttribute("compareto") + ".value")) {
			alert("Please make sure both the " + wObj.getAttribute("errortext") + " and Confirm " + wObj.getAttribute("errortext") + " fields match before submitting")
			wObj.style.color = "#FFFFFF"
			wObj.style.backgroundColor = "#CC0000"
			wObj.focus()
			wForm.setAttribute("lastError",wObj.name)	
			return (false)
		}
	}
}


function chkAllowType(wObj,wForm) {
	wType = eval('wForm.' + wObj.getAttribute("allowvalchk"))
	if(wType.length > 1) {
		if(wType[0].checked) {
			return (true)
		}
	}
	else {
		if(!wType.checked && wType.getAttribute("valsetting") == "off") {
			return (true)
		}
		else if(wType.checked && wType.getAttribute("valsetting") == "on") {
			return (true)
		}
	}
	return (false)
}


function chkOther(wObj,wForm) {
	wType = eval('wForm.' + wObj.getAttribute("allowotherchk"))
	if(wType.length > 1) {
		if(wType[wObj.getAttribute("otherfieldpos")].checked) {
			return (true)
		}
	}
	else {
		if(!wType.checked && wType.getAttribute("valsetting") == "off") {
			return (true)
		}
		else if(wType.checked && wType.getAttribute("valsetting") == "on") {
			return (true)
		}
	}
	return (false)
}