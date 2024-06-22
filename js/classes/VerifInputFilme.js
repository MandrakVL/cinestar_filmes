
class VerifInputFilme {
  button;
  form;

  constructor() {
    this.button = document.getElementById("buttonSubmitAddFilme");
    this.form = document.getElementById("formAddFilme");

    this.verificarInputs();
  }

  verificarInputs() {
    this.button.addEventListener("click", (e) => {
      e.preventDefault();

      const nomeFilme = document.getElementById("nome_filme");
      const descricaoFilme = document.getElementById("descricao_filme");
      const lancamento = document.getElementById("lancamento");
      const imagemFilme = document.getElementById("imagem");
      const trailerFilme = document.getElementById("trailer");

      if (
        nomeFilme.value != "" &&
        descricaoFilme.value != "" &&
        lancamento.value != "" &&
        imagemFilme.value != "" &&
        trailerFilme.value != ""
      ) {
        this.enviarFormulario();
      }

      if (nomeFilme.value == "") {
        this.error(nomeFilme, 'Por favor, preencha o campo "nome"');
      }

      if (descricaoFilme.value == "") {
        this.error(descricaoFilme, 'Por favor, preencha o campo "descricão"');
      }

      if (lancamento.value == "") {
        this.error(lancamento, 'Por favor, preencha o campo "lançamento"');
      }

      if (imagemFilme.value == "") {
        this.error(imagemFilme, "Por favor, envie-nos uma imagem.");
      }
      
      if (trailerFilme.value == "") {
        this.error(trailerFilme, 'Por favor, preencha o campo "trailer"');
      }
    });
  }

  enviarFormulario() {
    const formData = new FormData(this.form);

    fetch("../../controller/CadastrarFilme.php", {
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

        this.sucesso(varHtmlB, "Filme cadastrado com sucesso!");
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
    const nomeFilme = document.getElementById("nome_filme");
    const descricaoFilme = document.getElementById("descricao_filme");
    const lancamento = document.getElementById("lancamento");
    const imagemFilme = document.getElementById("imagem");
    const trailerFilme = document.getElementById("trailer");

    nomeFilme.value = "";
    descricaoFilme.value = "";
    lancamento.value = "";
    imagemFilme.value = "";
    trailerFilme.value = "";
  }
}

new VerifInputFilme();
