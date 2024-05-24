'use strict';
const nodemailer = require('nodemailer');
// async..await is not allowed in global scope, must use a wrapper
async function main() {
    // สร้างออปเจ็ค transporter เพื่อกำหนดการเชื่อมต่อ SMTP และใช้ตอนส่งเมล
    let transporter = nodemailer.createTransport({
        host: 'smtp.rith.riso.biz',
        port: 25,
        secure: false, // true for 465, false for other ports
        auth: { // ข้อมูลการเข้าสู่ระบบ
            user: 'nattapon@rith.riso.biz', // email user ของเรา
            pass: 'nA_11121112' // email password
        }
    });
    // เริ่มทำการส่งอีเมล
    let info = await transporter.sendMail({
        from: '"Fred Foo 👻" <nattapon@rith.riso.biz>', // อีเมลผู้ส่ง
        to: 'nattapon.mnz8898@gmail.com', // อีเมลผู้รับ สามารถกำหนดได้มากกว่า 1 อีเมล โดยขั้นด้วย ,(Comma)
        subject: 'Hello ✔', // หัวข้ออีเมล
        text: 'Hello world?', // plain text body
        html: '<b>Hello world?</b>' // html body
    });
    // log ข้อมูลการส่งว่าส่งได้-ไม่ได้
    console.log('Message sent: %s', info.messageId);
}
main().catch(console.error);