const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
const tabLI = $$('.tab-li');
const tabInfo = $$('.tab-info');
tabLI.forEach((tab,index)=>{
    const info = tabInfo[index];
    tab.onclick = function(){
        $('.tab-info.active').classList.remove('active');
        info.classList.add('active');
    }
})