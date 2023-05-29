

function fetchfilm(){
    fetch("fetch_film.php").then(fetchResponse).then(fetchFilmJson);
}


function fetchResponse(response){
    if (!response.ok){return null};
    return response.json();
}

function fetchFilmJson(json){
    console.log("Fetching");
    console.log(json);
    if (!json.length) { noResult(); return;}

    const ris_ricerca = document.querySelector("#ris_ricerca");
     ris_ricerca.innerHTML = "";

     const film2 = json;
                  const year = film2.Released;            
                  const poster = film2.Poster;
                  const runtime = film2.runtime;
                  const genere= film2.Genre;           
                  const f = document.createElement("div");
                  f.classList.add("film_r");
                 
                  const img = document.createElement("img");
                  img.src = poster;
                  const titolo = document.createElement("h1");
                  titolo.textContent = "Titolo: " + title;
                  const anno = document.createElement("h5");
                  anno.textContent = "Data di rilascio: " + year;
                  const gener = document.createElement("h5");
                  gener.textContent = "Genre: "+ genere;
                  const durata = document.createElement("h5");
                  durata.textContent = "Durata: "+ runtime;
                  
                  
                  
         
                  f.appendChild(img);
                  f.appendChild(titolo);
                  f.appendChild(anno);
                  f.appendChild(gener);
                  f.appendChild(durata);
                 
          
                   ris_ricerca.appendChild(f);
                   
}