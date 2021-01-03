function openMenu() {
    let p = document.getElementById("navbar");
    p.classList.toggle("activeMenu");
};

function openMenuDefault() {
    let w = window.innerWidth;
    if (w>768){
        openMenu(this);
    }
}



let switcher = 0;
let doc = document.documentElement.style;

function accessibilite(arg) {
    switch (arg) {
        case 0:
            bigText();
            colorBasic();
            break;
        case 1:
            textBasic();
            blackAndWhite();
            break;
        case 2:
            bigText();
            blackAndWhite();
            break;
        default:
            textBasic();
            colorBasic();
            break;
    }
}

function colorBasic() {
    doc.setProperty('--main-text-color', '#ecf0f1');
    doc.setProperty('--nav-text-color-hover', '#36456e');
    doc.setProperty('--container-text-color', '#000000');
    doc.setProperty('--h1-text-color', '#4941BF');
    doc.setProperty('--main-bg-color', '#C0DFEF');
    doc.setProperty('--header-footer-bg-color', '#6e8ee6');
    doc.setProperty('--body-bg-color', '#ADCAD9');
    document.getElementById('logoSite').style.filter = 'invert(0)';
}

function textBasic() {
    doc.setProperty('--h1-font-size', '220%');
    doc.setProperty('--h2-font-size', '170%');
    doc.setProperty('--para-font-size', '110%');
    doc.setProperty('--nav-font-size', '100%');
    document.getElementById('logoSite').style.width = '80px';
    document.getElementById('logoSite').style.height = '80px';
}

function blackAndWhite() {
    doc.setProperty('--main-text-color', '#FFFFFF');
    doc.setProperty('--nav-text-color-hover', '#ff0000');
    doc.setProperty('--container-text-color', '#ffffff');
    doc.setProperty('--h1-text-color', '#ff0000');
    doc.setProperty('--main-bg-color', '#FFFFFF');
    doc.setProperty('--header-footer-bg-color', '#000000');
    doc.setProperty('--body-bg-color', '#000000');

    document.getElementById('logoSite').style.filter = 'invert(1)';
}

function bigText() {
    doc.setProperty('--h1-font-size', '250%');
    doc.setProperty('--h2-font-size', '200%');
    doc.setProperty('--para-font-size', '140%');
    doc.setProperty('--nav-font-size', '130%');
    document.getElementById('logoSite').style.width = '85px';
    document.getElementById('logoSite').style.height = '85px';
}