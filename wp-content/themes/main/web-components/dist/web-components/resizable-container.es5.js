/*! Built with http://stenciljs.com */
WebComponents.loadBundle('resizable-container', ['exports'], function (exports) {
    var h = window.WebComponents.h;
    var MyComponent = /** @class */ (function () {
        function MyComponent() {
        }
        Object.defineProperty(MyComponent, "is", {
            get: function () { return "resizable-container"; },
            enumerable: true,
            configurable: true
        });
        Object.defineProperty(MyComponent, "properties", {
            get: function () {
                return {
                    "el": {
                        "elementRef": true
                    }
                };
            },
            enumerable: true,
            configurable: true
        });
        Object.defineProperty(MyComponent, "style", {
            get: function () { return "resizable-container {\n  display: inline-block;\n  border: 2px solid #efefef;\n  resize: both;\n  overflow: auto; }"; },
            enumerable: true,
            configurable: true
        });
        return MyComponent;
    }());
    exports.ResizableContainer = MyComponent;
    Object.defineProperty(exports, '__esModule', { value: true });
});
