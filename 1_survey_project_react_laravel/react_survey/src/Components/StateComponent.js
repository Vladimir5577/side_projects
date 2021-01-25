import React, { Component } from 'react';

export default class StateComponent extends Component {
	constructor (props) {
		super(props);

		this.state = {
			name: 'Bob 123 213'
		};
	}


	render () {
		return (
			<div>
				<h1>User name { this.state.name }</h1>
			</div>
		);
	}
}