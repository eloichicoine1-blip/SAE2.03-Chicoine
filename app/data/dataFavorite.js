let HOST_URL = "..";

let DataFavorite = {};

DataFavorite.request = async function(id_profile){
    let url = "/server/script.php?todo=readfavorites&id_profile=" + id_profile;
    let answer = await fetch(HOST_URL + url);
    let data = await answer.json();
    return data;
}
DataFavorite.add = async function(id_profile, id_movie) {
    let url = "/server/script.php?todo=addfavorite&id_profile=" + id_profile + "&id_movie=" + id_movie;
    let answer = await fetch(HOST_URL + url);
    let data = await answer.json();
    return data;
}
DataFavorite.remove = async function(id_profile, id_movie) {
    let url = "/server/script.php?todo=removefavorite&id_profile=" + id_profile + "&id_movie=" + id_movie;
    let answer = await fetch(HOST_URL + url);
    let data = await answer.json();
    return data; 
};

export { DataFavorite };