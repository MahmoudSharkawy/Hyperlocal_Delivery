const { io } = require('socket.io-client');

const socket = io('http://localhost:6001');

// مصفوفة تحتوي على مجموعة كبيرة من الكباتن بإحداثيات وحالات مختلفة
const drivers = [
  { id: 101, name: 'Captain Ahmed (Available)', lat: 30.0444, lng: 31.2357 },
  { id: 102, name: 'Captain Youssef (Delivering)', lat: 30.0500, lng: 31.2400 },
  { id: 103, name: 'Captain Mohamed (Delayed)', lat: 30.0400, lng: 31.2300 },
  { id: 104, name: 'Captain Sayed (Picking Up)', lat: 30.0610, lng: 31.2250 },
  { id: 105, name: 'Captain Omar (Available)', lat: 30.0320, lng: 31.2510 },
  { id: 106, name: 'Captain Kareem (Delivering)', lat: 30.0550, lng: 31.2180 }
];

socket.on('connect', () => {
  console.log('Multi-Driver Simulator Connected to Server!');

  // تحديث موقع كل السائقين دورياً كل 4 ثوانٍ
  setInterval(() => {
    drivers.forEach(driver => {
      // محاكاة تحرك عشوائي بسيط لكل كابتن بشكل منفصل
      driver.lat += (Math.random() - 0.5) * 0.0015;
      driver.lng += (Math.random() - 0.5) * 0.0015;

      console.log(`Sending live node: ${driver.name} -> Lat: ${driver.lat}`);

      // بث إحداثيات الكابتن الحالي إلى السيرفر
      socket.emit('update_location', {
        driver_id: driver.id,
        driver_name: driver.name,
        latitude: driver.lat,
        longitude: driver.lng
      });
    });
  }, 4000);
});