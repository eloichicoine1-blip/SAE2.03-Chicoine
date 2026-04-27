let templateFile = await fetch("./component/MovieDetail/template.html");
let template = await templateFile.text();

let MovieDetail = {};

MovieDetail.format = function (movie) {
    let html = template;

    
    html = html.replaceAll("{{titre}}", movie.name); 
    html = html.replaceAll("{{image}}", movie.image);
    html = html.replaceAll("{{realisateur}}", movie.director);
    html = html.replaceAll("{{annee}}", movie.year);
    html = html.replaceAll("{{categorie}}", movie.nom_categorie); 
    html = html.replaceAll("{{restrictionage}}", movie.min_age);
    html = html.replaceAll("{{description}}", movie.description);

    
    if (movie.trailer !== null && movie.trailer !== "") {
        html = html.replaceAll("{{trailer}}", movie.trailer);
    } else {
        html = html.replaceAll("{{trailer}}", "about:blank"); 
    }

    return html;
};

export { MovieDetail };