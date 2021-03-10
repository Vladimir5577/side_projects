import mongoose, { Schema } from 'mongoose';

const schema: Schema = new Schema({
	image: {
		type: String,
		require: true
	},
	description: {
		type: String,
		require: true
	}
});

module.exports = mongoose.model('card', schema);