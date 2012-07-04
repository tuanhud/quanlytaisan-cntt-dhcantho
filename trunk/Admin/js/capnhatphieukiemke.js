// JavaScript Document
function ClearInputValue(n){
		$(n).val("")
	}
function FocusAndSelect(n){
		$(n).focus(),$(n).select()
	}
function CheckEmptyInput(n){
		return $(n).val()=="" ? ($(n).focus,$(n).select(),!1):!0
	}	
		