import {getDatabase, ref, get, set, child, update, remove}
    from "https://www.gstatic.com/firebasejs/9.18.0/firebase-database.js";

    const db = getDatabase();
    
    
    
    function SelectData(){
        let movie = document.getElementById("movieSearch").value.toUpperCase();
        console.log(movie);
        removeResult(movie);
        var letters = /^[A-Za-z0-9]+$/;
        console.log(letters);
        if(letters.test){
            const dbref = ref(db);
            for(let i = 1;i<8;i++){
                let temp = false;
                get(child(dbref, "movies/" + i)).then((snapshot) => {
                    if(snapshot.val().Title.toUpperCase().indexOf(movie)>-1){
                        if(snapshot.exists()){
                            var imgTest1 = document.createElement('img');
                            imgTest1.width=200;
                            imgTest1.src=snapshot.val().Cover;
                            imgTest1.alt=snapshot.val().Title;
                            imgTest1.className="sResults";
                        }else{
                            console.log("Doesn\'t exist!");
                        }
                        var divChildren = document.getElementById("searchResult").children;
                        
                        for(let i = 0; i<divChildren.length;i++){
                            if(imgTest1.alt == divChildren[i].alt){
                                temp=true;
                                break;
                            }
                        }
                        if(temp==false){
                            document.getElementById("searchResult").appendChild(imgTest1);
                        }
                        
                    }
                })
            }
            var divChildren = document.getElementById("searchResult").children;
            // console.log(results);
            for(let i = 0;i<divChildren.length;i++){
                console.log(divChildren[i].alt);
            }
        }
    }

    function removeResult(movie){
        var divChildren = document.getElementById("searchResult").children;
        for(let i = 0 ; i < divChildren.length;i++){
            if(divChildren[i].alt.toUpperCase().indexOf(movie)<=-1){
                document.getElementById("searchResult").removeChild(divChildren[i]);
                console.log("Child " + i + " was removed!");
            }
            // if (!x.match(results[i])){
            //     document.getElementById("searchResult").remove[i];
            // }
        }
    }
    
    let sub = document.getElementById("Test12345");
    let searchbar = document.getElementById("movieSearch");
    
    searchbar.addEventListener('keyup',SelectData);
    sub.addEventListener('click',SelectData);