import { Component, Element } from '@stencil/core';

@Component({
	tag: 'resizable-container',
	styleUrl: 'resizable-container.scss',
})
export class MyComponent {

	@Element() el!: HTMLStencilElement;

	// render() { return []; }

}
