window.addEventListener('beforeunload', function () {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/logout', true);
    xhr.setRequestHeader('X-CSRF-TOKEN', 'your-csrf-token');
    xhr.send();
});
