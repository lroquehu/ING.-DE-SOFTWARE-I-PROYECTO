function enableEdit() {
    const inputs = document.querySelectorAll("input[type='text'], input[type='email']");
    inputs.forEach(input => input.removeAttribute("readonly"));

    document.querySelector('.custom-label').style.display = 'inline-block';
    document.querySelector('.save-btn').style.display = 'inline-block';
    document.querySelector('.cancel-btn').style.display = 'inline-block';
    document.querySelector('.edit-btn').style.display = 'none';
}

function cancelEdit() {
    window.location.reload();
}

function previewImage(event) {
    const file = event.target.files[0];
    const preview = document.getElementById("avatarPreview");
    const icon = document.querySelector(".default-icon");

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = "block";
            icon.style.display = "none";
        };
        reader.readAsDataURL(file);
    }
}