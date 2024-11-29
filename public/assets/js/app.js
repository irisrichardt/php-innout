(function () {
  const body = document.querySelector("body");
  body.classList.remove("hide-sidebar");

  const menuToggle = document.querySelector(".menu-toggle");
  menuToggle.onclick = function (e) {
    body.classList.toggle("hide-sidebar");
  };

  // Função para a máscara de entrada de tempo
  document.addEventListener("DOMContentLoaded", function () {
    const timeInput = document.querySelector('input[name="forcedTime"]');
    timeInput.addEventListener("input", function (e) {
      let value = e.target.value;
      value = value.replace(/[^0-9:]/g, "");
      if (value.length > 2 && value[2] !== ":") {
        value = value.slice(0, 2) + ":" + value.slice(2);
      }
      if (value.length > 5 && value[5] !== ":") {
        value = value.slice(0, 5) + ":" + value.slice(5);
      }
      e.target.value = value;
    });
  });
})();
