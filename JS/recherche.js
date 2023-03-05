const searchBar = document.querySelector("#mon_input");

searchBar.addEventListener("keyup", (e) =>{
    const searchedLetters = e.target.value;
    const posts = document.querySelectorAll(".post");
    if (e.keyCode === 13) {
        filterElements(searchedLetters, posts);
      }
    
});

function filterElements(letters, elements) {
    if(letters.length > 2){
        for(let i = 0; i<elements.length; i++){
            if(elements[i].textContent.includes(letters)){
                elements[i].style.display = "block";
            }else{
                elements[i].style.display = "none"
            }
        }
    }
}