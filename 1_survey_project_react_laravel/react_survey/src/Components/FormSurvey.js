import React, { Component } from 'react';
import { Container, Form, Button } from 'react-bootstrap';
import axios from 'axios';
import { Redirect } from "react-router-dom";

export default class FormPage extends Component {
	constructor (props) {
		super(props);
		this.state = {
			name: '',
			country: '',
			age: '',
			question_1: '',
			question_2: '',
			question_3: '',
			question_4: '',
			question_5: '',
			question_6: '',
			question_7: '',

			nameError: '',
			countryError: '',
			ageError: '',
			question_1Error: '',
			question_2Error: '',
			question_3Error: '',
			question_4Error: '',
			question_5Error: '',
			question_6Error: '',
			question_7Error: '',

			redirect: false,
		};
	}

	changeHandler = (e) => {
		this.setState({ [e.target.name]: e.target.value });
	};

	submitHandler = e => {
		e.preventDefault();

		let isValid = true;

		if (this.state.name === '') {
			this.setState({ nameError: 'Name is required' });
			isValid = false;
		} else {
			this.setState({ nameError: '' });
		}

		if (this.state.country === '') {
			this.setState({ countryError: 'country is required' });
			isValid = false;
		} else {
			this.setState({ countryError: '' });
		}

		if (this.state.age === '') {
			this.setState({ ageError: 'age is required' });
			isValid = false;
		} else {
			this.setState({ ageError: '' });
		}

		if (this.state.question_1 === '') {
			this.setState({ question_1Error: 'Question 1 is required' });
			isValid = false;
		} else {
			this.setState({ question_1Error: '' });
		}

		if (this.state.question_2 === '') {
			this.setState({ question_2Error: 'Question 2 is required' });
			isValid = false;
		} else {
			this.setState({ question_2Error: '' });
		}

		if (this.state.question_3 === '') {
			this.setState({ question_3Error: 'Question 3 is required' });
			isValid = false;
		} else {
			this.setState({ question_3Error: '' });
		}

		if (this.state.question_4 === '') {
			this.setState({ question_4Error: 'Question 4 is required' });
			isValid = false;
		} else {
			this.setState({ question_4Error: '' });
		}

		if (this.state.question_5 === '') {
			this.setState({ question_5Error: 'Question 5 is required' });
			isValid = false;
		} else {
			this.setState({ question_5Error: '' });
		}

		if (this.state.question_6 === '') {
			this.setState({ question_6Error: 'Question 6 is required' });
			isValid = false;
		} else {
			this.setState({ question_6Error: '' });
		}

		if (this.state.question_7 === '') {
			this.setState({ question_7Error: 'Question 7 is required' });
			isValid = false;
		} else {
			this.setState({ question_7Error: '' });
		}

		if (isValid) {
			console.log('Done');
			axios.post('http://62.173.140.14/laravel/COVID_survey/public/api/post_survey', this.state)
				.then(response => {
					console.log(response);
				})
				.catch(error => {
					console.log(error);
				});

				this.setState({ redirect: true });
		}


	};

