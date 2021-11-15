let getParents = function (elem) {

    // Set up a parent array
    let parents = [];

    // Push each parent element to the array
    for ( ; elem && elem !== document; elem = elem.parentNode ) {
        parents.push(elem);
    }

    // Return our parent array
    return parents;
};

let getParentsBySelector = function (elem, selector) {

    // Element.matches() polyfill
    if (!Element.prototype.matches) {
        Element.prototype.matches =
            Element.prototype.matchesSelector ||
            Element.prototype.mozMatchesSelector ||
            Element.prototype.msMatchesSelector ||
            Element.prototype.oMatchesSelector ||
            Element.prototype.webkitMatchesSelector ||
            function(s) {
                var matches = (this.document || this.ownerDocument).querySelectorAll(s),
                    i = matches.length;
                while (--i >= 0 && matches.item(i) !== this) {}
                return i > -1;
            };
    }

    // Set up a parent array
    let parents = [];

    // Push each parent element to the array
    for ( ; elem && elem !== document; elem = elem.parentNode ) {
        if (selector) {
            if (elem.matches(selector)) {
                parents.push(elem);
            }
            continue;
        }
        parents.push(elem);
    }

    // Return our parent array
    return parents;
};

function reportWindowSize() {
    let sidebar = document.getElementById('main-sidebar');
    if (sidebar !== null) {
        if (window.innerWidth <= 991) {
            sidebar.classList.add('collapse');
        } else {
            sidebar.classList.remove('collapse');
        }
    }

}

reportWindowSize();
window.onresize = reportWindowSize;
