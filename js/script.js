const opentButton = document.querySelectorAll(".model__window__open")

opentButton.forEach(button =>{
    button.addEventListener("click",(elem)=>{
        const block = elem.target.closest(".table__links")
        block.querySelector(".model__window").style.display="flex"
    })
})

const closes = document.querySelectorAll(".model__window")
closes.forEach(elem =>{
    elem.addEventListener("click",(e) =>{
        if(e.target.style.display === "flex"){
            e.target.style.display="none"
        }
    })
})

