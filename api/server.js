const express = require('express');
const cors = require('cors');
const path = require('path');
const bodyParser = require('body-parser');
const sendEmail = require('./sendEmail');
const phpExpress = require('php-express')({
  binPath: 'php' // assumes php is in your PATH
});
const app = express();

// set the engine
app.engine('php', phpExpress.engine);
app.set('view engine', 'php');

app.use(cors()); // Enable CORS
app.use(express.json());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static(__dirname));

app.get('/', (req, res) => {
    res.render(path.join(__dirname, 'contact.php'));
  });

  app.post('/send-email', async (req, res) => {
    const { name, email, subject, message } = req.body;

    try {
      await sendEmail(
        'huzaifa.a@somaiya.edu',
        email,
        `${subject}`,
        message
      );

      res.json({ status: 'Email sent' });
    } catch (error) {
      console.error(error);
      res.status(500).json({ status: 'Failed to send email' });
    }
  });

app.listen(3000, () => {
  console.log('Server is running on port 3000');
});