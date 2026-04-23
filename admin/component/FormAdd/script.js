let templateFile = await fetch("./component/FormAdd/template.html");
let template = await templateFile.text();

let FormAdd = {};

FormAdd.format = function (handlerName) {
    let html = template;
    
    html = html.replace("{{handler}}", handlerName);
    return html;
};
export { FormAdd };