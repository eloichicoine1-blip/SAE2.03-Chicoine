let templateFile = await fetch("./component/Movie/template.html");
let template = await templateFile.text();

let templateLiFile = await fetch("./component/Movie/templateLi.html");
let templateLi = await templateLiFile.text();

let Movie = {};

Movie.format = function (data) {
    let html = template;
   if (data.length == 0) {
    return html.replaceAll 
        ("{{Movie}}", "<p class='movie_empty' >Aucun film pour le moment</p>");
   }
   else{
       let menuHTML = "";
       for (let menu of data) {
           let li = templateLi;
           li = li.replaceAll("{{Img}}", "../server/images/" + menu.image);
           li = li.replaceAll("{{Title}}", menu.name);
           
           menuHTML += li;
    
       }
       html = html.replace("{{Movie}}", menuHTML);
       return html;

   }

   


};


export { Movie };