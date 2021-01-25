import React, { Component } from 'react';
import { Container, Navbar, Nav, Form, FormControl, Button } from 'react-bootstrap';
import Database from './Database';
import { Link, Redirect } from 'react-router-dom';


export default class FormPage extends Component {
	constructor (props) {
		super(props);
		this.state = {
			redirect: false,
		};
	}

	submitHandler = event => {
		event.preventDefault();
		const value = event.target.elements.passwordId.value;

		if (event.target.elements.passwordId.value === 'secret12345') {
			console.log('Password right');
			// return <Redirect to="/" />
			this.setState({ redirect: true });
		}
	}

	render () {

		const navStyle = {
			color: 'white'
		};

		return (
				<Navbar bg="dark" variant="dark">
					<Container>
						<Link to="/">
					    	<Navbar.Brand>Fear of COVID</Navbar.Brand>
					    </Link>
					    {/*<Nav className="mr-auto">
					      <Nav.Link>
					      	<Link to="/" style={ navStyle }>
					      		Home
					      	</Link>
					      </Nav.Link>
					      <Nav.Link>
					      	<Link to="/database" style={ navStyle }>
					      		Database
					      	</Link>
					      </Nav.Link>
					    </Nav>*/}
					    <Form inline onSubmit={ this.submitHandler }>
					      <FormControl name="password" id="passwordId" type="text" placeholder="Submit" autocomplete="off" className="mr-sm-2" />
					      <Button variant="outline-info" type="submit">Submit</Button>
					    </Form>
					</Container>

					{ this.state.redirect ? (<Redirect push to="/database"/>) : null }
				</Navbar>
		);
	}
}