	render () {

		const { name } = this.state;
		
		return (
			<Container>
				  <br />
				  <br />
				<h1>Form Survey </h1>
				<Form onSubmit={ this.submitHandler }>

				{/* Name ***********************************/}
				  <Form.Group controlId="formBasicEmail">
				    <Form.Label>Name</Form.Label>
				    <Form.Control type="text" name="name" placeholder="Enter name" onChange={ this.changeHandler }  />
				  </Form.Group>

				  { <h4 style={{ color: 'red' }}>{this.state.nameError}</h4> }

				{/* Country ***********************************/}
				  <Form.Group controlId="formBasicEmail">
				    <Form.Label>Country</Form.Label>
				    <Form.Control type="text" name="country" placeholder="Enter Country" onChange={ this.changeHandler }  />
				  </Form.Group>

				  { <h4 style={{ color: 'red' }}>{this.state.countryError}</h4> }

				{/* Age ***********************************/}
				  <Form.Group controlId="formBasicEmail">
				    <Form.Label>Age</Form.Label>
				    <Form.Control type="number" name="age" placeholder="Enter Age" onChange={ this.changeHandler }  />
				  </Form.Group>

				  { <h4 style={{ color: 'red' }}>{this.state.ageError}</h4> }

				  <br />
				  <br />

				 {/* 1 Radio form ********************************************* */}
				  <fieldset>
				    <Form.Group >
				      <Form.Label>
				        <h5>1. I am most afraid of coronavirus-19.</h5>
				      </Form.Label>
				        <Form.Check
				          type="radio"
				          label="Strongly disagree"
				          name="question_1"
				          id="q1_1"
				          value="1"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Disagree"
				          name="question_1"
				          id="q1_2"
				          value="2"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Neither agree nor disagree"
				          name="question_1"
				          id="q1_3"
				          value="3"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Agree"
				          name="question_1"
				          id="q1_4"
				          value="4"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Strongly agree"
				          name="question_1"
				          id="q1_5"
				          value="5"
				          onChange={ this.changeHandler } 
				        />
				    </Form.Group>
				  </fieldset>

				  { <h4 style={{ color: 'red' }}>{this.state.question_1Error}</h4> }

				  {/* 2 Radio form ********************************************* */}
				  <fieldset>
				    <Form.Group >
				      <Form.Label>
				        <h5>2. It makes me uncomfortable to think about coronavirus-19.</h5>
				      </Form.Label>
				        <Form.Check
				          type="radio"
				          label="Strongly disagree"
				          name="question_2"
				          id="q2_1"
				          value="1"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Disagree"
				          name="question_2"
				          id="q2_2"
				          value="2"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Neither agree nor disagree"
				          name="question_2"
				          id="q2_3"
				          value="3"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Agree"
				          name="question_2"
				          id="q2_4"
				          value="4"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Strongly agree"
				          name="question_2"
				          id="q2_5"
				          value="5"
				          onChange={ this.changeHandler } 
				        />
				    </Form.Group>
				  </fieldset>

				  { <h4 style={{ color: 'red' }}>{this.state.question_2Error}</h4> }

				  {/* 3 Radio form ********************************************* */}
				  <fieldset>
				    <Form.Group >
				      <Form.Label>
				        <h5>3. My hands become clammy when I think about coronavirus-19.</h5>
				      </Form.Label>
				        <Form.Check
				          type="radio"
				          label="Strongly disagree"
				          name="question_3"
				          id="q3_1"
				          value="1"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Disagree"
				          name="question_3"
				          id="q3_2"
				          value="2"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Neither agree nor disagree"
				          name="question_3"
				          id="q3_3"
				          value="3"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Agree"
				          name="question_3"
				          id="q3_4"
				          value="4"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Strongly agree"
				          name="question_3"
				          id="q3_5"
				          value="5"
				          onChange={ this.changeHandler } 
				        />
				    </Form.Group>
				  </fieldset>

				  { <h4 style={{ color: 'red' }}>{this.state.question_3Error}</h4> }

				  {/* 4 Radio form ********************************************* */}
				  <fieldset>
				    <Form.Group >
				      <Form.Label>
				        <h5>4. I am afraid of losing my life because of coronavirus-19.</h5>
				      </Form.Label>
				        <Form.Check
				          type="radio"
				          label="Strongly disagree"
				          name="question_4"
				          id="q4_1"
				          value="1"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Disagree"
				          name="question_4"
				          id="q4_2"
				          value="2"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Neither agree nor disagree"
				          name="question_4"
				          id="q4_3"
				          value="3"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Agree"
				          name="question_4"
				          id="q4_4"
				          value="4"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Strongly agree"
				          name="question_4"
				          id="q4_5"
				          value="5"
				          onChange={ this.changeHandler } 
				        />
				    </Form.Group>
				  </fieldset>

				  { <h4 style={{ color: 'red' }}>{this.state.question_4Error}</h4> }

				  {/* 5 Radio form ********************************************* */}
				  <fieldset>
				    <Form.Group >
				      <Form.Label>
				        <h5>5. When watching news and stories about coronavirus-19 on social media, I become nervous or anxious.</h5>
				      </Form.Label>
				        <Form.Check
				          type="radio"
				          label="Strongly disagree"
				          name="question_5"
				          id="q5_1"
				          value="1"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Disagree"
				          name="question_5"
				          id="q5_2"
				          value="2"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Neither agree nor disagree"
				          name="question_5"
				          id="q5_3"
				          value="3"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Agree"
				          name="question_5"
				          id="q5_4"
				          value="4"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Strongly agree"
				          name="question_5"
				          id="q5_5"
				          value="5"
				          onChange={ this.changeHandler } 
				        />
				    </Form.Group>
				  </fieldset>

				  { <h4 style={{ color: 'red' }}>{this.state.question_5Error}</h4> }

				  {/* 6 Radio form ********************************************* */}
				  <fieldset>
				    <Form.Group >
				      <Form.Label>
				        <h5>6. I cannot sleep because I’m worrying about getting coronavirus-19.</h5>
				      </Form.Label>
				        <Form.Check
				          type="radio"
				          label="Strongly disagree"
				          name="question_6"
				          id="q6_1"
				          value="1"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Disagree"
				          name="question_6"
				          id="q6_2"
				          value="2"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Neither agree nor disagree"
				          name="question_6"
				          id="q6_3"
				          value="3"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Agree"
				          name="question_6"
				          id="q6_4"
				          value="4"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Strongly agree"
				          name="question_6"
				          id="q6_5"
				          value="5"
				          onChange={ this.changeHandler } 
				        />
				    </Form.Group>
				  </fieldset>

				  { <h4 style={{ color: 'red' }}>{this.state.question_6Error}</h4> }

				  {/* 1 Radio form ********************************************* */}
				  <fieldset>
				    <Form.Group >
				      <Form.Label>
				        <h5>7. My heart races or palpitates when I think about getting coronavirus-19.</h5>
				      </Form.Label>
				        <Form.Check
				          type="radio"
				          label="Strongly disagree"
				          name="question_7"
				          id="q7_1"
				          value="1"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Disagree"
				          name="question_7"
				          id="q7_2"
				          value="2"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Neither agree nor disagree"
				          name="question_7"
				          id="q7_3"
				          value="3"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Agree"
				          name="question_7"
				          id="q7_4"
				          value="4"
				          onChange={ this.changeHandler } 
				        />
				        <Form.Check
				          type="radio"
				          label="Strongly agree"
				          name="question_7"
				          id="q7_5"
				          value="5"
				          onChange={ this.changeHandler } 
				        />
				    </Form.Group>
				  </fieldset>

				  { <h4 style={{ color: 'red' }}>{this.state.question_7Error}</h4> }

				  

				  
				  <Button variant="primary" type="submit">
				    Submit
				  </Button>

				</Form>

				{ this.state.redirect ? (<Redirect push to="/survey_done"/>) : null }
				  <br />
				  <br />
			</Container>
		);
	}
}