let btn_change=document.getElementById('btn-change');
let change_pass=document.getElementById('change-pass');
let info=document.getElementById('info');
let tab=document.getElementById('change-pw');
btn_change.addEventListener('click',function(){
    info.style.display="none";
    tab.style.display="none";
    change_pass.style.display="initial";
})

