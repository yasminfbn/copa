// ===================== MENSAGENS =====================
document.addEventListener('DOMContentLoaded', () => {
    const mensagens = document.querySelectorAll('.success, .error');

    mensagens.forEach(msg => {
        setTimeout(() => {
            msg.classList.add('fadeOut');

            setTimeout(() => {
                msg?.remove();
            }, 500);

        }, 2000);
    });
});


// ===================== MENU KEBAB =====================
function toggleMenu(id) {
    const menu = document.getElementById('menu-' + id);
    if (!menu) return;

    const isHidden = menu.hasAttribute('hidden');

    document.querySelectorAll('.kebab-menu-list')
        .forEach(m => m.setAttribute('hidden', true));

    if (isHidden) {
        menu.removeAttribute('hidden');
    }
}

document.addEventListener('click', (e) => {
    if (!e.target.closest('.kebab-menu')) {
        document.querySelectorAll('.kebab-menu-list')
            .forEach(m => m.setAttribute('hidden', true));
    }
});


// ===================== MODAL =====================
function openDeleteModal(id, nome) {
    const modal = document.getElementById('deleteModal');
    const confirmBtn = document.getElementById('confirmDeleteBtn');
    const nameSpan = document.getElementById('itemName');

    if (!modal || !confirmBtn || !nameSpan) return;

    nameSpan.innerText = nome;
    confirmBtn.href = "?action=deletar&id=" + id;

    falarSistema("Você está prestes a excluir " + nome);

    modal.style.display = 'flex';
}

function closeDeleteModal() {
    const modal = document.getElementById('deleteModal');
    if (modal) modal.style.display = 'none';
}

window.addEventListener('click', (event) => {
    const modal = document.getElementById('deleteModal');
    if (event.target === modal) {
        closeDeleteModal();
    }
});


// ===================== TEMA =====================
document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById("toggleTheme");
    if (!toggle) return;

    const dark = localStorage.getItem("theme") === "dark";

    if (dark) {
        document.body.classList.add("dark");
        toggle.checked = true;
    }

    toggle.addEventListener("change", () => {
        const isDark = document.body.classList.toggle("dark");

        localStorage.setItem("theme", isDark ? "dark" : "light");

        falarSistema(isDark ? "Modo escuro ativado" : "Modo claro ativado");
    });
});


// ===================== VOZ (NARRAÇÃO) =====================
let vozAtiva = false;

function toggleAudio() {
    vozAtiva = !vozAtiva;

    if (vozAtiva) {
        falarSistema("Narração ativada. Bem-vindo ao sistema de seleções da Copa.");
    } else {
        speechSynthesis.cancel();
    }
}


// ===================== FUNÇÃO DE FALA =====================
function falarSistema(texto) {
    if (!vozAtiva) return; // 

    const msg = new SpeechSynthesisUtterance(texto);
    msg.lang = "pt-BR";
    msg.rate = 1;
    msg.pitch = 1;

    speechSynthesis.cancel();
    speechSynthesis.speak(msg);
}