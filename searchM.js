import {getDatabase, ref, get, set, child, update, remove}
    from "https://www.gstatic.com/firebasejs/9.18.0/firebase-database.js";

    const db = getDatabase();
    
    
    // let results = [];
    // function SelectData(){
    //     let movie = document.getElementById("movieSearch").value.toUpperCase();
    //     console.log(movie);
    //     var divChildren = document.getElementById("searchResult").children;
    //     // for(let i = 0 ; i < divChildren.length;i++){
    //     //     if(!divChildren[i].alt.includes(movie)){
    //     //         document.getElementById("searchResult").removeChild(divChildren[i]);
    //     //         console.log("Child " + i + " was removed!");
    //     //     }
    //     // }
        
    //     var letters = /^[A-Za-z0-9]+$/;
    //     if(letters.test(movie)){
    //         const dbref = ref(db);
    //         for(let i = 1;i<8;i++){
    //             let temp = false;
    //             get(child(dbref, "movies/" + i)).then((snapshot) => {
    //                 if(snapshot.val().Title.toUpperCase().includes(movie)){
    //                     if(snapshot.exists()){
    //                         var imgTest1 = document.createElement('img');
    //                         imgTest1.width=200;
    //                         imgTest1.src=snapshot.val().Cover;
    //                         imgTest1.alt=snapshot.val().Title;
    //                         imgTest1.className="sResults";
    //                     }else{
    //                         console.log("Doesn\'t exist!");
    //                     }
    //                     for(let j = 0; j<divChildren.length;j++){
    //                         if(imgTest1.alt == divChildren[j].alt){
    //                             temp=true;
    //                             break;
    //                         }
    //                     }
    //                     if(temp==false){
    //                         document.getElementById("searchResult").appendChild(imgTest1);
    //                         results.push(imgTest1);
    //                     }
                        
    //                 }
    //             })
    //         }
    //     }
    //     console.log(results);
    //     results.forEach((r,index) => {
    //         const contains = (r.alt.toUpperCase().indexOf(movie)>-1);
    //         console.log(r.alt+" contains: " + contains);
    //         for(let i = 0; i<divChildren.length;i++){
    //             if(r.alt == divChildren[i].alt && contains == false){
    //                 document.getElementById("searchResult").removeChild(divChildren[i]);
    //                 results.splice(index,1);
    //             }
    //         }
    //     });
    // }
let results = [];

function SelectData() {
    let movie = document.getElementById("movieSearch").value.toUpperCase();
    const dbref = ref(db);
    const divRes = document.getElementById("searchResult");
    const children = divRes.childNodes;
    let newResults = [];
    if(movie !== "" && movie.length > 1){
        for (let i = 1; i < 20; i++) {
            get(child(dbref, "movies/" + i)).then((snapshot) => {
                if (snapshot.val().Title.toUpperCase().indexOf(movie) > -1) {
                    if (snapshot.exists()) {
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
                    }else {
                        console.log("Doesn't exist!");
                    }
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