const rank1 = document.querySelector("#rank_1");
const rank2 = document.querySelector("#rank_2");
const rank3 = document.querySelector("#rank_3");
const rank4 = document.querySelector("#rank_4");
const rank5 = document.querySelector("#rank_5");
const ranks = [rank1, rank2, rank3, rank4, rank5];
let rankIndex = 0;
for(let e of ranks){
    e.style.display = `none`;
}
rank1.style.display = `block`;
setInterval(function(){
    rankIndex++;
    if(rankIndex === 6) rankIndex = 1;
    for(let e of ranks){
        e.style.display = `none`;
    }
    document.querySelector(`#rank_${rankIndex}`).style.display = `block`;
}, 5000);