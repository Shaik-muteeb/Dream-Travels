document.addEventListener("DOMContentLoaded", () => {
    // Add more event listeners as needed
});

function showSection(sectionId) {
    const sections = document.querySelectorAll(".section");
    sections.forEach(section => {
        section.classList.add("hidden");
        section.classList.remove("visible");
    });
    document.getElementById(sectionId).classList.remove("hidden");
    document.getElementById(sectionId).classList.add("visible");
}

function logout() {
    // Implement logout logic here
    window.location.href="index.html";
    // Redirect to login page or show login section
}
