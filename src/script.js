
const colors = [ '#3a4e36', '#943106', '#0f5479', '#b89700', '#24920e', '#914647' ];

let listItems = document.querySelectorAll('.cl-uses-right ul li');

listItems.forEach(function(item){
    item.style.color = colors[getRandomNumber()];
})

function getRandomNumber() {
    return Math.floor(Math.random() * colors.length);
}