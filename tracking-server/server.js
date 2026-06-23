const express = require('express');
const http = require('http');
const { Server } = require('socket.io');
const mongoose = require('mongoose');
const cors = require('cors');
require('dotenv').config();

const app = express();
app.use(cors());
const server = http.createServer(app);
const io = new Server(server, { cors: { origin: "*" } });

mongoose.connect(process.env.MONGO_URI || 'mongodb://localhost:27017/hyperlocal_delivery')
  .then(() => console.log('MongoDB connected successfully'))
  .catch(err => console.error('MongoDB connection error:', err));

const driverLocationSchema = new mongoose.Schema({
  driver_id: { type: Number, required: true, unique: true },
  driver_name: { type: String },
  location: {
    type: { type: String, enum: ['Point'], default: 'Point' },
    coordinates: { type: [Number], required: true }
  },
  updated_at: { type: Date, default: Date.now }
});

driverLocationSchema.index({ location: '2dsphere' });
const DriverLocation = mongoose.model('DriverLocation', driverLocationSchema);

io.on('connection', (socket) => {
  console.log('A client connected to tracking server');

  socket.on('update_location', async (data) => {
    const { driver_id, driver_name, latitude, longitude } = data;
    try {
      await DriverLocation.findOneAndUpdate(
        { driver_id },
        {
          driver_name,
          location: { type: 'Point', coordinates: [longitude, latitude] },
          updated_at: new Date()
        },
        { upsert: true, new: true }
      );
      io.emit('driver_moved', { driver_id, driver_name, latitude, longitude });
    } catch (error) {
      console.error('Error tracking location:', error.message);
    }
  });

  socket.on('disconnect', () => {
    console.log('Client disconnected');
  });
});

const PORT = process.env.PORT || 6001;
server.listen(PORT, () => {
  console.log(`Node.js Tracking Server running on port ${PORT}`);
});