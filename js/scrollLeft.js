const clicks = document.querySelectorAll(".click")
const blocks = document.querySelectorAll(".page__content__block")
clicks.forEach(element =>{
    element.addEventListener("click", (e) =>{
        clicks.forEach(element =>{element.classList.remove("active")})
        blocks.forEach(element =>{element.classList.remove("active-block")})
        const classFind = e.target.dataset.down
        const block = document.querySelector(`#${classFind}`)
        if(classFind === block.id){
            e.target.classList.add("active")
            // block.scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"})
            block.classList.add("active-block")
        }
    })
})