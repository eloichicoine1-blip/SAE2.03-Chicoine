import { Movie } from "../Movie/script.js";

let templateFile = await fetch("./component/MovieCategory/template.html");
let template = await templateFile.text();

let MovieCategory = {};

MovieCategory.format = function(categoriesData){
    let allCategoriesHtml = "";

    for (let categoryObj of categoriesData) {
        let html = template;
        html = html.replaceAll("{{name}}", categoryObj.label);
        
        let moviesHtml = Movie.format(categoryObj.movies);
        
        html = html.replaceAll("{{list}}", moviesHtml);
        allCategoriesHtml += html;
    }

    return allCategoriesHtml;
};

export { MovieCategory };