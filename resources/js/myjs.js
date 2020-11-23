document.getElementById("selectall").onclick = function ()
{
    if (document.getElementsByName('task[]').length != 0) {
    	var checkboxes = document.getElementsByName('task[]');
	} else {
        var checkboxes = document.getElementsByName('user[]');
    }
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = true;
    }
};

document.getElementById("unselectall").onclick = function ()
{
    if (document.getElementsByName('task[]').length != 0) {
    	var checkboxes = document.getElementsByName('task[]');
    } else {
    	var checkboxes = document.getElementsByName('user[]');
    }
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = false;
    }
};
