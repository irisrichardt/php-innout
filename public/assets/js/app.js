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

  // Gráfico
  document.addEventListener("DOMContentLoaded", function () {
    var ctx = document.getElementById("locatariosChart").getContext("2d");

    var locatariosChart = new Chart(ctx, {
      type: "bar",
      data: {
        labels: estados,
        datasets: [
          {
            label: "Número de Locatários",
            data: counts,
            backgroundColor: estados.map(() => {
              return "rgba(" + Math.floor(Math.random() * 255) + "," + Math.floor(Math.random() * 255) + "," + Math.floor(Math.random() * 255) + ", 0.6)";
            }),
            borderColor: "rgba(0,0,0,0.5)",
            borderWidth: 1,
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: true,
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              stepSize: 1,
            },
          },
        },
        plugins: {
          legend: {
            position: "bottom",
            labels: {
              font: {
                size: 14,
              },
              padding: 20,
            },
          },
        },
        layout: {
          padding: 10,
        },
      },
    });
  });

  // Função para selecionar/desmarcar todos os checkboxes
  window.toggleSelectAll = function (source) {
    const checkboxes = document.querySelectorAll('input[name="search[]"]');
    checkboxes.forEach((checkbox) => {
      checkbox.checked = source.checked;
    });
  };
})();
