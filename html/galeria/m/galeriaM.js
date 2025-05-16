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
                            <div class="col-sm-1 col-md-1 col-lg-3"></div>
                            <div class="col-sm-10 col-md-10 col-lg-6 col-xl-6">
                                <div class="card">
                                    <img src="${video.snippet.thumbnails.high.url}" class="card-img-top" alt="${video.snippet.title}">
                                    <div class="card-body">
                                        <h5 class="card-title">${video.snippet.title}</h5>
                                        <p class="card-text">${video.snippet.description}</p>
                                        <a href="https://www.youtube.com/watch?v=${video.id.videoId}" target="_blank" class="btn btn-success">Ver en YouTube</a>
                                        <form class="d-flex" acrole="search" action="configuracion.php?accion=favoritoA" method="post">
                                            <input type="text" value="${video.snippet.thumbnails.high.url}" class="form-control " id="img" name="img" hidden>
                                            <input type="text" value="${video.snippet.title}" class="form-control " id="titulo" name="titulo" hidden>
                                            <input type="text" value="${video.snippet.description}" class="form-control " id="desc" name="desc" hidden>
                                            <input type="text" value="${video.id.videoId}" class="form-control " id="url" name="url" hidden>
                                            <input type="text" value="${busqueda}" class="form-control " id="busqueda" name="busqueda" hidden>
                                            <button type="submit" target="_blank" class="btn btn-warning align-items-center">Agregar a favoritos</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1 col-md-1 col-lg-3"></div>
                        </div>
                `;

                videosContainer.innerHTML += videoHTML;
            });
        })
        .catch(error => console.error("Error:", error));
}