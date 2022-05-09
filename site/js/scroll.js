const clicks = document.querySelectorAll(".click")

clicks.forEach(element =>{
    element.addEventListener("click", (e) =>{
        clicks.forEach(element =>{element.classList.remove("active")})
        const classFind = e.target.dataset.down
        const block = document.querySelector(`#${classFind}`)
        if(classFind === block.id){
            e.target.classList.add("active")
            block.scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"})
        }
    })
})