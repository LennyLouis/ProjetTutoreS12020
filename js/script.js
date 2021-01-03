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
    doc.setProperty('--main-bg-color', '#C0DFEF');
    doc.setProperty('--header-footer-bg-color', '#6E8EE6');
    doc.setProperty('--nav-text-color-hover', '#36456e');
    doc.setProperty('--container-text-color', 'black');
    doc.setProperty('--body-logiciel-bg-color', '#ADCAD9');
    doc.setProperty('--contact-bg-color-hover', 'rgba(0, 0, 0, 0.4)');
    document.getElementById('logoSite').style.filter = 'invert(0)';
}

function textBasic() {
    doc.setProperty('--para-font-size', '15px');
    doc.setProperty('--h2-font-size', '28px');
    doc.setProperty('--h1-font-size', '50px');
    doc.setProperty('--titre-font-size', '25px');
    doc.setProperty('--form-font-size', '20px');
    doc.setProperty('--nav-font-size', '17px');
}

function blackAndWhite() {
    doc.setProperty('--main-bg-color', '#FFFFFF');
    doc.setProperty('--header-footer-bg-color', '#000000');
    doc.setProperty('--nav-text-color-hover', '#ff0000');
    doc.setProperty('--container-text-color', '#ffffff');
    doc.setProperty('--body-logiciel-bg-color', '#000000');
    doc.setProperty('--contact-bg-color-hover', 'rgba(0, 0, 0, 0.9)');
    document.getElementById('logoSite').style.filter = 'invert(1)';
}

function bigText() {
    doc.setProperty('--para-font-size', '22px');
    doc.setProperty('--h2-font-size', '35px');
    doc.setProperty('--h1-font-size', '57px');
    doc.setProperty('--titre-font-size', '32px');
    doc.setProperty('--form-font-size', '27px');
    doc.setProperty('--nav-font-size', '24px');
}