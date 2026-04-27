let templateFile = await fetch("./component/FormAdd/template.html");
let template = await templateFile.text();

let templateLiFile = await fetch("./component/FormAdd/templateLi.html");
let templateLi = await templateLiFile.text();

let FormAdd = {};

FormAdd.format = function(data, handler) {
    let html = template;
    let Options = ""; 
    
    for (let categorie of data) {
        let li= templateLi;

      li=li.replaceAll("{{id}}", categorie.id)
      li=li.replaceAll("{{nom_categorie}}", categorie.name)

      Options +=li;
    }


   html=html.replaceAll("{{options_categories}}", Options);
      
html = html.replaceAll("{{handler}}", handler);

    return html;
}

export { FormAdd };