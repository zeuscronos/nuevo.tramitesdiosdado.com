/*! Built with http://stenciljs.com */
const { h } = window.WebComponents;

class MyComponent {
    get count() {
        let currentYear = new Date().getFullYear();
        return currentYear - this.since;
    }
    render() {
        return [
            h("span", null, this.count)
        ];
    }
    static get is() { return "year-counter"; }
    static get properties() { return {
        "el": {
            "elementRef": true
        },
        "since": {
            "type": Number,
            "attr": "since"
        }
    }; }
    static get style() { return ""; }
}

export { MyComponent as YearCounter };
