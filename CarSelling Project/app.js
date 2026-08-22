const express = require('express');
const app = express();
const path = require('path');

// Middleware
app.use(express.static(path.join(__dirname, 'public')));
app.use(express.json()); // For parsing JSON body

// POST route for search
app.post('/search', (req, res) => {
    console.log('Received search request:', req.body);

    const { condition, brand, model, year, mileage, price, body } = req.body;

    // Sample filter logic or mock data
    const cars = [
        { brand: 'BMW', model: 'X5', year: '2022' },
        { brand: 'Audi', model: 'Q7', year: '2023' }
    ];

    // Filter mock logic (you can improve this)
    const result = cars.filter(car =>
        (!brand || car.brand === brand) &&
        (!model || car.model === model)
    );

    res.json(result);
});

// Start server
app.listen(3000, () => {
    console.log('Server started on http://localhost:3000');
});
