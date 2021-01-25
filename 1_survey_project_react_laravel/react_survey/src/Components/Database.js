import React, { Component } from 'react';
import { Container, Row, Col, Table, Button } from 'react-bootstrap';
import axios from 'axios';


export default class Database extends Component {
	constructor (props) {
		super(props);

		this.state = {
			survey: [],
			userId: [],
			errorMsg: ''
		};
	}

	componentDidMount () {
		axios.get('http://62.173.140.14/laravel/COVID_survey/public/api/get_survey')
			.then(response => {
				console.log(response);
				this.setState({survey: response.data})
			})
			.catch(error => {
				console.log(error);
				this.setState({errorMsg: 'Error retreiving data'});
			});
	}

	getDetails = (id) => {
		axios.get('http://62.173.140.14/laravel/COVID_survey/public/api/get_survey/' + id)
			.then(response => {
				console.log(response);
				this.setState({userId: response.data})
			})
			.catch(error => {
				console.log(error);
				this.setState({errorMsg: 'Error retreiving data'});
			});
	}

	render () {
		const { survey, userId, errorMsg } = this.state;

		return (
			<Container>
				<h1>Database Page </h1>
				<Row>

				    <Col sm={6}>
				    	<Table striped bordered hover variant="dark">
						  <thead>
						    <tr>
						      <th>Id</th>
						      <th>Name</th>
						      <th>Country</th>
						      <th>Age</th>
						      <th>Action</th>
						    </tr>
						  </thead>
						  <tbody>

						  {
						  	survey.map(user => {
						  		return (
								    <tr key={ user.id } >
								      <td>{ user.id }</td>
								      <td>{ user.name }</td>
								      <td>{ user.country }</td>
								      <td>{ user.age }</td>
								      <td>
								      	<Button onClick={ (e) => this.getDetails(user.id) } variant="primary" size="sm">Details</Button>
								      </td>
								    </tr>
						    	);
						    })
						  }

						    
						  </tbody>
						</Table>
				    </Col>


				{/*********************************************************/}
				    <Col sm={6}>

				    	<h3>Scores</h3>
				    	1 - Strongly disagree <br />
				    	2 - Disagree <br />
				    	3 - Neither agree nor disagree <br />
				    	4 - Agree <br />
				    	5 - Strongly agree <br />

				    	<h2>Name: <span style={{color: 'red'}}>{ userId.name }</span></h2>

				    	<Table striped bordered hover variant="dark" size="sm">
						  <thead>
						    <tr>
						      <th>Key</th>
						      <th>Value</th>
						    </tr>
						  </thead>
						  <tbody>
							
							<tr>
						      <td>Name</td>
						      <td>{ userId.name }</td>
						    </tr>

						    <tr>
						      <td>country</td>
						      <td>{ userId.country }</td>
						    </tr>

						    <tr>
						      <td>age</td>
						      <td>{ userId.age }</td>
						    </tr>

						    <tr>
						      <td>1. I am most afraid of coronavirus-19.</td>
						      <td>{ userId.q1 }</td>
						    </tr>

						    <tr>
						      <td>2. It makes me uncomfortable to think about coronavirus-19.</td>
						      <td>{ userId.q2 }</td>
						    </tr>

						    <tr>
						      <td>3. My hands become clammy when I think about coronavirus-19.</td>
						      <td>{ userId.q3 }</td>
						    </tr>

						    <tr>
						      <td>4. I am afraid of losing my life because of coronavirus-19.</td>
						      <td>{ userId.q4 }</td>
						    </tr>

						    <tr>
						      <td>5. When watching news and stories about coronavirus-19 on social media, I become nervous or anxious.</td>
						      <td>{ userId.q5 }</td>
						    </tr>

						    <tr>
						      <td>6. I cannot sleep because I’m worrying about getting coronavirus-19.</td>
						      <td>{ userId.q6 }</td>
						    </tr>

						    <tr>
						      <td>7. My heart races or palpitates when I think about getting coronavirus-19.</td>
						      <td>{ userId.q7 }</td>
						    </tr>						

						    <tr>
						      <td>Total score</td>
						      <td>{ userId.summ }</td>
						    </tr>	
						   
						  </tbody>
						</Table>
				    </Col>

				 </Row>
			</Container>
		);
	}
}