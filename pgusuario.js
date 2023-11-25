
document.addEventListener("DOMContentLoaded", function () {
    fetch('pgusuario.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('nomeUser').textContent = 'nome:' + data.NOME + '!';
            document.getElementById('raUser').textContent = data.MATRICULA;
            //document.getElementById('otherField').textContent = data.other_field;
            // Update other elements accordingly
        })
        .catch(error => console.error('Error fetching profile data:', error));
});
