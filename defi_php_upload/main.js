const formUpload = document.querySelector('form');
const messageStatus = document.getElementById('status-message');

async function uploadFile() {
    let formData = new FormData(formUpload);
    await fetch('upload.php', {
      method: "POST", 
      body: formData
    })
    .then(response => {
        if(!response.ok){
            throw new Error(`Error status: ${response.status}`)
        }
        
        let errorMsg = response.headers.get('errorMsg');
        messageStatus.textContent = errorMsg;
        // return response.text();
    })
}

formUpload.addEventListener("submit", function(e){
    e.preventDefault();
    uploadFile();
});