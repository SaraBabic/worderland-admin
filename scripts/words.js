document.querySelectorAll('.delete-word').forEach(item => {
    item.addEventListener("click", function(event) {
        let wordToDelete = item.dataset.word;

        fetchAllWords(wordToDelete);

    });
})

function fetchAllWords(wordToDelete) {
    let req = new XMLHttpRequest();

    req.onreadystatechange = () => {
        if (req.readyState == XMLHttpRequest.DONE) {
            let allWords = JSON.parse(req.responseText).record;
            let newWords = allWords.filter(word => {
                return word.sr !== wordToDelete;
            });
            let allWordsAsJson = JSON.stringify(newWords);
            deleteWordRequest(allWordsAsJson);
        }
    };

    req.open("GET", "https://api.jsonbin.io/v3/b/63ae941015ab31599e27f5fd", true);
    req.setRequestHeader("X-Master-Key", "$2b$10$Qfpc/cG24evUBJxRcmzxvuO8jhbxzCJF74mGiXKJhIGR9L3TRrtnm");
    req.setRequestHeader("X-Access-Key", "$2b$10$Q9hhj/cGfjIhZuvXob8A4uDibduDL/3831kUFxMby2IniEb6h968.");
    req.send();
}

function deleteWordRequest(allWordsAsJson) {
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