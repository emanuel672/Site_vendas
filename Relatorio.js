function showRegisterMessage(event) {
    event.preventDefault(); // Impede o envio do formulário

    // Mostra a notificação
    const Cnotificacao = document.getElementById('Cnotificacao');
    Cnotificacao.style.display = 'block';

    // Remove a notificação após 1 segundo
    setTimeout(() => {
        Cnotificacao.style.display = 'none';
    }, 1000);

    return false; // Para evitar o envio do formulário
}
function showLoginMessage(event) {
    event.preventDefault(); // Impede o envio do formulário

    // Mostra a notificação
    const Lnotificacao = document.getElementById('Lnotificacao');
    Lnotificacao.style.display = 'block';

    // Remove a notificação após 1 segundo
    setTimeout(() => {
        Lnotificacao.style.display = 'none';
        window.location.href = 'index.html';
    }, 1000);

    return false; // Para evitar o envio do formulário
}