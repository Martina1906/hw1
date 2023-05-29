
// INZIO JAVASCRIPT PER RICERCA FILM
    function onJson1(json) {
        console.log(json);
        const ris_ricerca = document.querySelector("#ris_ricerca");
        ris_ricerca.innerHTML = "";
      
        const error = json.Response;
        console.log(error);
        if(error == 'True')
        {
              for (let i = 0; i < 6; i++) {
                
                  const film = json.Search[i];
                  const title = film.Title;
      
                  const film_input = title;
                  
                  rest_url = "http://www.omdbapi.com/?i=tt3896198&apikey=b508cfd5&t=" + title+ "&plot=full";
        
                  fetch(rest_url).then(OnResponse).then(onJson2);
      
                  
      
                  function onJson2(json){
                  console.log(json);
                  const film2 = json;
                  const year = film2.Released;            
                  const poster = film2.Poster;
                  const Runtime = film2.Runtime;
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
                  durata.textContent = "Durata: "+ Runtime;
                  const preferito=document.createElement('button');
                  preferito.textContent='Aggiungi ai preferiti';
                  preferito.addEventListener("click", saveFilm);
                  
                  
         
                  f.appendChild(img);
                  f.appendChild(titolo);
                  f.appendChild(anno);
                  f.appendChild(gener);
                  f.appendChild(durata);
                  f.appendChild(preferito);
          
                   ris_ricerca.appendChild(f);
                   
                   
                  }
        }
       }
      else
      {
          const errore=json.Error;
          console.log(errore);
          const er = document.createElement("h1");
          er.textContent = "ERRORE: " + errore;
          ris_ricerca.appendChild(er);
      
      }
      
      }
      
    function OnResponse(response){
    console.log("Risposta ricevuta");
    return response.json();

}

function search(event){
    const form_data = new FormData(document.querySelector("#films"));
    event.preventDefault();
    const film_input = document.querySelector('#film');
    const film_value = encodeURIComponent(film_input.value);
    fetch("cerca_film.php?q="+ film_value).then(OnResponse).then(onJson1);
    
    
}

const form_f = document.querySelector("#films");
form_f.addEventListener("submit", search);

//FINE JAVASCRIPT PER RICERCA FILM


//INIZIO SAVE FILM







function saveFilm(event){
    console.log("Salvataggio")

    
    const film2 = event.currentTarget.parentNode;
    const formData = new FormData();

    formData.append('id', film2.dataset.id);
    formData.append('title', film2.dataset.title);
    formData.append('year', film2.dataset.year);
    formData.append('genre', film2.dataset.genre);
    formData.append('runtime', film2.dataset.runtime);
    formData.append('poster', film2.dataset.poster);


    fetch("save_film.php", {method: 'post', body: formData}).then(dispatchResponse, dispatchError);
    event.stopPropagation();
}

function dispatchResponse(response) {

    console.log(response);
    return response.json().then(databaseResponse);
}

function dispatchError(error){
    console.log("errore");
}


function databaseResponse(json){
    if(!json.ok){
        dispatchError();
        return null;
    }
}







// FINE SAVE FILM




