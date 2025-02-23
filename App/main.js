function addToCart(id){
    document.querySelector(".product_id").value = id;
    document.querySelector(".form").submit()
}

function resize(){
    let width = window.innerWidth;
    let times = Math.floor(width/232);
    let containerWidth = times*232 -32
    document.querySelector(".container").style.width = containerWidth + "px"
}
resize();
window.addEventListener("resize", resize)