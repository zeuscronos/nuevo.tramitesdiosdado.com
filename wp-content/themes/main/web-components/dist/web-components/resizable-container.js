/*! Built with http://stenciljs.com */
const { h } = window.WebComponents;

class MyComponent {
    static get is() { return "resizable-container"; }
    static get properties() { return {
        "el": {
            "elementRef": true
        }
    }; }
    static get style() { return "resizable-container {\n  display: inline-block;\n  border: 2px solid #efefef;\n  resize: both;\n  overflow: auto; }"; }
}

export { MyComponent as ResizableContainer };
