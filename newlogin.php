<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookstore Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Roboto', sans-serif;
    }

    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: url('https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=1470&q=80') no-repeat center center/cover;
      position: relative;
    }

    /* Overlay for soothing effect */
    body::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(97, 82, 65, 0.7);
      z-index: 0;
    }

    .login-container {
      position: relative;
      z-index: 1;
      background-color: rgba(255, 250, 240, 0.95);
      padding: 40px 30px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      width: 350px;
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #6b4226;
    }

    .input-group {
      margin-bottom: 20px;
    }

    .input-group label {
      display: block;
      margin-bottom: 5px;
      color: #5a3e2b;
      font-weight: 500;
    }

    .input-group input {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #d6c5b1;
      border-radius: 8px;
      outline: none;
      transition: 0.3s;
    }

    .input-group input:focus {
      border-color: #a77c50;
      box-shadow: 0 0 5px rgba(167,124,80,0.4);
    }

    .login-btn {
      width: 100%;
      padding: 12px;
      background-color: #a77c50;
      border: none;
      border-radius: 8px;
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
    }

    .login-btn:hover {
      background-color: #8c6239;
    }

    .login-footer {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
      color: #5a3e2b;
    }

    .login-footer a {
      color: #a77c50;
      text-decoration: none;
    }

    .login-footer a:hover {
      text-decoration: underline;
    }

    @media(max-width: 400px){
      .login-container {
        width: 90%;
        padding: 30px 20px;
      }
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Welcome Back</h2>
    <form action="login.php" method="POST">
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>
      <button type="submit" class="login-btn">Login</button>
    </form>
    <div class="login-footer">
      Don't have an account? <a href="signup.php">Sign Up</a>
    </div>
  </div>
</body>
</html>
