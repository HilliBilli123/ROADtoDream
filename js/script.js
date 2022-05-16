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

function clip(car,vid,cargo,tonn){
    const price = document.querySelector("#price")
    const score = tonn.value
    const carChild = car.querySelector(`option[value="${car.value}"]`)
    const vidChild = vid.querySelector(`option[value="${vid.value}"]`)
    const cargoChild = cargo.querySelector(`option[value="${cargo.value}"]`)
    // console.log(carChild,vidChild,cargoChild)
    const carPrice = carChild.dataset.price
    const vidPrice = vidChild.dataset.price
    const cargoPrice = cargoChild.dataset.price
    let plus = parseInt(carPrice) + (parseInt(vidPrice) * score )+ (parseInt(cargoPrice) * score)
    // console.log(carPrice,vidPrice,cargoPrice,plus)
    price.value = plus
}
const car = document.querySelector("#car")
const vid = document.querySelector("#vid")
const cargo = document.querySelector("#cargo")
const tonn = document.querySelector("#tonn")
document.addEventListener("DOMContentLoaded",() =>{
    clip(car,vid,cargo,tonn)
})

car.addEventListener("change",(e) =>{
    clip(car,vid,cargo,tonn)
})
vid.addEventListener("change",(e) =>{
    clip(car,vid,cargo,tonn)
})
cargo.addEventListener("change",(e) =>{
    clip(car,vid,cargo,tonn)
})
tonn.addEventListener("change",(e) =>{
    clip(car,vid,cargo,tonn)
})


const add = document.querySelector(".aass")

add.addEventListener("click",(e)=>{
    const parent = e.target.closest(".table__header")
    const chang = parent.querySelector(".model__window")
    chang.style.display="flex"
})