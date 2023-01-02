const srbWord = document.getElementById('srbWord');
const level = document.getElementById('level');
const engWord = document.getElementById('engWord');
let lengthInput = document.getElementById('length');
engWord.addEventListener("input", function(event) {
    if (engWord.value.length) {
        lengthInput.value = engWord.value.length;
    }
});



document.querySelector('.addBtn').addEventListener('click', function (event) {
    let newWord = {
        sr: srbWord.value,
        eng: engWord.value,
        nivo: level.value,
        bodovi: lengthInput.value
    };
    fetchAllWords(newWord);
})


function fetchAllWords(newWord) {
    let req = new XMLHttpRequest();

    req.onreadystatechange = () => {
        if (req.readyState == XMLHttpRequest.DONE) {
            let allWords = JSON.parse(req.responseText).record;
            allWords.push(newWord);
            let allWordsAsJson = JSON.stringify(allWords);
            updateAllWordsRequest(allWordsAsJson);
        }
    };

    req.open("GET", "https://api.jsonbin.io/v3/b/63ae941015ab31599e27f5fd", true);
    req.setRequestHeader("X-Master-Key", "$2b$10$Qfpc/cG24evUBJxRcmzxvuO8jhbxzCJF74mGiXKJhIGR9L3TRrtnm");
    req.setRequestHeader("X-Access-Key", "$2b$10$Q9hhj/cGfjIhZuvXob8A4uDibduDL/3831kUFxMby2IniEb6h968.");
    req.send();
}

function updateAllWordsRequest(allWordsAsJson) {
    let req = new XMLHttpRequest();

    req.onreadystatechange = () => {
        if (req.readyState == XMLHttpRequest.DONE) {
            location.href = 'words.php';
        }
    };

    req.open("PUT", "https://api.jsonbin.io/v3/b/63ae941015ab31599e27f5fd", true);
    req.setRequestHeader("Content-Type", "application/json");
    req.setRequestHeader("X-Master-Key", "$2b$10$Qfpc/cG24evUBJxRcmzxvuO8jhbxzCJF74mGiXKJhIGR9L3TRrtnm");
    req.setRequestHeader("X-Access-Key", "$2b$10$Q9hhj/cGfjIhZuvXob8A4uDibduDL/3831kUFxMby2IniEb6h968.");
    req.send(allWordsAsJson);
}