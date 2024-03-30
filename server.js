const express = require('express');
const cors = require('cors');

const app = express();

app.use(cors()); // Enable CORS
const path = require('path');
const bodyParser = require('body-parser');
const sendEmail = require('./sendEmail');

app.use(express.json());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static(__dirname));

app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'contact.html'));
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