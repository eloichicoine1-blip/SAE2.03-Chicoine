let HOST_URL = ".";
let DataProfile = {};

DataProfile.read = async function (id = null) {
    let url = "/server/script.php?todo=readProfiles";
    
    if(id){
        url += "&id=" + id;
    }
    
    let answer = await fetch(HOST_URL + url);
    let data = await answer.json();
    return data;
};

export { DataProfile };