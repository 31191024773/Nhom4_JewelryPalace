// js phần reponsive thanh menu
const bar = document.getElementById('bar');
const close = document.getElementById('close');
const nav = document.getElementById('navbar');

if (bar) {
    bar.addEventListener('click', () => {
        nav.classList.add('active');
    })
}

if (close) {
    close.addEventListener('click', () => {
        nav.classList.remove('active');
    })
}

function Change(i) {
    var table = document.getElementById('order');
    var row = table.tBodies[0].rows.length;
    document.getElementById('s' + i).value = document.getElementById('p' + i).value * document.getElementById('q' + i).value
    document.getElementById('s' + i).value *= 1000
    document.getElementById('s' + i).value = (Math.round(document.getElementById('s' + i).value * 100) / 100).toLocaleString()
    var total = 0
    for (var j = 0; j < row; j++) {
        var temp = (document.getElementById('p' + j).value * document.getElementById('q' + j).value) * 1000
        total += temp;
    }

    document.getElementById('cs').value = (Math.round(total * 100) / 100).toLocaleString()
    document.getElementById('total').value = (Math.round(total * 100) / 100).toLocaleString()
}