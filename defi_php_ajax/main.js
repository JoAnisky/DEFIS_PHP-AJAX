const form = document.getElementById("add-form");
form.addEventListener("submit", function(e){
    e.preventDefault();
    addClient();
});

function addClient(){
    // Creer un objet FormData qui contiendra les données du formulaire
    // Fonctionne uniquement avec un formulaire
    const formData = new FormData(form);

    // Envoie le formData au script PHP client-add.php
    fetch('client.php', {
        method: "POST",
        body : formData
    })
    // Réponse du serveur (si la requête a fonctionné)
    .then(response => {
        if(!response.ok){
            throw new Error(`Error status: ${response.status}`)
        }
        // Retourne la réponse au format JSON
        return response.json();
    })
    // Réponse des données
    .then(data=> {
        // Log la réponse
        // console.log(data);
        // Reset les champs du formulaire
        form.reset();
    });
};
/*
Sur la même page que le défi précédent, afficher la liste de tous les clients (uniquement le nom). A côté de chaque nom, afficher un bouton voir plus.
Au clique du bouton voir plus, afficher l'adresse et la date de naissance du client en question.
*/
function clientList(){
    fetch('client.php', {method: "POST",})
    .then(response =>{return response.json()})
    .then(data =>{
        const tBody = document.querySelector('tbody');
        for (i = 0; i < data.length; i++) {

            let template = document.querySelector('#productrow');
            // Crée un clone du contenu (TD) à partir du template
            let clone = document.importNode(template.content, true);
            let td = clone.querySelectorAll("td");
            td[0].textContent = `${data[i].nom}`;
            td[0].setAttribute('data-value', `${data[i].id}`);
            tBody.appendChild(clone);

            const btnShowMore = document.querySelectorAll(".showMore");
            btnShowMore.forEach(btn => {
                    // td[1].textContent = `${data[i].adresse}`;   
                    // td[2].textContent = `${data[i].date_naissance}`;   

                btn.addEventListener('click', (e)=>{
                    let selectId = e.currentTarget.dataset.value

                    fetch('client.php', {method: "POST", Body: id})
                    .then(response =>{console.log((response));})
                    .then(data => {
                    })
                })
            })
        }
    })
}

window.addEventListener('DOMContentLoaded', () => {
    clientList();
});
