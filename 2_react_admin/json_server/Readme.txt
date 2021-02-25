Install after clone

	$ npm i

===================================

To create json server

	$ npm init -y

	$ npm i json-server

In "package.json" add 

	"script": {
		"server": "json-server --watch db.json --port 3001 --middlewares ./range.js ./cors.js"
	}

Create db.json file 

Run server

	$ npm run server

Add middleware 
	- cors.js
	- range.js

In browser 

	localhost:3001