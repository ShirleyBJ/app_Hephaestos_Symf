// console.log("Start of script");

document.addEventListener("DOMContentLoaded",function(){
    const progressbarInner = document.querySelector(".progress-bar-inner");

    window.addEventListener('scroll', function(){
        let h = document.documentElement;
        //To know how far the scroll going
        let st = h.scrollTop || document.body.scrollTop;
        //sh : Equal to the page height(height of all page)
        let sh = h.scrollHeight || document.body.scrollHeight;
        //Client Height = height of the window /sh = height of the all page

        //Calculating what max scroll page is 
        let percent = st / (sh - h.clientHeight) * 100;
        //console.log(percent);
        let roundedPercent = Math.round(percent);
        progressbarInner.style.width = percent + "%";
        progressbarInner.innerText = roundedPercent + "%";
    })
})

// console.log("End of script");