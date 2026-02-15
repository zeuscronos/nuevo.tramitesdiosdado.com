import { Component, Element, Prop } from '@stencil/core';

@Component({
	tag: 'year-counter',
	styleUrl: 'year-counter.scss',
})
export class MyComponent {
	@Element() el!: HTMLStencilElement;

	@Prop() since: number;

	get count() {
		let currentYear = new Date().getFullYear();
		return currentYear - this.since;
	}

	render() {
		return [
			<span>{this.count}</span>
		];
	}

}
