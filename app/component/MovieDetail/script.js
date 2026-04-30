let templateFile = await fetch("./component/MovieDetail/template.html");
let template = await templateFile.text();

let MovieDetail = {};

MovieDetail.format = function (movie, favorites = []) {
    let html = template;

    
    html = html.replaceAll("{{titre}}", movie.name); 
    html = html.replaceAll("{{image}}", movie.image);
    html = html.replaceAll("{{realisateur}}", movie.director);
    html = html.replaceAll("{{annee}}", movie.year);
    html = html.replaceAll("{{categorie}}", movie.nom_categorie); 
    html = html.replaceAll("{{restrictionage}}", movie.min_age);
    html = html.replaceAll("{{description}}", movie.description);
    html = html.replaceAll("{{trailer}}", movie.trailer);

    let isFavorite = false; 
    
    for (let i = 0; i < favorites.length; i++) {
        if (favorites[i].id == movie.id) {
            isFavorite = true; 
        }
    }

    let favoriteHandler = "";
    let favoriteText = "";

    if (isFavorite) {
        favoriteHandler = "C.handlerRemoveFavorite('" + movie.id + "')";
        favoriteText = "Enlever des favoris";
    } else {
        favoriteHandler = "C.handlerAddFavorite('" + movie.id + "')";
        favoriteText = "Ajouter aux favoris";
    }
    
    html = html.replaceAll("{{favoriteHandler}}", favoriteHandler);
    html = html.replaceAll("{{favoriteText}}", favoriteText);
    return html;
};

export { MovieDetail };