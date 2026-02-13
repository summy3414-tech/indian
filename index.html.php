<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sukhdev Chauhan College</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://st2.depositphotos.com/34818944/47829/i/450/depositphotos_478295762-stock-photo-mumbai-india-may-2016-modern.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #333;
        }
        header {
            background: rgba(0, 51, 102, 0.8);
            color: white;
            text-align: center;
            padding: 50px 20px;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
            border-radius: 50%;
            border: 5px solid white;
        }
        h1 { font-size: 40px; margin: 10px 0; }
        .tagline { font-size: 24px; font-style: italic; }
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .section {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            margin: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            flex: 1;
            min-width: 300px;
        }
        h2 { color: #003366; text-align: center; }
        ul { list-style: none; padding: 0; }
        li { padding: 10px 0; font-size: 18px; }
        label { display: block; margin: 15px 0 5px; font-weight: bold; }
        input, select, textarea {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        button {
            background: #003366;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 8px;
            width: 100%;
            font-size: 20px;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover { background: #002244; }
        .message { padding: 15px; margin-top: 20px; border-radius: 8px; text-align: center; font-weight: bold; }
        .success { background: #d4edda; color: #155724; }
        .error { background: #f8d7da; color: #721c24; }
        footer {
            background: #003366;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<header>
    <img src="https://pkmcollege.org/wp-content/themes/PKM/images/emblem_1.jpg" alt="Sukhdev Chauhan College Logo" class="logo">
    <h1>Sukhdev Chauhan College</h1>
    <p class="tagline">Excellence in Education | ज्ञान की ज्योति</p>
</header>

<div class="container">
    <div class="section">
        <h2>About Us</h2>
        <p>Sukhdev Chauhan College एक प्रतिष्ठित संस्थान है जो उच्च गुणवत्ता वाली शिक्षा प्रदान करता है। हमारा उद्देश्य छात्रों को आधुनिक ज्ञान और कौशल से लैस करना है ताकि वे सफल करियर बना सकें।</p>
    </div>

    <div class="section">
        <h2>Our Courses</h2>
        <ul>
            <li>✅ B.Sc Computer Science</li>
            <li>✅ B.Com</li>
            <li>✅ B.A.</li>
            <li>✅ BBA</li>
            <li>✅ B.Tech</li>
            <li>✅ M.Sc</li>
        </ul>
    </div>

    <div class="section">
        <h2>Admission Form</h2>

        <?php
        $status = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);
            $course = trim($_POST['course']);
            $message_text = trim($_POST['message']);

            require 'src/PHPMailer.php';
            require 'src/SMTP.php';
            require 'src/Exception.php';

            require PHPMailer\PHPMailer\PHPMailer;
            require PHPMailer\PHPMailer\SMTP;  // ← ये नई लाइन ऐड की है (error fix के लिए)
            require PHPMailer\PHPMailer\Exception;

            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'summy3414@gmail.com';           // अपना Gmail डालो
                $mail->Password   = 'abcd efgh ijkl mnop';              // App Password डालो
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                $mail->setFrom('summy3414@gmail.com', 'College Website');
                $mail->addAddress('summy3414@gmail.com'); // अपना ईमेल जहाँ डिटेल्स चाहिए

                $mail->Subject = "New Admission Inquiry - $name";
                $mail->Body    = "नया एडमिशन इंक्वायरी:\n\nनाम: $name\nईमेल: $email\nफोन: $phone\nकोर्स: $course\nसंदेश: $message_text";

                $mail->send();
                $status = '<div class="message success">धन्यवाद! आपका आवेदन सफलतापूर्वक सबमिट हो गया। हम जल्द संपर्क करेंगे।</div>';
            } catch (Exception $e) {
                $status = '<div class="message error">समस्या हुई: ' . $mail->ErrorInfo . '</div>';
            }
        }
        echo $status;
        ?>

        <form method="POST" action="">
            <label>नाम / Name *</label>
            <input type="text" name="name" required>

            <label>ईमेल / Email *</label>
            <input type="email" name="email" required>

            <label>फोन / Phone *</label>
            <input type="tel" name="phone" required>

            <label>कोर्स / Course *</label>
            <select name="course" required>
                <option value="">चुनें</option>
                <option>B.Sc Computer Science</option>
                <option>B.Com</option>
                <option>B.A.</option>
                <option>BBA</option>
                <option>B.Tech</option>
            </select>

            <label>संदेश / Message</label>
            <textarea name="message" rows="4"></textarea>

            <button type="submit">आवेदन भेजें</button>
        </form>
    </div>
</div>

<footer>
    &copy; 2025 Sukhdev Chauhan College | All Rights Reserved<br>
    Contact: info@sukhdevchauhancollege.edu.in
</footer>

</body>
</html>