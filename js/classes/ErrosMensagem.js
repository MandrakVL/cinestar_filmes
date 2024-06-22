class ErrosMensagem {
    constructor() {
        this.deletarSpan();
    }

    deletarSpan() {
        setTimeout(() => {
            const span = document.getElementById("spanErro");

            span.remove();
        }, 3000);
    }
}

new ErrosMensagem;