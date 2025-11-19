function includeHTML(selector, filePath) {
    fetch(filePath)
        .then(response => response.text())
        .then(data => {
            document.querySelector(selector).innerHTML = data;
        })
        .catch(err => console.error("Include error:", err));
}

document.addEventListener("DOMContentLoaded", () => {
    includeHTML("#navbar", "/components/navbar.html");
    includeHTML("#footer", "/components/footer.html");
});
