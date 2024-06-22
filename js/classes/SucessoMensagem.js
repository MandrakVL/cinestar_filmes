class SucessoMensagem {
  constructor() {
    this.deletarSpan();
  }

  deletarSpan() {
    setTimeout(() => {
      const span = document.getElementById("spanSucesso");
      span.remove();
    }, 3000);
  }
}

new SucessoMensagem();
