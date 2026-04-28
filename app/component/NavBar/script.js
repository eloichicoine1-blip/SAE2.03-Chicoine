let templateFile = await fetch("./component/NavBar/template.html");
let template = await templateFile.text();

let templateLiFile = await fetch("./component/NavBar/templateLi.html");
let templateLi = await templateLiFile.text();

let NavBar = {};

NavBar.format = function (hAbout, profiles, hProfile, hLogout) {
    let html = template;
    
    html = html.replaceAll("{{hAbout}}", hAbout);

    let Options = "";
    for (let profil of profiles) {
        let li = templateLi;
        li = li.replaceAll("{{id}}", profil.id);
        li = li.replaceAll("{{nom}}", profil.nom);
        Options += li;
    }

    html = html.replaceAll("{{options_profils}}", Options);
    html = html.replaceAll("{{hProfile}}", hProfile);
    html = html.replaceAll("{{hLogout}}", hLogout);

    return html;
};

export { NavBar };