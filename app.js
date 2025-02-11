// Données des tables de jeux de rôle
let tables = [
    { id: 1, jeu: "Donjons & Dragons", placesMax: 5, inscrits: [] },
    { id: 2, jeu: "L'Appel de Cthulhu", placesMax: 4, inscrits: [] },
    { id: 3, jeu: "Starfinder", placesMax: 6, inscrits: [] }
];

// Fonction pour afficher les tables
function afficherTables() {
    const container = document.getElementById('tablesContainer');
    container.innerHTML = '';

    tables.forEach(table => {
        const tableDiv = document.createElement('div');
        tableDiv.classList.add('table');

        if (table.inscrits.length >= table.placesMax) {
            tableDiv.classList.add('closed');
            tableDiv.innerHTML = `<h3>${table.jeu} (Fermée)</h3>
                                  <p>Complet (${table.inscrits.length}/${table.placesMax} inscrits)</p>`;
        } else {
            tableDiv.innerHTML = `<h3>${table.jeu}</h3>
                                  <p>Places restantes : ${table.placesMax - table.inscrits.length}</p>
                                  <input type="radio" name="selectedTable" value="${table.id}" required>`;
        }
        container.appendChild(tableDiv);
    });
}

// Gestion de l'inscription
document.getElementById('inscriptionForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const nom = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const selectedTableId = document.querySelector('input[name="selectedTable"]:checked');

    if (!selectedTableId) {
        alert("Veuillez sélectionner une table.");
        return;
    }

    const table = tables.find(t => t.id == selectedTableId.value);

    if (table.inscrits.length < table.placesMax) {
        table.inscrits.push({ nom, email });
        alert(`Vous êtes inscrit à la table de ${table.jeu} !`);
    } else {
        alert("Désolé, cette table est déjà complète.");
    }

    afficherTables(); // Met à jour l'affichage des tables
});

// Initialisation de l'affichage
afficherTables();
