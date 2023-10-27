const express = require('express')
const app = express()
const QRCode = require('qrcode')
const generatePayload = require('promptpay-qr')
const bodyParser = require('body-parser')
const _ = require('lodash')
const cors = require('cors')

app.use(cors())
app.use(bodyParser.json())
app.use(bodyParser.urlencoded({extended: true}))

const server = app.listen(3000, ()=>{
    console.log('server is running')
})

app.post('/generateQR', (req, res) => {
    const { amount } = req.body
    // res.setHeader('Content-Type', 'application/json'); 
    // const _amount = parseFloat(_.get(req, ["body", "amount"]));
    // console.log(amount)
    const mobileNumber = '0956251509';
    const payload = generatePayload(mobileNumber, { amount:parseFloat(amount) });
    console.log(payload)
    const option = {
        color: {
            dark: '#131712',
            light: '#ffffff00'
        }
    }

    let _url = 'yo';
    QRCode.toDataURL(payload, option, (err, url) => {
        return res.send({url: url});
    })
    // return res.send({url: _url});
})

module.exports = app;
