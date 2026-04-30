let templateFile = await fetch("./component/ProfileForm/template.html");
let template = await templateFile.text();

let ProfileForm = {};

ProfileForm.format = function(handler, profiles) {
    let html = template;
    let options = "";
    
    for (let p of profiles) {
        options += `<option value="${p.id}">${p.nom}</option>`;
    }
    
    html = html.replace("{{options}}", options);
    html = html.replace("{{handler}}", handler);
    return html;
}

export { ProfileForm };