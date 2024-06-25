export function switchTab(activeTab, activeArea, tabs, areas) {
    for (let i = 0; i < tabs.length; i++) {
        areas[i].style.display = "none";
        tabs[i].classList.remove('activeNav');
        tabs[i].style.color = "white";
    }

    activeArea.style.display = "flex";
    activeTab.classList.add('activeNav');
    activeTab.style.color = "#f9ed35";
}