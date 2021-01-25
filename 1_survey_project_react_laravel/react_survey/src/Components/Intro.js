import React, { Component } from 'react';
import { Link } from 'react-router-dom';
import { Container, Button } from 'react-bootstrap';

export default class Intro extends Component {

	render () {
		return (
			<Container className="mt-5" >
				<h1></h1>
				<p>
					Dear participants, the purpose of this survey is to understand your concearns in this pandemic situation. The results will contribute to the literature on wellbeing of university students in a time of crisis. Therefore, your sincere responses to all of the items are crucial for the success of the study. It takes approximately 5 minutes to complete the questionnaire.
	                It is voluntary to participate in the study. Your responses will be confidential.
	                Thank you very much for your contribution.
				</p>

				<Link to="/form_survey">
					<Button  variant="primary" size="lg" block >
			      		Get started
			      	</Button>
			    </Link>

			</Container>
		);
	}
}