class ShowInfoPainel {
    showInfo($data) {
        const varActionList = document.getElementById("painel-actionslist");

        fetch('../../data/actions.json')
        .then(response => response.json())
        .then(data => {
            const mostrarActions = data.map(item => {
                return `
                <a href="painel.php?pagina=${item.name}" class="action-item-link">
                    <li class="actions-item" id="${item.id}">
                        ${item.actionName}
                        <i class="${item.icons} link-painel-icons" style="color: #ffffff;"></i>
                    </li>
                </a>
                `;
            }).join('');

            varActionList.innerHTML = mostrarActions;
        })
    }
}

new ShowInfoPainel().showInfo();