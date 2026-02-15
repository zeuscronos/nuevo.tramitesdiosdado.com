export class MyComponent {
    static get is() { return "resizable-container"; }
    static get properties() { return {
        "el": {
            "elementRef": true
        }
    }; }
    static get style() { return "/**style-placeholder:resizable-container:**/"; }
}
