const contein = document.querySelector(".maps")

const blockSize = contein.offsetWidth / 20
const addPPsP = contein.offsetHeight / 25
const addPPP = contein.offsetWidth / 25

console.log(addPPP)
let i = 0
while (i < 400) {
    const block = document.createElement("div")
    block.style.width = blockSize + "px"
    block.style.height = blockSize + "px"
    block.classList.add("add__block__maps")
    contein.appendChild(block)
    i++
}

const blockClick = document.querySelectorAll(".add__block__maps")
if(blockClick){
    blockClick.forEach(element =>{
        element.addEventListener("click", (e)=>{
            
        })
    })
}
