// FADE-IN
console.log('test')
const items = document.getElementsByClassName('fade-in');
console.log(items)
for (const item of items) {
    item.classList.add('fade');
}
console.log(items)
const cb = function(entries){
    entries.forEach(entry => {
        if(entry.isIntersecting){
            entry.target.classList.add('inview');
        }
    });
}
const obs = new IntersectionObserver(cb);
for(let i=0; i < items.length; i++){
    obs.observe(items[i]);
}


