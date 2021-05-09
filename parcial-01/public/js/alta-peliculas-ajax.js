window.addEventListener('DOMContentLoaded', function() {
    const formPeliAlta = document.getElementById('form-pelicula-alta');
    const inputNombre = document.getElementById('nombre');
    const inputPaisId = document.getElementById('pais_id');
    const inputPrecio = document.getElementById('precio');
    const inputFechaEstreno = document.getElementById('fecha_estreno');
    const inputDescripcion = document.getElementById('descripcion');
    const inputImagen = document.getElementById('imagen');
    const inputGeneros = document.getElementsByName('generos[]');
    const tokenCSRF = document.getElementsByName('_token')[0].value;

    formPeliAlta.addEventListener('submit', function(ev) {
        ev.preventDefault();

        const generos = [];

        for(let i = 0; i < inputGeneros.length; i++) {
            if(inputGeneros[i].checked) {
                generos.push(inputGeneros[i].value);
            }
        }

        const data = {
            nombre: inputNombre.value,
            pais_id: inputPaisId.value,
            precio: inputPrecio.value,
            fecha_estreno: inputFechaEstreno.value,
            descripcion: inputDescripcion.value,
            // generos: generos
            generos, // ES6
            _token: tokenCSRF
        };

        fetch('./../ajax/peliculas/nueva', {
            method: 'post',
            body: JSON.stringify(data),
            headers: {
                // Para que Laravel sepa que tiene que buscar la data en el input de entrada de php, y no
                // en $_POST, le aclaramos el Content-Type pertinente.
                'Content-Type': 'application/json',
                // Para que Laravel sepa que la petición es de Ajax, y por lo tanto, genere JSONs en sus
                // respuesta, agregamos este encabezado.
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(rta => rta.json())
            .then(rta => {
                console.log("La respuesta de ajax es: ", rta);
            });
    });
});
