Install after clone

	$ npm i

===================================


Create react app:

	$ npx create-react-app react_app
	$ cd react_app
	$ npm start // or 'yarn start'

Install:

	$ npm i react-admin ra-data-simple-rest @material-ui/core

In the project delete:

		- App.test.js
		- index.css
		- logo.svg
		- reportWebVitals.js
		- setupTest.js

	In index.js remove lines
		- import './index.css';
		- import reportWebVitals from './reportWebVitals';
		- reportWebVitals();

	In App.js remove lines
		- import logo from './logo.svg';
		- teg <header> completely
Before building add to 'package.json' homepage property with future url:
	
	...
	"homepage": ".",
	...