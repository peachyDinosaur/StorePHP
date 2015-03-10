window.onload = function () {
    //-------------------------------------------------------------------------
    // define an event listener for the '#createStoreForm'
    //-------------------------------------------------------------------------
    var createStoreForm = document.getElementById('createStoreForm');
    if (createStoreForm !== null) {
        createStoreForm.addEventListener('submit', validateStoreForm);
    }

    function validateStoreForm(event) {
        var form = event.target;

        if (!confirm("Is the form data correct?")) {
            event.preventDefault();
        }
    }

    //-------------------------------------------------------------------------
    // define an event listener for the '#createProgrammerForm'
    //-------------------------------------------------------------------------
    var editStoreForm = document.getElementById('editStoreForm');
    if (editStoreForm !== null) {
        editStoreForm.addEventListener('submit', validateStoreForm);
    }

    //-------------------------------------------------------------------------
    // define an event listener for any '.deleteProgrammer' links
    //-------------------------------------------------------------------------
    var deleteLinks = document.getElementsByClassName('deleteStore');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this store?")) {
            event.preventDefault();
        }
    }

};