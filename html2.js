fetch("https://online-movie-database.p.rapidapi.com/auto-complete?q=avengers", {
    "method": "GET",
    "headers": {
        "X-RapidAPI-Host": "online-movie-database.p.rapidapi.com" ,

        "x-rapidapi-key": "2636ec30bbmsh785481014c59b70p1ee187jsn576ca8a1bd87"
    }
})
.then(response => response.json())
.then(data => {
    const list = data.d;

    list.map((item) => {
        const name = item.l;
        const poster = item.i.imageUrl;
        const movie = `<li><img src="${poster}"> <h2>${name}</h2></li>`
        document.querySelector('.movies').innerHTML += movie;
    })
})
.catch(err => {
    console.error(err);
});







