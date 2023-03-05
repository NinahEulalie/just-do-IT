const searchBar = document.querySelector(".navbar-center");

searchBar.addEventListener("keyup", (e) =>{
    const searchedLetters = e.target.value;
    const posts = document.querySelectorAll(".post");
    filterElements(searchedLetters, posts);
    
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