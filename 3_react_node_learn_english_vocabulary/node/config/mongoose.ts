const mongoose = require('mongoose');
// import mongoose from 'mongoose';
import dotenv from 'dotenv';


dotenv.config();

// Connect to DB
mongoose.connect(
	process.env.DB_CONNECT,
	{
		useNewUrlParser: true,
		useFindAndModify: false,
		useUnifiedTopology: true
	},
	()=> console.log('Connect to DB successfully') 
);