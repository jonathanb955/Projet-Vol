document.addEventListener("DOMContentLoaded", function () {
    const statusCells = document.querySelectorAll("#vols table tr td:last-child");

    statusCells.forEach(cell => {
        if (cell.textContent.includes("Retardé")) {
            cell.style.color = "red";
            cell.style.fontWeight = "bold";
        } else if (cell.textContent.includes("À l'heure")) {
            cell.style.color = "green";
            cell.style.fontWeight = "bold";
        }
    });


    document.querySelectorAll("nav ul li a").forEach(anchor => {
        anchor.addEventListener("click", function (e) {
            e.preventDefault();
            const targetId = this.getAttribute("href").substring(1);
            const targetElement = document.getElementById(targetId);
            targetElement.scrollIntoView({ behavior: "smooth" });
        });
    });
});

