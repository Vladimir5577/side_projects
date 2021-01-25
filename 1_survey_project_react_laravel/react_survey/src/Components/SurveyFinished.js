import React, { Component } from 'react';

export default class SurveyFinished extends Component {
	render () {
		return (
			<div className="container">
				<br />
				<div className="alert alert-success">
					<h1>Survey condacted successfully</h1>
					<h1>Thank You !</h1>
				</div>
			</div>
		);
	}
}