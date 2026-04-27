let HOST_URL = "..";

let DataMovie = {};

DataMovie.requestMovies = async function(){
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readmovies");
  
    let data = await answer.json();
    return data;
}

DataMovie.requestMovieDetails = async function(id) {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readMovieDetail&id=" + id);
    let data = await answer.json();
    return data;
}


export {DataMovie};
