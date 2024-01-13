document.getElementById('uploadForm').addEventListener('submit', function (e) {
    e.preventDefault();
    
    var title = document.getElementById('title').value;
    var file = document.getElementById('file').files[0];

    if (title.trim() === '' || !file) {
        document.getElementById('status').innerText = 'Please fill in all fields.';
        return;
    }

    var formData = new FormData();
    formData.append('title', title);
    formData.append('file', file);

    fetch('upload.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('status').innerText = data.message;
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
