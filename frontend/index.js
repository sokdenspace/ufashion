const express = require('express');
const path = require('path');

const app = express();
const port = process.env.PORT || 8080;

const cors = require("cors")
app.use (
	cors ({
		origin: "*",
		methods: ['GET','POST','DELETE','UPDATE','PUT','PATCH']
	})
)

// Function to serve all static files
app.use(express.static(__dirname));
// app.use(express.static(__dirname + '/public'));

// sendFile will go here
app.get('/', function(req, res) {
  res.sendFile(path.join(__dirname, './public/index.html'));
});

app.get('/login', function(req, res) {
  res.sendFile(path.join(__dirname, './public/pages/login/login.html'));
});

app.get('/register', function(req, res) {
  res.sendfile(path.join(__dirname, './public/pages/register/register.html'));
});

app.get('/shop', function(req, res) {
  res.sendfile(path.join(__dirname, './public/shop.html'));
});

app.get('/detail', function(req, res) {
  res.sendfile(path.join(__dirname, './public/detail.html'));
});

app.get('/contact', function(req, res) {
  res.sendfile(path.join(__dirname, './public/contact.html'));
});

app.get('/checkout', function(req, res) {
  res.sendfile(path.join(__dirname, './public/checkout.html'));
});

app.get('/cart', function(req, res) {
	res.sendfile(path.join(__dirname, './public/cart.html'));
});

app.listen(port);
console.log('Server started at http://localhost:' + port);
