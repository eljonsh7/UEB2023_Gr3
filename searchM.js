import {getDatabase, ref, get, set, child, update, remove}
    from "https://www.gstatic.com/firebasejs/9.18.0/firebase-database.js";

    const db = getDatabase();
    
    
function SelectData() {
    let movie = document.getElementById("movieSearch").value.toUpperCase();
    const dbref = ref(db);
    const divRes = document.getElementById("searchResult");
    const children = divRes.childNodes;
    let newResults = [];
    if(movie !== "" && movie.length > 1){
        for (let i = 1; i < 20; i++) {
            get(child(dbref, "movies/" + i)).then((snapshot) => {
                if (snapshot.exists()) {
                    if (snapshot.val().Title.toUpperCase().indexOf(movie) > -1) {
                        var imgTest1 = document.createElement('img');
                        imgTest1.width = 200;
                        imgTest1.src = snapshot.val().Cover;
                        imgTest1.alt = snapshot.val().Title;
                        imgTest1.className = "sResults";
                        newResults.push(imgTest1);
                        for(let j = -1; j < children.length; j++){
                            if(j>-1){
                                if(imgTest1.alt == children[j].alt){
                                    break;
                                }
                            }
                            if(j == (children.length-1)){
                                document.getElementById("searchResult").appendChild(imgTest1);
                            }
                        }
                    }
                }else{
                    console.log("Doesn't exist!");
                }

            })
        
        }
            let childrenToRemove = [];
            for (let i = 0; i < children.length; i++) {
                let exists = false;
                for (let j = 0; j < newResults.length; j++) {
                    if (children[i].alt == newResults[j].alt) {
                        exists = true;
                        break;
                    }
                }
                if (!exists) {
                    childrenToRemove.push(children[i]);
                }
            }
            for (let i = 0; i < childrenToRemove.length; i++) {
                divRes.removeChild(childrenToRemove[i]);
            }
        
        
    }else if(movie.length < 2){
        while (divRes.firstChild) {
            divRes.removeChild(divRes.lastChild);
        }
    }

}



    let sub = document.getElementById("Test12345");
    let searchbar = document.getElementById("movieSearch");
    
    searchbar.addEventListener('input',SelectData);
    sub.addEventListener('click',SelectData);