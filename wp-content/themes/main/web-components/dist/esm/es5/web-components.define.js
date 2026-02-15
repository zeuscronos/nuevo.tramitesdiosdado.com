// WebComponents: Custom Elements Define Library, ES Module/ES5 Target
import { defineCustomElement } from './web-components.core.js';
import {
  MyComponent,
  MyComponent
} from './web-components.components.js';

export function defineCustomElements(window, opts) {
  defineCustomElement(window, [
    MyComponent,
    MyComponent
  ], opts);
}