$(document).ready(function () {
    //-----------------------------------------------------
    // Defining a variable
    //-----------------------------------------------------

    // Mascara dinheiro
    $(".money").mask("0.000.000.000,00", {
        reverse: true,
        placeholder: "R$ 0,00",
    });

    // Mascara CPF
    $(".cpf").mask("000.000.000-00", {
        reverse: true,
        placeholder: "000.000.000-00",
    });

    // Mascara CEP
    $(".cep").mask("00000-000", {
        placeholder: "00000-000",
    });

    // Mascara Telefone
    $(".phone").mask("(00) 00000-0000", {
        placeholder: "(00) 00000-0000",
    });
});
