function checkInputs() {

    if (document.getElementById('title').value == '') {
        document.getElementById('alert').hidden = false;

        setTimeout(function () { 
            document.getElementById('alert').hidden = true; 
        }, 3000); 

        event.preventDefault();
    }

    if (document.getElementById('head').value == document.getElementById('base').value) {
        document.getElementById('alert-not-different').hidden = false;

        setTimeout(function () { 
            document.getElementById('alert-not-different').hidden = true; 
        }, 3000); 

        event.preventDefault();
    }
}