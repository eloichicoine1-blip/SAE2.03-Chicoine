import { Movie } from "../Movie/script.js";
let templateFile = await fetch("./component/MovieCategory/template.html");
let template = await templateFile.text();

let MovieCategory ={};

MovieCategory.format = function(container, data){
    let html = template;
    html = html.replaceAll("{{name}}", container);
    html = html.replaceAll("{{list}}", data);
    return html;
};

export {MovieCategory};
