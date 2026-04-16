<!DOCTYPE html>
<html>
<head>
    <title>Register Form</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(yellow); 
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card{
            width: 445px;
            height: 482px;
            background: #fff;
            display: flex;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        
        .card .image-box{
            width: 30%;
            background: red;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card .image-box img{
            width: 80%;
        }

        .card .form-box{
            width: 39%;
            padding: 28px;
        }

        .form-box h2{
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .form-box input, .form-box select{
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            outline: none;
            background: #f1f1f1;
            border-radius: 6px;
        }

        .form-box button{
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            background: linear-gradient(to right, #667eea, #764ba2);
            border: none;
            color: #fff;
            font-size: 16px;
            border-radius: 25px;
            cursor: pointer;
        }

        .form-box button:hover{
            opacity: 0.9;
        }
    </style>
</head>
<body>

<div class="card">
    <!-- Image Section -->
    <div class="image-box">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Register">
    </div>

    <!-- Form Section -->
    <div class="form-box">
        <h2>Create Account</h2>
        <form>
            <input type="text" placeholder="Full Name" required>
            <input type="email" placeholder="Email Address" required>
            <input type="contact" placeholder="contact" required>
            <input type="password" placeholder="Password" required>


            <select required>
                <option value="">Select Gender</option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
            </select>

            <button type="submit">Register</button>
        </form>
    </div>
</div>
</body>
</html>