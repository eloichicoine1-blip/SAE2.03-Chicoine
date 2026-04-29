let HOST_URL = "https://mmi.unilim.fr/~chicoine3/SAE2.03-Chicoine";

let DataMovie = {};

DataMovie.requestMovies = async function (ageLimit) {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readmovies&age=" + ageLimit);
    let data = await answer.json();
    return data;
};

DataMovie.requestMovieDetails = async function(id) {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readMovieDetail&id=" + id);
    let data = await answer.json();
    return data;
}


export {DataMovie};
