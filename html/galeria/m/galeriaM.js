function buscarVideos() {
    // Obtener el texto
    const busqueda = document.getElementById("textoBuscar").value.trim();
    const cantidadV = document.getElementById("cantidadV").value;

    // Verificar que se mando respuesta
    if (busqueda === "") {
        alert("Por favor, ingresa un término de búsqueda.");
        return;
    }
    // Definir los parámetros de la API
    const data = {
        part: "snippet",
        maxResults: 5,
        key: "AIzaSyDi3-FNhawyNNd1_nduD-LjUp82hwwtMPM",
        type: "video"
    };

    // Construcción de la URL de la API
    const url = `https://www.googleapis.com/youtube/v3/search?part=${data.part}&maxResults=${cantidadV}&key=${data.key}&q=${busqueda}&type=${data.type}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            let videosContainer = document.getElementById("videosCarga");

            videosContainer.innerHTML = "";

            console.log(data);

            data.items.forEach(video => {
                let videoHTML = `
                        <div class="row align-items-start">
                            <div class="col-3"></div>
                            <div class="col-6">
                                <div class="card">
                                    <img src="${video.snippet.thumbnails.high.url}" class="card-img-top" alt="${video.snippet.title}">
                                    <div class="card-body">
                                        <h5 class="card-title">${video.snippet.title}</h5>
                                        <p class="card-text">${video.snippet.description}</p>
                                        <a href="https://www.youtube.com/watch?v=${video.id.videoId}" target="_blank" class="btn btn-success">Ver en YouTube</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3"></div>
                        </div>
                `;

                videosContainer.innerHTML += videoHTML;
            });
        })
        .catch(error => console.error("Error:", error));
}