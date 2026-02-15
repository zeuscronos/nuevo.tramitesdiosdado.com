/*! Built with http://stenciljs.com */
import { h } from './web-components.core.js';
var MyComponent = /** @class */ (function () {
    function MyComponent() {
    }
    Object.defineProperty(MyComponent.prototype, "count", {
        get: function () {
            var currentYear = new Date().getFullYear();
            return currentYear - this.since;
        },
        enumerable: true,
        configurable: true
    });
    MyComponent.prototype.render = function () {
        return [
            h("span", null, this.count)
        ];
    };
    Object.defineProperty(MyComponent, "is", {
        get: function () { return "year-counter"; },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(MyComponent, "properties", {
        get: function () {
            return {
                "el": {
                    "elementRef": true
                },
                "since": {
                    "type": Number,
                    "attr": "since"
                }
            };
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(MyComponent, "style", {
        get: function () { return ""; },
        enumerable: true,
        configurable: true
    });
    return MyComponent;
}());
export { MyComponent as YearCounter };
