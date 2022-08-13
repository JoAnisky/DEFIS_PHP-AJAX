const form = document.querySelector('form');
const input = document.querySelector('input');

form.addEventListener('submit', (e)=> {
    e.preventDefault();

    const formValue = new FormData(form);
    fetch("insert.php", {
        method: "POST",
        body : formValue
    })
    .then(res => {
        
        if (!res.ok) {
            throw new Error(`Error status: ${res.status}`);
        }
        return res.json()
    })
    .then(data => console.log(data))
})