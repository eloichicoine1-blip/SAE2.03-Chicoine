
let HOST_URL = "..";
let DataMovie = {};


DataMovie.add = async function (fdata) {
    let config = {
        method: "POST",
        body: fdata
    };
    let answer = await fetch(HOST_URL + "/server/script.php?todo=addmovies", config);
    let data = await answer.json();
    return data;
}; 

DataMovie.requestCategories = async function () {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readcategories");
    let data = await answer.json();
    console.log(data)
    return data;
};
export { DataMovie };





