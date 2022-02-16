function checkUser(uzer) {
    if (uzer.value == '') {
        O('feedback').innerHTML = ''
        return
    }


    params = "uzer=" + uzer.value;
    request = new ajaxRequest()
    request.open("POST", "checkuser.php", true)
    request.setRequestHeader("Content-type",
        "application/x-www-form-urlencoded")
    request.setRequestHeader("Content-length", params.length)
    request.setRequestHeader("Connection", "close")


    request.onreadystatechange = function () {
        if (this.readyState == 4)
            if (this.status == 200)
                if (this.responseText != null)
                    O('feedback').innerHTML = this.responseText;

    }
    request.send(params)
}
function ajaxRequest() {
    try {
        var request = new XMLHttpRequest()
    }
    catch (e1) {
        try {
            request = new ActiveXObject("Msxml2.XMLHTTP")
        }
        catch (e2) {
            try {
                request = new ActiveXObject("Microsoft.XMLHTTP")
            }
            catch (e3) {
                request = false
            }
        }
    }
    return request
}

let today=new Date();
O('yearnow').innerHTML=today.getFullYear()


function O(obj) {
    if (typeof obj == 'object')
        return obj
    else return document.getElementById(obj);
}
function S(obj) {
    return O(obj).style
}
function C(name) {
    let elements = document.getElementsByTagName('*')
    let objects = []
    for (let i = 0; i < elements.length; ++i)
        if (elements[i].classname == name)
            objects.push(elements[i])

    return objects

}

const tabClick = ({ target }) => {
    const { dataset: { id = '' } } = target;
    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
    target.classList.add('active');
    document.querySelectorAll('.tab-panel').forEach(t => t.classList.add('hidden'));
    document.querySelector(`#${id}`).classList.remove('hidden');
};

const bindTabs = () => {
    document.querySelectorAll('.tab').forEach(tab => {
        tab.addEventListener('click', tabClick);
    })
};

// Belts and braces, lets ensure our DOM is loaded and only assign click to the `tabs`
document.addEventListener('DOMContentLoaded', () => {
    bindTabs();
});


document.addEventListener('click', ({ target: { dataset: { id = '' } } }) => {
    if (id.length > 0) {
        document.querySelectorAll('.tap').forEach(t => t.classList.add('hidden'));
        document.querySelector(`#${id}`).classList.remove('hidden');
    }
});


/* global bootstrap: false */
(function () {
    'use strict'
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
      new bootstrap.Tooltip(tooltipTriggerEl)
    })
  })()
  
  $