document.addEventListener("DOMContentLoaded", () => {
class VerifInputSerie {
  button;
  form;

  constructor() {
    this.button = document.getElementById("buttonSubmitAddSerie");
    this.form = document.getElementById("formAddSerie");

    this.verificarInputs();
  }

  verificarInputs() {
    this.button.addEventListener("click", (e) => {
      e.preventDefault();

      const nomeSerie = document.getElementById("nome_serie");
      const descricaoSerie = document.getElementById("descricao_serie");
      const lancamento = document.getElementById("lancamento_serie");
      const imagemSerie = document.getElementById("imagemS");
      const trailerSerie = document.getElementById("trailer");

      if (
        nomeSerie.value != "" &&
        descricaoSerie.value != "" &&
        lancamento.value != "" &&
        imagemSerie.value != "" &&
        trailerSerie.value != ""
      ) {
        this.enviarFormulario();
      }

      if (nomeSerie.value == "") {
        this.error(nomeSerie, 'Por favor, preencha o campo "nome"');
      }

      if (descricaoSerie.value == "") {
        this.error(descricaoSerie, 'Por favor, preencha o campo "descricão"');
      }

      if (lancamento.value == "") {
        this.error(lancamento, 'Por favor, preencha o campo "lançamento"');
      }

      if (imagemSerie.value == "") {
        this.error(imagemSerie, "Por favor, envie-nos uma imagem.");
      }

      if (trailerSerie.value == "") {
        this.error(trailerSerie, "Por favor, envie-nos uma imagem.");
      }
    });
  }

  enviarFormulario() {
    const formData = new FormData(this.form);

    fetch("../../controller/CadastrarSerie.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Erro ao enviar formulário: " + response.statusText);
        }
        return response.text();
      })
      .then((data) => {
        const varHtmlB = document.querySelector(".input-button-submit");

        this.sucesso(varHtmlB, "Serie cadastrado com sucesso!");
      })
      .catch((error) => {
        console.error("Erro ao enviar formulário:", error);
      });
  }

  error(varHtml, mensagem) {
    let mensagemErroSpan = document.createElement("span");
    mensagemErroSpan.textContent = `${mensagem}`;
    mensagemErroSpan.classList.add("errorMsg");

    varHtml.insertAdjacentElement("afterend", mensagemErroSpan);

    setTimeout(() => {
      mensagemErroSpan.remove();
    }, 3000);
  }

  sucesso(varHtml, mensagem) {
    let mensagemSucessoSpan = document.createElement("span");
    mensagemSucessoSpan.textContent = `${mensagem}`;
    mensagemSucessoSpan.classList.add("sucesso");

    this.limparInputs();

    varHtml.insertAdjacentElement("afterend", mensagemSucessoSpan);

    setTimeout(() => {
      mensagemSucessoSpan.remove();
    }, 3000);
  }

  limparInputs() {
    const nomeSerie = document.getElementById("nome_serie");
    const descricaoSerie = document.getElementById("descricao_serie");
    const lancamento = document.getElementById("lancamento_serie");
    const imagemSerie = document.getElementById("imagemS");
    const trailerSerie = document.getElementById("trailer");

    nomeSerie.value = '';
    descricaoSerie.value = "";
    lancamento.value = "";
    imagemSerie.value = "";
    trailerSerie.value = "";
  }
}

new VerifInputSerie();
});
