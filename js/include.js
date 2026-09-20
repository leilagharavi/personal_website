function includeHTML(selector, filePath) {
    fetch(filePath)
        .then(response => response.text())
        .then(data => {
            document.querySelector(selector).innerHTML = data;
        })
        .catch(err => console.error("Include error:", err));
}

function toggleProject(card) {
    if (card.classList.contains('expanded')) {
        card.classList.remove('expanded');
        const content = card.querySelector('.star-content');
        if (content) content.style.display = 'none';
        return;
    }

    document.querySelectorAll('.project-card.expanded').forEach(function(other) {
        if (other !== card) {
            other.classList.remove('expanded');
            const otherContent = other.querySelector('.star-content');
            if (otherContent) otherContent.style.display = 'none';
        }
    });

    card.classList.add('expanded');
    const content = card.querySelector('.star-content');
    if (content) content.style.display = 'block';
}

document.addEventListener("DOMContentLoaded", () => {
    includeHTML("#navbar", "/components/navbar.html");
    includeHTML("#footer", "/components/footer.html");

    // FILTER LOGIC
    const filterBtns = document.querySelectorAll('.filter-btn');
    const cards = document.querySelectorAll('.project-card');

    filterBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            filterBtns.forEach(function(b) { b.classList.remove('active'); });
            btn.classList.add('active');

            const filter = btn.getAttribute('data-filter');

            cards.forEach(function(card) {
                const categories = card.getAttribute('data-category').split(' ');
                if (filter === 'all' || categories.includes(filter)) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });

            document.querySelectorAll('.project-card.expanded').forEach(function(c) {
                c.classList.remove('expanded');
                const content = c.querySelector('.star-content');
                if (content) content.style.display = 'none';
            });
        });
    });
});