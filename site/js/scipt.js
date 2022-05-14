const buttonPlus = document.querySelector(".plus__button")

function clip(cout) {
    const price = document.querySelector("#price")
    const duble = document.querySelector("#dubl")
    const cargo = document.querySelectorAll("#cargo")
    cargo.forEach(element => {
        const options = element.querySelector(`option[value="${element.value}"]`)
        if(cout === 1){
            price.value = options.dataset.cargos
            duble.value = options.dataset.cargos
        }
        element.addEventListener("change", (e) => {
            const options = element.querySelector(`option[value="${element.value}"]`)
            if(cout === 1){
                price.value = options.dataset.cargos
                duble.value = options.dataset.cargos
                plus(price,options,1,duble)
            }
        })
        plus(price,options,1,duble)
    })
}
function plus(price,options,i,duble) {
    const plus = document.querySelectorAll(".plus")
    const minus = document.querySelectorAll(".minus")
    const input =  document.querySelector("#input__type").value = 1
    plus.forEach(element => {
        element.addEventListener("click", (e) => {
            e.preventDefault()
            const parrent = e.target.closest(".input__plus__minus")
            const input = parrent.querySelector("input")
            i++
            input.value = i
            price.value = parseInt(options.dataset.cargos) * i
            duble.value = parseInt(options.dataset.cargos) * i
            console.log(duble.value)
        })
    })
    minus.forEach(element => {
        element.addEventListener("click", (e) => {
            e.preventDefault()
            const parrent = e.target.closest(".input__plus__minus")
            const input = parrent.querySelector("input")
            if (input.value >= 2 && i > 1) {
                i--
            }
            input.value = i
            price.value = parseInt(options.dataset.cargos) * i
            duble.value = parseInt(options.dataset.cargos) * i
            console.log(duble.value)
        })
        
    })
}

document.addEventListener("DOMContentLoaded", (e) => {
    clip(1)
    const input =  document.querySelector("#input__type").value = 1
})


