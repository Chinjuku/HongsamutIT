// const express = require('express');
// const mysql = require('mysql');

// const app = express();
// app.use(express.json());

// // เชื่อมต่อกับ MySQL ฐานข้อมูล
// const db = mysql.createConnection({
//   host: 'localhost',
//   user: 'root',
//   password: '',
//   database: 'db-project',
//   port:'3306'
// });

// db.connect((err) => {
//   if (err) {
//     console.error('เกิดข้อผิดพลาดในการเชื่อมต่อกับ MySQL:', err);
//     return;
//   }
//   console.log('เชื่อมต่อกับ MySQL ฐานข้อมูลสำเร็จ');
// });

// // // Middleware สำหรับรับข้อมูล JSON
// // const regRoute = require("./routes/member/addData")
// // app.use("/addData", regRoute);


// // สร้างเส้นทางสำหรับรับข้อมูลจาก Svelte และบันทึกลงใน MySQL
// app.post('/build', (req, res) => {
//   const { name, email } = req.body;

//   // สร้างคำสั่ง SQL เพื่อเพิ่มข้อมูล
//   try {
//     db.query(
//     "INSERT INTO register (name, email) VALUES (?, ?)",
//     [name, email],
//     (err, result) => {
//         if (err) {
//             console.error('เกิดข้อผิดพลาดในการเพิ่มข้อมูล:', err);
//             return res.status(400).send();
//           }
//           return res.status(201).json({ message: 'New user success created' })
//     }
//     )
//   } catch {
//     console.log(err);
//     return res.status(500).send();
//   }
// });

// app.listen(3000, () => {
//   console.log("kuy");
// });




const express = require('express');
const mysql = require('mysql2');

const app = express();
const port = 3000;

// เชื่อมต่อกับ MySQL ฐานข้อมูล
const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'db-project',
  port: '3306'
});

db.connect((err) => {
  if (err) {
    console.error('เกิดข้อผิดพลาดในการเชื่อมต่อกับ MySQL:', err);
    return;
  }
  console.log('เชื่อมต่อกับ MySQL ฐานข้อมูลสำเร็จ');
});

app.use(express.json())


// สร้างเส้นทางสำหรับรับข้อมูลจาก Svelte และบันทึกลงใน MySQL
app.post('/addData', (req, res) => {
  const { name, email } = req.body;

  // สร้างคำสั่ง SQL เพื่อเพิ่มข้อมูล
  const sql = `INSERT INTO register (name, email) VALUES (?, ?)`;
  const values = [name, email];

  db.query(sql, values, (err, result) => {
    if (err) {
      console.error('เกิดข้อผิดพลาดในการเพิ่มข้อมูล:', err);
      res.status(500).json({ message: 'มีข้อผิดพลาดในการบันทึกข้อมูล' });
      return;
    }
    console.log('บันทึกข้อมูลสำเร็จ');
    res.json({ message: 'บันทึกข้อมูลสำเร็จ' });
  });
});

app.listen(port, () => {
  console.log(`เซิร์ฟเวอร์รันที่พอร์ต ${port}`);
});





