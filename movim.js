const products = [
    { title: "Kit de Ferramentas", description: "Descrição detalhada do Kit de Ferramentas." },
    { title: "Capacete de Construção", description: "Descrição detalhada do Capacete." },
    { title: "Carrinho de Mão", description: "Descrição detalhada do Capacete." },
    // Adicione outros produtos aqui
];
document.querySelectorAll('.product').forEach((item, index) => {
    item.addEventListener('click', () => {
        document.getElementById('modal-title').innerText = products[index].title;
        document.getElementById('modal-description').innerText = products[index].description;
        document.getElementById('productModal').style.display = 'block';
    });
});
document.querySelector('.close').addEventListener('click', () => {
    document.getElementById('productModal').style.display = 'none';
});
window.onclick = function(event) {
    if (event.target == document.getElementById('productModal')) {
        document.getElementById('productModal').style.display = 'none';
    }
};
