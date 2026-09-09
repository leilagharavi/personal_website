function includeHTML(selector, filePath) {
    fetch(filePath)
        .then(response => response.text())
        .then(data => {
            document.querySelector(selector).innerHTML = data;
        })
        .catch(err => console.error("Include error:", err));
}

function toggleProject(card) {
    // If clicked card is already expanded, collapse it
    if (card.classList.contains('expanded')) {
        card.classList.remove('expanded');
        const content = card.querySelector('.star-content');
        if (content) content.style.display = 'none';
        return;
    }
    
    // Close any other expanded cards (keeps page clean)
    document.querySelectorAll('.project-card.expanded').forEach(function(other) {
        if (other !== card) {
            other.classList.remove('expanded');
            const otherContent = other.querySelector('.star-content');
            if (otherContent) otherContent.style.display = 'none';
        }
    });
    
    // Expand this card
    card.classList.add('expanded');
    const content = card.querySelector('.star-content');
    if (content) content.style.display = 'block';
}

document.addEventListener("DOMContentLoaded", () => {
    includeHTML("#navbar", "/components/navbar.html");
    includeHTML("#footer", "/components/footer.html");
});
