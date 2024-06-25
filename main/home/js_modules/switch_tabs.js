export function switchTab(activeTab, activeArea, tabs, areas) {
    for (let i = 0; i < tabs.length; i++) {
        areas[i].style.display = "none";
        tabs[i].classList.remove('activeNav');
    }

    if(areas == "HomePage"){
        activeArea.style.display = "block";
        activeTab.classList.add('activeNav');
    }
    else{
        activeArea.style.display = "flex";
        activeTab.classList.add('activeNav');
    }

}