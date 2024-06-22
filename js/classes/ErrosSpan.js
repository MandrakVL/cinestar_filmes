class ErrosSpan {
  constructor() {
    this.deletarSpan();
  }

  deletarSpan() {
    setTimeout(() => {
      const span = document.getElementById("erroInput");
      const spanSerie = document.getElementById("serieSpanMensagem");

      span.remove();
      spanSerie.remove();
    }, 3000);
  }
}

new ErrosSpan();