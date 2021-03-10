import express, { Request, Response, NextFunction } from 'express';

const router = express.Router();

const Card = require('../Models/Card');

router.get('/get_cards', async (req: Request, res: Response) => {
	const cards = await Card.find({});
	res.send(cards);
});

// add a card
router.post('/add_card', async (req: any, res: Response) => {
	// console.log(req.body);
	// console.log(req.files.image);
	
	const image = req.files.image;
	image.mv(`${__dirname}/../uploads/${image.name}`, (err: any) => {
		if (err) {
			console.log(err);
			return res.status(500).send(err);
		}
	});

	const card = await Card({
		image: req.files.image.name,
		description: req.body.description
	});

	await card.save();

	res.send('Card added successfully');
});

// Delete card
router.get('/delete/:id', async (req: Request, res: Response) => {
	console.log(req.params.id);
	const card = await Card.findById(req.params.id);
	await card.delete();
	res.json({ message: 'Card deleted successfully' });
});


module.exports = router;