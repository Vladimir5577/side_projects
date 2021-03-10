import express, { Application } from 'express';
// import cors from 'cors';
const cors = require('cors');
const fileUpload = require('express-fileupload');

import config from './config/config';
import logging from './config/logging';
import './config/mongoose';

const app: Application = express();
app.use(cors());
app.use(express.json());
app.use(fileUpload());

app.use('/uploads', express.static('uploads'));

// router
const router_crud = require('./routes/router_crud');
app.use(router_crud);

// start server
app.listen(config.server.port, (): void => {
	logging.info('SERVER', `Server running on ${config.server.hostname}:${config.server.port}`);
});