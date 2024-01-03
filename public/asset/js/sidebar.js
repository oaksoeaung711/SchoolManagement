let sideBar = document.getElementById("side-bar");
let sideBarBtn = document.getElementById("side-bar-btn");
let closeBtn = document.getElementById("close-btn");

sideBarBtn.addEventListener('click',function(){
    sideBar.classList.toggle("absolute");
    sideBar.classList.toggle("inset-0");
    sideBar.classList.toggle("z-20");
    sideBar.classList.toggle("hidden");
    sideBar.classList.toggle("animate-widthExpand");
});

closeBtn.addEventListener('click',function(){
    sideBar.classList.toggle("absolute");
    sideBar.classList.toggle("inset-0");
    sideBar.classList.toggle("z-20");
    sideBar.classList.toggle("hidden");
    sideBar.classList.toggle("animate-widthExpand");
});


let expandTags = document.querySelectorAll('[data-toggle=expand]');

expandTags.forEach(tag => {
    if(tag.classList.contains('expand')){
        tag.nextElementSibling.style.height = tag.nextElementSibling.scrollHeight+"px";
        tag.parentElement.classList.add('bg-slate-200');
    }
    tag.addEventListener('click',function(){
        tag.classList.toggle('expand');
        if(tag.classList.contains('expand')){
            tag.nextElementSibling.style.height = tag.nextElementSibling.scrollHeight+"px";
            tag.parentElement.classList.add('bg-slate-200');
        }else{
            tag.nextElementSibling.style.height = 0;
            tag.parentElement.classList.remove('bg-slate-200');
        }
    });
});