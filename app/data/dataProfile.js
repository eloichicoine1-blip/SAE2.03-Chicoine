let HOST_URL = "..";
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

DataProfile.getProfile = function(id, profiles) {
    for (let p of profiles) {
        if (p.id == id) {
            return p;
        }
    }
    return null;
}

export { DataProfile };