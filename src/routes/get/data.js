getFormData = (myTargetForm) => Object.fromEntries(new FormData(document.querySelector(myTargetForm)))
    console.log('Output of getFormData:')
	console.log(getFormData('#myTargetForm'))