let HOST_URL = "."; 
let DataProfile = {};

DataProfile.profiles = [];

DataProfile.add = async function (fdata) {
    let config = { method: "POST", body: fdata };
    let answer = await fetch(HOST_URL + "/server/script.php?todo=addProfile", config);
    return await answer.json();
}

DataProfile.read = async function () {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readProfiles");
    DataProfile.profiles = await answer.json(); 
    return DataProfile.profiles;
}


DataProfile.getById = function(id) {
    for (let profil of DataProfile.profiles) {
        if (profil.id == id) {
            return profil; 
        }
    }
    return null; 
}

export { DataProfile };